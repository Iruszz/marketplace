<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Conversation;
use App\Models\Ad;

class ConversationController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        // Validate input
        $data = $request->validate([
            'ad_id' => ['required', 'exists:ads,id'],
        ]);

        $ad = Ad::findOrFail($data['ad_id']);

        $buyerId = $user->id;
        $ownerId = $ad->user_id; // assuming 'user_id' is owner of ad

        //      ipv '->where(function...' kan dit een stuk simpeler met whereAny
        $conversation = Conversation::where('ad_id', $ad->id)
            ->where(function ($query) use ($buyerId, $ownerId) {
                $query->where(function ($q) use ($buyerId, $ownerId) {
                    $q->where('buyer_id', $buyerId)
                    ->where('owner_id', $ownerId);
                })->orWhere(function ($q) use ($buyerId, $ownerId) {
                    $q->where('buyer_id', $ownerId)
                    ->where('owner_id', $buyerId);
                });
            })
            ->first();

        if (!$conversation) {
            $conversation = Conversation::create([
                'ad_id' => $ad->id,
                'buyer_id' => $buyerId,
                'owner_id' => $ownerId,
            ]);
        }

        return redirect()->route('account.inbox', [
            'conversation' => $conversation->id,
            'user' => $user->id,
        ]);
    }
}

