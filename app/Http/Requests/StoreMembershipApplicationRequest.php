<?php

namespace App\Http\Requests;

use App\Enums\MembershipType;
use App\Services\CaptchaVerifier;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreMembershipApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name'    => ['required', 'string', 'min:2', 'max:100'],
            'last_name'     => ['required', 'string', 'min:2', 'max:100'],
            'birth_date'    => ['nullable', 'date', 'before_or_equal:today'],
            'email'         => ['nullable', 'email:rfc'],
            'city'          => ['required', 'string', 'max:120'],
            'phone'         => ['required', 'string', 'min:8', 'max:25'],
            'occupation'    => ['nullable', 'string', 'max:120'],
            'notes'         => ['nullable', 'string'],
            'kvkk_onayi'    => ['accepted'],
            'tuzuk_onayi'   => ['accepted'],
            'captcha_token' => [
                Rule::requiredIf(fn () => CaptchaVerifier::isConfigured()),
                'nullable',
                'string',
            ],
        ];
    }
}
