<?php

namespace App\Services;

use App\Enums\ApplicationStatus;
use App\Http\Requests\StoreMembershipApplicationRequest;
use App\Mail\AdminNewApplicationMail;
use App\Mail\ApplicantThankYouMail;
use App\Models\MembershipApplication;
use Illuminate\Support\Facades\Mail;

class MembershipApplicationService
{
    public function submit(StoreMembershipApplicationRequest $request, ?float $captchaScore = null): MembershipApplication
    {
        $application = MembershipApplication::create([
            ...$request->safe()->except(['kvkk_onayi', 'tuzuk_onayi', 'captcha_token']),
            'kvkk_approved_at' => now(),
            'statute_approved_at' => now(),
            'status' => ApplicationStatus::New->value,
            'submitted_ip' => $request->ip(),
            'user_agent' => (string) $request->userAgent(),
            'captcha_provider' => config('services.captcha.provider'),
            'captcha_score' => $captchaScore,
        ]);

        $this->notify($application);

        return $application;
    }

    protected function notify(MembershipApplication $application): void
    {
        $adminAddress = config('mail.admin_notification_address');

        if (filled($adminAddress)) {
            Mail::to($adminAddress)->send(new AdminNewApplicationMail($application));
        }

        if (filled($application->email)) {
            Mail::to($application->email)->send(new ApplicantThankYouMail($application));
        }
    }
}
