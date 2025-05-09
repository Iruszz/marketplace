<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ad;
use Illuminate\Support\Facades\DB;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = DB::table('ads')->get();
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
        $validated = $request->validated();

        $validated['user_id'] = Auth::id();

        Ad::create($validated);

        return redirect()->route('marketplace.index', ['user' => Auth::id()]);
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

    public function dashboard()
    {
        $ads = Auth::user()->ads;
        $user = Auth::user();
        return view('marketplace.dashboard', compact('ads', 'user'));
    }
}
