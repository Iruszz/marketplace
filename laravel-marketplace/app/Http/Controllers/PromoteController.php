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
     * Store a newly created resource in storage.
     */
    public function store(Ad $ad)
    {   
        $this->authorize('update', $ad);

        $ad->promoted = true;
        $ad->promoted_at = now();
        $ad->save();

        return redirect()->route('marketplace.index');
    }
}
