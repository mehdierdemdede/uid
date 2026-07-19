<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_bs',
        'slug',
        'summary',
        'summary_bs',
        'content',
        'content_bs',
        'image_path',
        'is_published',
        'published_at',
        'created_by',
        'updated_by',
    ];

    public function localizedTitle(): string
    {
        return app()->getLocale() === 'bs' && filled($this->title_bs) ? $this->title_bs : $this->title;
    }

    public function localizedSummary(): ?string
    {
        return app()->getLocale() === 'bs' && filled($this->summary_bs) ? $this->summary_bs : $this->summary;
    }

    public function localizedContent(): string
    {
        return app()->getLocale() === 'bs' && filled($this->content_bs) ? $this->content_bs : $this->content;
    }

    public function createdBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function updatedBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
