<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMembershipApplicationRequest;
use App\Services\CaptchaVerifier;
use App\Services\MembershipApplicationService;

class MembershipApplicationController extends Controller
{
    public function create()
    {
        return view('membership.create', [
            'captchaProvider' => config('services.captcha.provider'),
            'captchaSiteKey' => config('services.captcha.site_key'),
        ]);
    }

    public function store(
        StoreMembershipApplicationRequest $request,
        CaptchaVerifier $captchaVerifier,
        MembershipApplicationService $membershipApplicationService
    ) {
        $result = $captchaVerifier->verifyWithResult((string) $request->string('captcha_token'), $request->ip());

        if (! $result['success']) {
            return back()
                ->withErrors(['captcha_token' => __('Güvenlik doğrulaması başarısız. Lütfen tekrar deneyin.')])
                ->withInput();
        }

        $membershipApplicationService->submit($request, $result['score']);

        return redirect(t_route('membership.success'));
    }

    public function success()
    {
        return view('membership.success');
    }
}
