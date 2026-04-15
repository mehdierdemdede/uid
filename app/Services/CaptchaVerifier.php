<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CaptchaVerifier
{
    public static function isConfigured(): bool
    {
        return filled(config('services.captcha.provider')) && filled(config('services.captcha.secret'));
    }

    public static function hasWidget(): bool
    {
        return self::isConfigured() && filled(config('services.captcha.site_key'));
    }

    public function verify(string $token, ?string $ip = null): bool
    {
        return $this->verifyWithResult($token, $ip)['success'];
    }

    /**
     * @return array{success: bool, score: float|null}
     */
    public function verifyWithResult(string $token, ?string $ip = null): array
    {
        $fail = ['success' => false, 'score' => null];

        $provider = (string) config('services.captcha.provider');
        $secret = config('services.captcha.secret');

        if (! filled($provider) || ! filled($secret)) {
            return ['success' => true, 'score' => null];
        }

        if (trim($token) === '') {
            return $fail;
        }

        if ($provider === 'turnstile') {
            $response = Http::timeout(10)->asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                'secret' => $secret,
                'response' => $token,
                'remoteip' => $ip,
            ])->json();

            $ok = (bool) ($response['success'] ?? false);

            return ['success' => $ok, 'score' => null];
        }

        if ($provider === 'recaptcha_v3') {
            $response = Http::timeout(10)->asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => $secret,
                'response' => $token,
                'remoteip' => $ip,
            ])->json();

            if (! ($response['success'] ?? false)) {
                return $fail;
            }

            $score = (float) ($response['score'] ?? 0);
            $minScore = (float) config('services.captcha.min_score', 0.5);
            $expectedAction = (string) config('services.captcha.action', 'membership');
            $action = (string) ($response['action'] ?? '');

            if ($action !== $expectedAction || $score < $minScore) {
                return $fail;
            }

            return ['success' => true, 'score' => $score];
        }

        return $fail;
    }
}
