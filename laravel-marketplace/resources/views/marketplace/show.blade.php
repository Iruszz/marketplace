@extends('layouts.app')


@section('header1')
    @section('title', 'Bid')
    @section('heading', 'Bid on item')
@endsection

@section('content')
<div class="flex w-full justify-center">
  <article class="ad-card grid grid-cols-5 gap-6 w-full max-w-8xl m-10 mr-30 ml-30 items-start">
    
    <!-- Left column: 1 col -->
    <div class="flex flex-col gap-4 col-span-1">
      <div class="h-50 w-50 rounded-lg border border-gray-200 shadow-sm overflow-hidden">
        <img class="h-full w-full object-cover" src="{{ asset('storage/ads-images/' . $ad->image) }}" alt="Ad image" />
      </div>
      <div class="h-50 w-50 rounded-lg border border-gray-200 shadow-sm overflow-hidden">
        <img class="h-full w-full object-cover" src="{{ asset('storage/ads-images/' . $ad->image) }}" alt="Ad image" />
      </div>
      <div class="h-50 w-50 rounded-lg border border-gray-200 shadow-sm overflow-hidden">
        <img class="h-full w-full object-cover" src="{{ asset('storage/ads-images/' . $ad->image) }}" alt="Ad image" />
      </div>
    </div>

    <!-- Middle big bg image: span 3 cols -->
    <div 
      class="h-100 relative rounded-lg overflow-hidden shadow-sm col-span-3"
      style="
        min-width: 0; /* needed to prevent grid overflow */
        background-image: url('{{ asset('storage/ads-images/' . $ad->image) }}');
        background-size: cover;
        background-position: center;">
      
      <div class="absolute inset-0 bg-gradient-to-b from-white/75 to-white/0 rounded-lg z-10"></div>

      <div class="relative z-20 p-6 flex items-start h-full">
        <h3 class="text-3xl font-semibold leading-tight text-gray-950 hover:underline">
          {{ $ad->title }}
        </h3>
      </div>
    </div>

    <!-- Right info box: span 1 col -->
    <div class="flex flex-col p-10 rounded-lg border border-gray-200 shadow-sm col-span-1">
        <section class="">
            <div class="">
                <div class="mb-10 max-w-3xs">
                    <p class="text-base font-medium text-gray-900">Bids</p>
                    <div class="h-90 overflow-y-scroll">
                        @foreach ( $bids as $bid)
                            <div class="sm:col-span-4">
                                <div class="mt-2 block gap-4 bg-white rounded-lg border-1 border-gray-300 px-2.5 pb-2.5 pt-2.5 w-full">
                                    <p class="text-lg font-normal text-gray-900">{{ '€' . $bid->price }}</p>
                                    <p class="text-sm font-normal text-gray-900">{{ $bid->user->name }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <form class="">
                    <p class="text-base font-medium text-gray-900">Your bid</p>
                    <div class="gap-y-8">
                        <div class="mt-4 grid grid-cols-25 gap-x-6 gap-y-8">
                            <div class="sm:col-span-4">
                                <div class="mt-2 relative">
                                    <input type="text" id="price" class="block bg-white w-full px-2.5 pb-2.5 pt-2.5 text-base font-medium text-gray-900 rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="price" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Price</label>
                                </div>
                            </div>
                        </div>
                        <button type="button" 
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Bid
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>
    
  </article>
</div>


@endsection