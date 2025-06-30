<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $keywords = explode(' ', request('q'));

        $ads = $user->ads()
            ->with('categories')
            ->when($request->filled('q'), function ($query) use ($keywords) {
                //      Deze tweede function heb je niet nodig, je foreach kan direct in de eerste function?
                $query->where(function ($q) use ($keywords) {
                    foreach ($keywords as $word) {
                        $q->where('title', 'like', "%{$word}%");
                    }
                });
            })
            ->paginate(10)
            ->through(function ($ad) {
                $ad->category_ids_csv = $ad->categories->pluck('id')->join(',');
                return $ad;
            });
        
        $categories = Category::all();
        
        return view('account.index', compact('ads', 'user', 'categories'));
    }
}
