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
use Illuminate\Support\Facades\Gate;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $ads = Auth::user()->ads;
        $user = Auth::user();
        return view('marketplace.dashboard', compact('ads', 'user'));
    }

    public function index(Ad $ad)
    {
        $ads = Ad::all();
        $user = Auth::user();
        return view('marketplace.index', compact('ads', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('marketplace.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdRequest $request): RedirectResponse
    {  
        $user = Auth::user();
        
        $validated = $request->validated();

        $validated['user_id'] = Auth::id();
        
        Ad::create($validated);

        return redirect()->route('marketplace.dashboard', compact('user'));
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

        return view('marketplace.show', compact('ad', 'bids', 'user'));
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

        $user = Auth::user();

        return redirect()->route('marketplace.dashboard', compact('ad', 'user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ad $ad)
    {
        $user = Auth::user();
        
        $ad->delete();
        
        return redirect()->route('marketplace.dashboard', compact('ad', 'user'))
        ->with('Article deleted');
    }
}
