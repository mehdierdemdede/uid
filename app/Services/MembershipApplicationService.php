<?php

namespace App\Services;

use App\Enums\ApplicationStatus;
use App\Http\Requests\StoreMembershipApplicationRequest;
use App\Models\MembershipApplication;

class MembershipApplicationService
{
    public function submit(StoreMembershipApplicationRequest $request, ?float $captchaScore = null): MembershipApplication
    {
        return MembershipApplication::create([
            ...$request->safe()->except(['kvkk_onayi', 'tuzuk_onayi', 'captcha_token']),
            'kvkk_approved_at' => now(),
            'statute_approved_at' => now(),
            'status' => ApplicationStatus::New->value,
            'submitted_ip' => $request->ip(),
            'user_agent' => (string) $request->userAgent(),
            'captcha_provider' => config('services.captcha.provider'),
            'captcha_score' => $captchaScore,
        ]);
    }
}
