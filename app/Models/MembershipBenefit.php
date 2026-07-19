<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MembershipBenefit extends Model
{
    protected $fillable = [
        'title',
        'title_bs',
        'discount_text',
        'discount_text_bs',
        'description',
        'description_bs',
        'logo_path',
        'sort_order',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function localizedTitle(): string
    {
        return app()->getLocale() === 'bs' && filled($this->title_bs) ? $this->title_bs : $this->title;
    }

    public function localizedDiscountText(): ?string
    {
        return app()->getLocale() === 'bs' && filled($this->discount_text_bs) ? $this->discount_text_bs : $this->discount_text;
    }

    public function localizedDescription(): ?string
    {
        return app()->getLocale() === 'bs' && filled($this->description_bs) ? $this->description_bs : $this->description;
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }
}
