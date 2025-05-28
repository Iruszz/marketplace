@extends('layouts.app')


@section('header1')
    @section('title', 'Bid')
    @section('heading', 'Bid on item')
@endsection

@section('content')
<div class="flex h-screen w-full justify-center pt-10 pr-10 pl-10">
  <article class="h-full w-full max-w-8xl grid grid-cols-7 gap-6 mx-30 mt-0 mb-0 items-start">
    
    <!-- Left column -->
    <div class="flex flex-col gap-4 col-span-1 grid-rows-3">
      <div class="h-50 flex justify-center items-center rounded-lg border border-gray-200 shadow-sm overflow-hidden">
        <img class="w-full object-cover -mt-12" src="{{ asset('storage/ads-images/' . $ad->image) }}" alt="Ad image" />
      </div>
      <div class="h-50 flex justify-center items-center rounded-lg border border-gray-200 shadow-sm overflow-hidden">
        <img class="w-full object-cover -mt-12" src="{{ asset('storage/ads-images/' . $ad->image) }}" alt="Ad image" />
      </div>
      <div class="h-50 flex justify-center items-center rounded-lg border border-gray-200 shadow-sm overflow-hidden">
        <img class="w-full object-cover -mt-12" src="{{ asset('storage/ads-images/' . $ad->image) }}" alt="Ad image" />
      </div>
    </div>

    <!-- Middle column -->
    <div 
      class="h-158 relative rounded-lg shadow-sm col-span-4 bg-cover bg-[center_80%]"
      style="background-image: url('{{ asset('storage/ads-images/' . $ad->image) }}');">
      
      <div class="absolute h-full w-full inset-0 rounded-lg z-10"
        style="background: linear-gradient(to bottom, rgb(255, 255, 255) 7%, rgba(255, 255, 255, 0.493) 40%, rgba(255, 255, 255, 0) 60%);">
      </div>

      <div class="relative z-20 p-6 flex items-start h-fit">
        <h3 class="text-3xl font-bold max-w-lg line-clamp-2 leading-tight text-gray-900 hover:underline">
          {{ $ad->title }}
        </h3>
      </div>

      <div class="flex flex-row gap-4 relative items-start grid-rows-3 z-20 pl-6 w-fit h-fit">
      @foreach ($ad->categories as $category)
        <span class="inline-flex items-center rounded-md bg-{{ $category->color }} px-2 py-1 text-xs font-medium text-{{ BadgeColor($category->color)['text'] }} ring-1 ring-gray-500/10 ring-inset">
          {{ $category->name }}
        </span>
      @endforeach
      </div>
    </div>

    <!-- Right column -->
    <div class="flex flex-col h-158 p-10 rounded-lg border border-gray-200 shadow-sm col-span-2">
        <section class="">
            <div class="">
                <div class="mb-10 max-w-3xs">
                    <p class="text-base font-medium text-gray-900">Bids</p>
                    <div class="h-80 overflow-y-scroll">
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

                <form action="{{ route('bid.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="ad_id" value="{{ $ad->id }}">
                  
                    <p class="text-base font-medium text-gray-900">Your bid</p>
                    <div class="flex flex-col gap-8">
                        <div class="mt-4 grid grid-cols-6 gap-x-6 gap-y-8">
                            <div class="sm:col-span-4">
                                <div class="mt-2 relative">
                                    <input type="price" id="price" name="price" class="block bg-white w-full px-2.5 pb-2.5 pt-2.5 text-base font-medium text-gray-900 rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="price" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Price</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" 
                            class="w-auto self-start text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
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