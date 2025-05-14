@extends('layouts.app')

@section('header2')
@endsection

@section('content')

<main class="relative bg-white rounded-2xl px-4 ml-10 mr-10 pb-16 min-h-[calc(100vh-200px)]">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
        <article class="mx-auto w-full max-w-2xl mt-10 format format-sm sm:format-base lg:format-lg format-blue">
            <div class="mx-auto w-full max-w-2xl py-8">
                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900">
                        <img class="mr-4 w-10 h-10 rounded-full" src="{{ asset('storage/' . $ad->user->profile_picture) }}" alt="{{ $ad->user->name }}">
                        <div class="flex space-x-1">
                            <a class="text-base text-gray-500">By</a>
                            <a href="#" rel="author" class="text-base font-bold text-gray-900">{{ $ad->user->name }}</a>
                            <span class="pl-2 pr-2 text-gray-500">•</span>
                            <p class="text-base text-gray-500">Graphic Designer, educator</p>
                            <span class="pl-2 pr-2 text-gray-500">•</span>
                            <p class="text-base text-gray-500"><time pubdate datetime="2022-02-08" title="February 8th, 2022">{{ $ad->created_at->format('M d, Y') }}</time></p>
                        </div>
                    </div>
                </address>
            </div>

            <section class="not-format">
                <p class="lead mb-20">
                    {{ $ad->body }}
                </p>
            
                <div class="flex justify-end mb-10 gap-3">
                    @can('edit', $ad)
                        <a href="{{ route('ads.edit', $ad->id) }}" 
                        class="rounded-md px-6 py-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none text-sm font-medium">
                            <span class="flex justify-center items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                    <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                    <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                </svg>
                                Edit
                            </span>
                        </a>
                    @endcan
                    @can('delete', $ad)
                        <form method="POST" action="{{ route('ads.destroy', $ad->id) }}"
                            class="flex justify-center cursor-pointer items-center gap-2 rounded-md px-6 py-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none text-sm font-medium">
                            @csrf
                            @method('DELETE')
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 cursor-pointer">
                                <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                            </svg>
                            <input type="submit" value="Delete Ad" class="cursor-pointer"/>
                        </form>
                    @endcan
                </div>
            </section>
            
            <section>
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900">Discussion (20)</h2>
                </div>
                <form action="{{ url('ads/' . $ad->id . '/comments') }}" method="POST" class="mb-6">
                    @csrf
                    <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-100">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" rows="6" name="body"
                            class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0"
                            placeholder="Write a comment..." required></textarea>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center cursor-pointer py-2.5 px-4 text-xs font-medium text-center rounded-md px-6 py-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none text-sm font-medium">
                        Post comment
                    </button>
                </form>
                
                {{-- @foreach ($ad->comments as $comment)
                    @include('partials.post-comment', ['comment' => $comment])
                @endforeach --}}

            </section>
        </article>
    </div>
  </main>

@endsection