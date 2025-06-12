@extends('layouts.app')

@section('content')
<div class="flex h-screen w-full justify-center pt-10 pr-10 pl-10">
  <article class="h-full w-full max-w-8xl grid grid-cols-8 gap-6 mx-30 mt-0 mb-0 items-start">
    
    <!-- Left column -->
    <div class="flex flex-col gap-4 col-span-1 grid-rows-3">
      <div class="h-60.5 flex justify-center items-center rounded-lg border border-gray-200 shadow-sm overflow-hidden">
        <img class="w-full object-cover" src="{{ asset('storage/ads-images/' . $ad->image) }}" alt="Ad image" />
      </div>
      <div class="h-60.5 flex justify-center items-center rounded-lg border border-gray-200 shadow-sm overflow-hidden">
        <img class="w-full object-cover" src="{{ asset('storage/ads-images/' . $ad->image) }}" alt="Ad image" />
      </div>
      <div class="h-60.5 flex justify-center items-center rounded-lg border border-gray-200 shadow-sm overflow-hidden">
        <img class="w-full object-cover" src="{{ asset('storage/ads-images/' . $ad->image) }}" alt="Ad image" />
      </div>
    </div>

    <!-- Middle column -->
    <div 
      class="h-189.5 relative rounded-lg shadow-sm col-span-5 bg-cover bg-[center_80%]"
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
        <span class="relative border rounded-md px-3 py-1.5 text-xs font-semibold {{ getCategoryClasses($category->color) }}">{{ $category->name }}</span>
      @endforeach
      </div>
    </div>

    <!-- Right column -->
        <section class="flex flex-col h-fit w-full col-span-2">
            <div class="space-y-5">
                <div class="px-10 py-5 rounded-lg border border-gray-200 shadow-sm">
                    <p class="text-base font-medium text-gray-900">Bids</p>
                    <div class="h-100 overflow-y-scroll">
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

              <div class="px-10 py-5 rounded-lg border border-gray-200 shadow-sm">
                <form action="{{ route('bid.store', ['ad' => $ad->id]) }}"
                  class=""
                  method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="ad_id" value="{{ $ad->id }}">
                  
                    <p class="text-base font-medium text-gray-900">Your bid</p>
                    <div class="flex flex-col gap-8">
                        <div class="mt-4 grid gap-x-6 gap-y-8">
                            <div class="w-full">
                              <div class="mt-2 relative">
                                  <!-- € icon -->
                                  <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-base font-medium text-gray-900 pointer-events-none peer-focus:text-gray-800 transition">
                                      €
                                  </span>

                                  <!-- Input -->
                                  <input type="text" id="price" name="price"
                                      class="block bg-white w-full pl-8 pr-2.5 py-2.5 text-base font-medium text-gray-900 rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer @error('price') border-red-600 @enderror"
                                      placeholder=" " />

                                  <!-- Label -->
                                  <label for="price"
                                      class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2
                                      peer-focus:px-2 peer-focus:text-blue-600
                                      peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2
                                      peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4
                                      rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                                      Price
                                  </label>
                              </div>
                                @error('price')
                                  <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-col w-full">
                          @can('bid', $ad)
                            <button type="submit" 
                              class="flex items-center justify-center w-full px-5 py-2.5 me-2 mb-2 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none">
                                Bid
                            </button>
                          @endcan

                          @can('edit', $ad)
                            <a href="{{ route('ads.edit', $ad) }}" 
                              class="flex items-center justify-center gap-3 w-full px-5 py-2.5 me-2 mb-2 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                              </svg> 
                              Edit                       
                            </a>
                          @endcan
                        </div>
                    </div>
                </form>

                @can('edit', $ad)
                  <form action="{{ route('promote.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="ad_id" value="{{ $ad->id }}">
                    <button type="submit" 
                      class="flex items-center justify-center w-full px-5 py-2.5 me-2 mb-2 text-base font-medium text-center text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 focus:outline-none">
                        Promote advertsisement
                    </button>
                  </form>
                @endcan

                @can('message', $ad)
                  <form action="{{ route('conversation.store') }}" method="POST" class="w-full">
                    @csrf
                    <input type="hidden" name="ad_id" value="{{ $ad->id }}">
                    <button type="submit"
                      class="flex items-center justify-center w-full gap-3 px-5 py-2.5 me-2 mb-2 text-base font-medium text-center text-blue-700 bg-white ring ring-blue-700 rounded-lg hover:bg-blue-100 focus:outline-none">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                      </svg>
                      Send a message
                    </button>
                  </form>
                @endcan

              </div>
            </div>
        </section>
    
  </article>
</div>


@endsection