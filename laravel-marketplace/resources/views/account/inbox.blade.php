@extends('layouts.app')

@section('content')

<!-- component -->
<main class="flex max-h-[calc(100vh-64px)] w-full flex-grow rounded-3xl">
    {{-- Inbox --}}
    <section class="flex flex-col border-r border-gray-300 w-4/12 bg-gray-50 h-fill overflow-y-auto">
      <label class="px-3">
        <input class="rounded-lg px-4 py-2 my-3 bg-gray-100 border border-gray-300 transition duration-200 focus:outline-none focus:ring-2 w-full"
          placeholder="Search..." />
      </label>

      @if ($conversations->where('messages', '!=', collect())->isEmpty())
        <p class="text-gray-500 p-10 ">No messages yet</p>
        @else
          @foreach ($conversations as $conversation)
          <a href="{{ route('account.inbox', ['user' => auth()->id(), 'conversation' => $conversation->id]) }}" class="flex flex-col">
              <ul>
                <li class="py-5 px-7 border-b border-gray-300 hover:bg-blue-100 
                  {{ $conversation->id == optional($activeConversation)->id ? 'bg-blue-200' : ($loop->even ? 'bg-gray-100' : 'bg-white') }}">
                    <h3 class="text-lg font-semibold max-w-[90%] truncate">{{ $conversation->buyer->name }}</h3>
                    <p class="text-md text-gray-400 max-w-[90%] truncate">{{ $conversation->ad->limitedTitle }}</p>
                  <div class="text-md italic text-gray-400 max-w-[90%] truncate">
                    @if ($conversation->messages->isNotEmpty())
                        {{ $conversation->messages->last()->body }}
                    @else
                        <span class="text-gray-400 italic">No messages yet</span>
                    @endif
                  </div>
                </li>
              </ul>
          </a>
          @endforeach
        @endif
    </section>

    {{-- Message information --}}
    <section class="w-full flex flex-col bg-gray-200">
        <div class="flex justify-between items-center h-fit bg-white border-b border-gray-300 mb-8">
          @if ($activeConversation)
            <div class="flex px-10 py-5 space-x-4 items-center">
                <div class="h-20 w-30 rounded-lg overflow-hidden">
                <img src="{{ asset('storage/ads-images/' . $activeConversation->ad->image) }}" loading="lazy" class="h-full w-full object-cover" />
                </div>
                <div class="flex flex-col">
                  <h3 class="font-semibold text-lg">{{ $activeConversation->ad->limitedTitle ?? '' }}</h3>
                  <p class="text-light text-gray-400">{{ $activeConversation->buyer->name ?? '' }}</p>
                </div>
            </div>
          @endif
        </div>

        {{-- Messages --}}
        <section class="h-full space-y-7 px-15 overflow-y-auto"> 
            @if ($activeConversation)
                @foreach ($activeConversation->messages as $message)
                  <div class="w-full mb-5">
                    <div class="flex {{ $message->sender_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                      <div class="flex flex-col h-fit leading-1.5 p-10 w-200 border-gray-200
                        {{ $message->sender_id === auth()->id() ? 'bg-blue-200 rounded-s-xl rounded-ee-xl' : 'bg-white rounded-e-xl rounded-es-xl' }}">
                        {{ $message->body }}
                      </div>
                    </div>

                    <div class="flex mt-1 {{ $message->sender_id === auth()->id() ? 'justify-end mr-4' : 'justify-start ml-4' }}">
                      <p class="text-xs text-gray-400">{{ $message->created_at }}</p>
                    </div>
                  </div>

                @endforeach
            @else
                <p class="text-gray-500 p-10">Select a conversation to view messages.</p>
            @endif
        </section>

        {{-- Send message --}}
        <section class="px-15 py-5 mt-auto">
          @if ($activeConversation)
            <form class="border rounded-xl bg-gray-50" action="{{ route('inbox.store') }}" method="POST">
              @csrf
              <input type="hidden" name="conversation_id" value="{{ $activeConversation->id }}">

              <textarea name="body" class="w-full bg-gray-50 px-5 pt-5 rounded-xl focus:outline-none focus:border-transparent" placeholder="Type your reply here..." rows="3"></textarea>
              <div class="flex items-center justify-between p-2">
                <button class="h-6 w-6 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                    </svg>
                </button>
                <button type="submit" class="cursor-pointer rounded-xl bg-blue-700 px-5 py-2 text-sm font-semibold text-white shadow-xs hover:bg-blue-800 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:hover:bg-blue-800">
                  Reply
                </button>
              </div>
            </form>
          @else
          
          @endif
        </section>

    </section>
  </main>

@endsection