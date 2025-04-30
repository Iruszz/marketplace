<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
          <div class="hidden sm:ml-6 sm:block">
            <div class="flex space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="/articles" class="{{ request()->is('articles') ? 'bg-gray-900 text-white': 'text-gray-300 hover:bg-gray-700 hover:text-white'}} rounded-md px-3 py-2 text-sm font-medium" aria-current="page">
                <span>Articles</span>
              </a>
              @auth
              <a href="{{ route('user.articles', ['user' => auth()->user()->id]) }}" 
                class="{{ request()->is('user/' . $user->id . '/articles') ? 'bg-gray-900 text-white': 'text-gray-300 hover:bg-gray-700 hover:text-white'}} rounded-md px-3 py-2 text-sm font-medium">
                  <span>My articles</span>
              </a>
              @endauth
            </div>
          </div>
        </div>
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          <!-- Profile dropdown -->
          <div class="relative ml-3">
            <div class="hidden sm:ml-6 sm:block">
              <div class="flex space-x-4">
                @guest
                  <a href="/login" class="{{ request()->is('login') ? 'bg-gray-900 text-white': 'text-gray-300 hover:bg-gray-700 hover:text-white'}} rounded-md px-3 py-2 text-sm font-medium" aria-current="page">
                    <span>Log in</span>
                  </a>
                  <a href="/register" class="{{ request()->is('register') ? 'bg-gray-900 text-white': 'text-gray-300 hover:bg-gray-700 hover:text-white'}} rounded-md px-3 py-2 text-sm font-medium" aria-current="page">
                    <span>Register</span>
                  </a>
                @endguest
  
                @auth
                  <div class="flex space-x-4">
                    @if (!request()->is('premium/index'))
                      <a href="{{ route('premium.index') }}" 
                        class="text-white bg-purple-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex items-center space-x-4 rounded-md px-3 py-1 text-sm font-medium">
                          <span>Premium subscription</span>
                      </a>
                    @endif
                  </div>
  
                    <div class="flex space-x-4">
                      @if (!request()->is('articles/create'))
                        <a href="{{ route('articles.create') }}" 
                          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex items-center space-x-4 rounded-md px-3 py-1 text-sm font-medium">
                            <span>New article</span>
                        </a>
                      @endif
                    </div>
                  @endauth
  
                    @if(isset($showCategory) && $showCategory)
                      @include('partials.category')
                    @endif
                  
                  @auth
                    <div class="flex space-x-4">
                      <form method="POST" action="/logout">
                        @csrf
                        <button class="{{ request()->is('logout') ? 'bg-gray-900 text-white': 'text-gray-300 hover:bg-gray-700 hover:text-white'}} rounded-md px-3 py-2 text-sm font-medium">
                          <span>Log out</span>
                        </button>
                      </form>
                    </div>
                  @endauth
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  