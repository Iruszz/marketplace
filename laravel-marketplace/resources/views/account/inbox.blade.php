@extends('layouts.app')

@section('content')

<!-- component -->
<main class="flex w-full flex-grow items-stretch shadow-lg rounded-3xl">
    <section class="flex flex-col pt-3 w-4/12 bg-gray-50 h-full overflow-y-scroll">
      <label class="px-3">
        <input class="rounded-lg p-4 bg-gray-100 transition duration-200 focus:outline-none focus:ring-2 w-full"
          placeholder="Search..." />
      </label>

      <ul class="mt-6">
        <li class="py-5 border-b px-3 transition hover:bg-blue-100">
          <a href="#" class="flex justify-between items-center">
            <h3 class="text-lg font-semibold">Akhil Gautam</h3>
            <p class="text-md text-gray-400">23m ago</p>
          </a>
          <div class="text-md italic text-gray-400">You have been invited!</div>
        </li>
        <li class="py-5 border-b px-3 transition hover:bg-blue-100">
          <a href="#" class="flex justify-between items-center">
            <h3 class="text-lg font-semibold">Akhil Gautam</h3>
            <p class="text-md text-gray-400">23m ago</p>
          </a>
          <div class="text-md italic text-gray-400">You have been invited!</div>
        </li>
        <li class="py-5 border-b px-3 transition hover:bg-blue-100">
          <a href="#" class="flex justify-between items-center">
            <h3 class="text-lg font-semibold">Akhil Gautam</h3>
            <p class="text-md text-gray-400">23m ago</p>
          </a>
          <div class="text-md italic text-gray-400">You have been invited!</div>
        </li>
        <li class="py-5 border-b px-3 transition hover:bg-blue-100">
          <a href="#" class="flex justify-between items-center">
            <h3 class="text-lg font-semibold">Akhil Gautam</h3>
            <p class="text-md text-gray-400">23m ago</p>
          </a>
          <div class="text-md italic text-gray-400">You have been invited!</div>
        </li>
        <li class="py-5 border-b px-3 focus:bg-blue-600 focus:text-white">
          <a href="#" class="flex justify-between items-center">
            <h3 class="text-lg font-semibold">Akhil Gautam</h3>
            <p class="text-md text-gray-400">23m ago</p>
          </a>
          <div class="text-md text-gray-400">You have been invited!</div>
        </li>
        <li class="py-5 border-b px-3 transition hover:bg-blue-100">
          <a href="#" class="flex justify-between items-center">
            <h3 class="text-lg font-semibold">Akhil Gautam</h3>
            <p class="text-md text-gray-400">23m ago</p>
          </a>
          <div class="text-md italic text-gray-400">You have been invited!</div>
        </li>
        <li class="py-5 border-b px-3 transition hover:bg-blue-100">
          <a href="#" class="flex justify-between items-center">
            <h3 class="text-lg font-semibold">Akhil Gautam</h3>
            <p class="text-md text-gray-400">23m ago</p>
          </a>
          <div class="text-md italic text-gray-400">You have been invited!</div>
        </li>
      </ul>
    </section>
    <section class="w-full flex flex-col bg-gray-200">
        <div class="flex justify-between items-center h-48 border-b-2 mb-8">
            <div class="flex px-15 space-x-4 items-center">
                <div class="h-12 w-12 rounded-full overflow-hidden">
                <img src="https://bit.ly/2KfKgdy" loading="lazy" class="h-full w-full object-cover" />
                </div>
                <div class="flex flex-col">
                <h3 class="font-semibold text-lg">Akhil Gautam</h3>
                <p class="text-light text-gray-400">akhil.gautam123@gmail.com</p>
                </div>
            </div>
        </div>

        <section class="space-y-7 px-15">
            <div class="h-fit w-200 bg-white text-gray-800 p-10 rounded-2xl">
                Quisque eget rhoncus nisi. Phasellus vulputate nisi arcu, nec pretium mi consectetur vitae. Nam egestas felis eu nibh posuere dictum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent quam enim, iaculis at feugiat sagittis, lacinia vel tortor. Nullam consectetur condimentum libero, ac bibendum diam. Nullam facilisis non tellus et vehicula. Vestibulum lacinia purus sodales lacus rhoncus sollicitudin. Maecenas eleifend sapien sollicitudin lectus auctor molestie. In mi nunc, elementum et laoreet at, porta eu nibh.
            </div>

            <div class="h-fit w-200 bg-blue-300 text-gray-800 p-10 rounded-2xl ml-auto">
                Nulla lacus tortor, efficitur nec accumsan at, porta ut sem. Maecenas sed lacus ipsum. Proin nec diam euismod, rutrum nulla.
            </div>
        </section>

        <section class="px-15">
            <div class="mt-6 border rounded-xl bg-gray-50 mb-3">
                <textarea class="w-full bg-gray-50 p-2 rounded-xl" placeholder="Type your reply here..." rows="3"></textarea>
                <div class="flex items-center justify-between p-2">
                <button class="h-6 w-6 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                    </svg>
                </button>
                <button class="bg-blue-700 text-white px-6 py-2 rounded-xl">Reply</button>
                </div>
            </div>
        </section>

    </section>
  </main>

@endsection