@extends('layouts.app')

@section('header1')
    @section('title', 'Edit advertisement')
    @section('heading', 'Edit and save to make changes')
@endsection

@section('content')

<div class="min-h-full bg-white">
    <div class="mx-auto max-w-7xl lg:px-8">
        <form 
        action="{{ route('ads.update', $ad->id) }}" method="POST" enctype="multipart/form-data"
            >
            @csrf
            @method('PATCH')
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                            <div class="mt-2">
                                <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600
                                    @error('title') border-red-500 focus-within:border-red-500 focus-within:ring-red-500 @enderror">
                                    <input type="text" name="title" id="title" 
                                        class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 
                                        placeholder:text-gray-400 focus:outline-none sm:text-sm @error('title') text-red-500 @enderror" 
                                        value="{{ old('title', $ad->title)}}">
                                </div>                                
                                @error('title')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-span-full">
                            <div class="grid grid-cols-1 sm:grid-cols-6">
                                <div class="col-span-4">
                                    <label for="body" class="block text-sm/6 font-medium text-gray-900">ad</label>
                                    <textarea name="body" id="body" rows="8"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:border-indigo-600 focus:ring-indigo-600 sm:text-sm 
                                        @error('body') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror">{{ old('body', $ad->body)}}</textarea>
                                </div>
                            </div>
                                @error('body')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-3 text-sm/6 text-gray-600">Write your ad here</p>

                        </div>

                                                <div class="sm:col-span-3">
                            <label for="title" class="block text-sm/6 font-medium text-gray-900">Price</label>
                            <div class="mt-2">
                                <div class="flex items-center rounded-md bg-white pl-3 border border-gray-300 focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600 @error('title') border-red-500 focus-within:border-red-500 focus-within:ring-red-500 @enderror">
                                    <span class="px-3 text-gray-500">€</span>
                                    <input type="text" name="price" id="price" 
                                        class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 
                                        placeholder:text-gray-400 focus:outline-none sm:text-sm @error('price') text-red-500 @enderror" 
                                        value="{{ old('price', $ad->price)}}">
                                </div>                                
                            @error('price')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            </div>
                        </div>
                        
                        {{-- <div class="col-span-full">
                            <div class="grid grid-cols-1 sm:grid-cols-6">
                                <div class="col-span-3">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
                                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        id="file_input" type="file" name="image">
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="sm:col-span-2">
                            <label for="categoryId" class="block text-sm/6 font-medium text-gray-900">Category</label>
                            <div class="mt-2 grid grid-cols-1">
                                <select id="categoryId" type="text" name="category_id"
                                    class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected(old('category_id', $ad->category_id) == $category->id)>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                    {{ $ad->category_id }}
                                </select>
                            </div>
                        </div> --}}

                        {{-- <div class="col-span-full">
                            <div class="grid grid-cols-1 sm:grid-cols-6">
                                <div class="sm:col-span-1">
                                    <input id="is_premium" type="checkbox" name="is_premium" value="1" 
                                        class="w-4 h-4 text-purple-600 bg-gray-100 border border-gray-300 rounded-sm"
                                        @if(old('is_premium', $ad->is_premium) == 1) checked @endif>
                                    <label for="is_premium" class="ms-2 text-sm font-medium text-gray-900">Premium ad</label>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-x-6 mt-6">
                <a href="{{ url()->previous() }}" type="button" class="text-sm/6 font-semibold text-gray-900">
                    Cancel
                </a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Save
                </button>
            </div>
        </form> 
    </div>
</div>


@endsection