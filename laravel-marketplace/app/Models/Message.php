<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
        protected $fillable = [
        'body',
        'conversation_id',
        'sender_id'
    ];

    /** @use HasFactory<\Database\Factories\MessageFactory> */
    use HasFactory;

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
