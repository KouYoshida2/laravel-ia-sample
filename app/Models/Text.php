<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'email',
        'price',
        'is_visible',
    ];

    public function scopeVisible($query)
    {
        return $query->where('is_visible', 1);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
