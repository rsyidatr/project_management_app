<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'type',
        'tags',
        'folder_id',
        'workspace_id',
        'user_id',
        'is_favorite',
        'is_archived',
        'last_accessed_at'
    ];

    protected $casts = [
        'tags' => 'array',
        'is_favorite' => 'boolean',
        'is_archived' => 'boolean',
        'last_accessed_at' => 'datetime'
    ];

    public function folder(): BelongsTo
    {
        return $this->belongsTo(Folder::class);
    }

    public function workspace(): BelongsTo
    {
        return $this->belongsTo(Workspace::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_archived', false);
    }

    public function scopeFavorites($query)
    {
        return $query->where('is_favorite', true);
    }

    public function scopeArchived($query)
    {
        return $query->where('is_archived', true);
    }

    // Helper methods
    public function getTagsArrayAttribute()
    {
        if (is_array($this->tags)) {
            return $this->tags;
        }
        
        if (is_string($this->tags)) {
            $decoded = json_decode($this->tags, true);
            return is_array($decoded) ? $decoded : [];
        }
        
        return [];
    }

    public function getTagsCountAttribute()
    {
        return count($this->tags_array);
    }
}
