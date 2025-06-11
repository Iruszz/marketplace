<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdRequest;
use App\Http\Requests\UpdateAdRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ad;
use App\Models\Bid;
use App\Models\Category;
use App\Models\Conversation;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{
    public function index(Request $request)
    {
        $keywords = explode(' ', request('q'));
        
        $ads = Ad::with('categories')
            ->when($request->filled('q'), function ($query) use ($keywords) {
                $query->where(function ($q) use ($keywords) {
                    foreach ($keywords as $word) {
                        $q->where('title', 'like', "%{$word}%");
                    }
                });
            })
            ->orderByDesc('promoted')
            ->orderByDesc('promoted_at')
            ->paginate(10)
            ->through(function ($ad) {
                $ad->category_ids_csv = $ad->categories->pluck('id')->join(',');
                return $ad;
            });

        $user = Auth::user();
        $categories = Category::all();

        return view('marketplace.index', compact('ads', 'user', 'categories'),);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Ad $ad)
    {
        $user = Auth::user();
        $categories = Category::all();
        
        return view('marketplace.create', compact('ad', 'user', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdRequest $request): RedirectResponse
    {  
        $user = Auth::user();
        
        $validated = $request->validated();

        $validated['user_id'] = Auth::id();
        
        $ad = Ad::create($validated);

        $ad->categories()->sync($validated['category_ids']);

        $imageFiles = Storage::disk('public')->files('ads-images');
        $jpgFiles = array_filter($imageFiles, fn($file) => str_ends_with($file, '.jpg'));

        if (!empty($jpgFiles)) {
            $ad->image = basename(Arr::random($jpgFiles));
            $ad->save();
        }

        return redirect()->route('account.index', compact('user'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Ad $ad)
    {
        $user = Auth::user();

        $bids = Bid::where('ad_id', $ad->id)
            ->with('user')
            ->orderBy('price', 'desc')
            ->get();

        $conversation = Conversation::where('ad_id', $ad->id)
            ->where(function ($query) use ($user) {
                $query->where('buyer_id', $user->id)
                    ->orWhere('owner_id', $user->id);
            })
            ->first();

        $conversationId = $conversation?->id;

        return view('marketplace.show', compact('ad', 'bids', 'user', 'conversationId'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ad $ad)
    {
        $user = Auth::user();

        $categories = Category::all();

        return view('marketplace.edit', compact('ad', 'user', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdRequest $request, Ad $ad): RedirectResponse
    { 
        Gate::authorize('update', $ad);
        
        $validated = $request->validated();

        $ad->update($validated);

        $ad->categories()->sync($validated['category_ids']);

        $user = Auth::user();

        return redirect()->route('account.index', compact('ad', 'user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ad $ad)
    {
        $user = Auth::user();
        
        $ad->delete();
        
        return redirect()->route('account.index', compact('ad', 'user'))
        ->with('Article deleted');
    }
}
