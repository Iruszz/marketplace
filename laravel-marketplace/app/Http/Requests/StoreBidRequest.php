<?php

namespace App\Http\Requests;

use App\Models\Bid;
use Illuminate\Foundation\Http\FormRequest;

class StoreBidRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $adId = $this->route('ad');

        $highestBid = Bid::where('ad_id', $adId)->max('price');

        $minPrice = $highestBid ? $highestBid + 0.01 : 0;

        return [
            'price' => ['required', 'numeric', 'min:' . $minPrice],
            'ad_id' => ['required']
        ];
    }
}
