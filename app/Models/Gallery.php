<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
        
    public function sections(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }
}
