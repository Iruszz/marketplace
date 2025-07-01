<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title', 
        'body',
        'price',
        'promoted'
    ];

    public function limitedTitle(): Attribute
    {
        return Attribute::make(
            get: fn (): string => Str::limit($this->title, 65, '...'),
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }

}
