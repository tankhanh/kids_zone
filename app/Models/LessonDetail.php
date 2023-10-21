<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LessonDetail extends Model
{
    use HasFactory;

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }
    public function image(): HasMany
    {
        return $this->hasMany(Image::class);
    }
    public function sound(): HasMany
    {
        return $this->hasMany(Sound::class);
    }
    public function video(): HasMany
    {
        return $this->hashasMany(Video::class);
    }
}