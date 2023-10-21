<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;
    // public function lesson(): BelongsTo
    // {
    //     return $this->belongsTo(Lesson::class);
    // }
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $fillable = ['url'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}