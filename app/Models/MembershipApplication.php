<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembershipApplication extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'birth_place',
        'nationality',
        'gender',
        'occupation',
        'education_level',
        'languages',
        'correspondence_language',
        'email',
        'phone',
        'mobile_phone',
        'address_line',
        'address_line_2',
        'postal_code',
        'city',
        'country',
        'membership_type',
        'join_reason',
        'notes',
        'iban',
        'bic',
        'bank_name',
        'account_holder_name',
        'kvkk_approved_at',
        'statute_approved_at',
        'contact_permission',
        'captcha_provider',
        'captcha_score',
        'source',
        'status',
        'admin_notes',
        'submitted_ip',
        'user_agent',
    ];

    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
            'kvkk_approved_at' => 'datetime',
            'statute_approved_at' => 'datetime',
            'contact_permission' => 'boolean',
            'captcha_score' => 'decimal:2',
        ];
    }
}
