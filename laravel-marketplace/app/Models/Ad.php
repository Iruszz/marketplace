<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ad extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title', 
        'body',
        'price',
        // 'category_id',
    ];

    public function limitedTitle(): Attribute
    {
        return Attribute::make(
            get: fn (): string => strlen($this->title) > 65 ? substr($this->title, 0, 65) . '...' : $this->title,
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function bid()
    {
        return $this->hasMany(Bid::class);
    }
}
