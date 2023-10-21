<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lesson extends Model
{
    use HasFactory;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
// app/Models/Lesson.php
    public function membership(): BelongsTo
    {
        return $this->belongsTo(Membershippackage::class, 'package_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
    public function sounds(): HasMany
    {
        return $this->hasMany(Sound::class);
    }
    public function videos(): HasMany
    {
        return $this->hasMany(Video::class);
    }
}