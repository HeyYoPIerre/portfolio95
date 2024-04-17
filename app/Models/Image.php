<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Image extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function sections(): BelongsTo
    {
        return $this->belongsTo(Gallery::class);
    }
}
