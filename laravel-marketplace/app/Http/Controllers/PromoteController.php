<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePromoteRequest;
use App\Models\Ad;
use App\Models\Promote;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class PromoteController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    //      Dit is eigenlijk een update van de advertentie. Dus geen store maar een update functie.
    public function store(StorePromoteRequest $request)
    {   
        //      Gebruik routemodelbinding via de route.
        $ad = Ad::findOrFail($request->ad_id);
        
        $this->authorize('update', $ad);

        $ad->promoted = true;
        $ad->promoted_at = now();
        $ad->save();

        return redirect()->route('marketplace.index');
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
