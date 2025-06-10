<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInboxRequest;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($conversationId = null)
    {
        $user = Auth::user();
        $userId = Auth::user()->id;
    
        $conversations = Conversation::with([
            'owner', 
            'buyer', 
            'ad',
            'messages' => function ($query) {
                $query->orderBy('created_at', 'asc');
            }
        ])
        ->where('owner_id', $userId)
        ->orWhere('buyer_id', $userId)
        ->get();

        $activeConversation = $conversations->firstWhere('id', $conversationId);
    
        return view('account.inbox', compact('conversations', 'activeConversation', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInboxRequest $request): RedirectResponse
    {
        $user = Auth::user();

        $validated = $request->validated();
        $validated['sender_id'] = Auth::id();
        // $validated['conversation_id'] = $request->input('conversation_id');
        
        Message::create($validated);

        return redirect()->route('account.inbox', [
            'user' => $user->id,
            'conversation' => $validated['conversation_id'],
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
