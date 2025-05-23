@extends('layouts.app')


@section('header1')
    @section('title', 'Bid')
    @section('heading', 'Bid on item')
@endsection

@section('content')
<div class="flex w-full items-center justify-center">
    <article class="ad-card flex h-140 w-full m-10 mr-40 ml-40 items-start justify-between"
        style="background-image: ">
        <div class="flex col-span-full gap-4 h-full">
            <div class="flex flex-col h-full col-span-1 gap-4">
                <div class="h-50 w-50 rounded-lg border border-gray-200 shadow-sm">
                </div>
                <div class="h-50 w-50 rounded-lg border border-gray-200 shadow-sm">
                </div>
                <div class="h-50 w-50 rounded-lg border border-gray-200 shadow-sm">
                </div>
            </div>
            <div class="h-full col-span-3 p-10 rounded-lg border border-gray-200 shadow-sm">
                {{-- <a href="{{ route('ads.show', $ad->id) }}"> --}}
                    <img class="mx-auto h-full" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg" alt="" />
                {{-- </a> --}}
            </div>
            <div class="flex flex-col col-span-1 p-10 rounded-lg border border-gray-200 shadow-sm">
                <div class="mb-4 flex items-center justify-between gap-4">  
                    <div class="flex items-center justify-end gap-1">    
                        <button type="button" data-tooltip-target="tooltip-add-to-favorites" class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                        <span class="sr-only"> Add to Favorites </span>
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z" />
                        </svg>
                        </button>
                        <div id="tooltip-add-to-favorites" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300" data-popper-placement="top">
                        Add to favorites
                        <div class="tooltip-arrow" data-popper-arrow=""></div>
                        </div>
                    </div>
                </div>

                <p class="text-lg font-semibold leading-tight text-gray-900 hover:underline">
                    {{ $ad->limited_title }}               

                <div class="mt-2 flex items-center gap-2">
                    <div class="flex items-center">
                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                        </svg>
        
                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                        </svg>
        
                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                        </svg>
        
                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                        </svg>
        
                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                        </svg>
                    </div>
        
                    <p class="text-sm font-medium text-gray-900">5.0</p>
                    <p class="text-sm font-medium text-gray-500">(455)</p>
                </div>

                <ul class="mt-2 flex items-center gap-4">
                    <li class="flex items-center gap-2">
                        <svg class="h-4 w-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                        </svg>
                        <p class="text-sm font-medium text-gray-500">Fast Delivery</p>
                    </li>
        
                    <li class="flex items-center gap-2">
                        <svg class="h-4 w-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                        </svg>
                        <p class="text-sm font-medium text-gray-500">Best Price</p>
                    </li>
                </ul>

                <div class="flex items-center justify-between mt-5">
                    <p class="text-2xl font-extrabold leading-tight text-gray-900">{{'Price ' . '€' . $ad->price}}</p>

                </div>
            </div>
        </div>
    </article>
</div>



    <section class="py-8 antialiased">
        <div class="mx-14 max-w-screen-3xl px-4 2xl:px-0">
            <div class="mb-10 max-w-3xs">
                <p class="text-base font-medium text-gray-900">Bids</p>
                    @foreach ( $bids as $bid)
                        <div class="sm:col-span-4">
                            <div class="flex mt-2 block gap-4 bg-white rounded-lg border-1 border-gray-300 px-2.5 pb-2.5 pt-2.5 w-full">
                                <p class="text-base font-normal text-gray-900">{{ $bid->user->name }}</p>
                                <p class="text-base font-normal text-gray-900">{{ '€' . $bid->price }}</p>
                            </div>
                        </div>
                    @endforeach
            </div>

            <div class="">
                <p class="text-base font-medium text-gray-900">Your bid</p>
                <div class="mt-4 grid grid-cols-25 gap-x-6 gap-y-8">
                    <div class="sm:col-span-4">
                        <div class="mt-2 relative">
                            <input type="text" id="price" class="block bg-white w-full px-2.5 pb-2.5 pt-2.5 text-base font-medium text-gray-900 rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="price" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Price</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection