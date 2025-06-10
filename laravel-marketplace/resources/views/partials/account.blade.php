        <div class="relative ml-3">
          <div>
            <button type="button" class="relative flex w-10 h-10 rounded-full bg-gray-800 text-sm
                {{ request()->is('user/' . auth()->user()->id . '/index') ? 'bg-gray-900 stroke-white': 'stroke-gray-300 hover:bg-gray-700 hover:stroke-white'}}" 
                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">Open user menu</span>
                <svg class="w-full h-full stroke-[1.5] " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>

            </button>
          </div>

          <!--
            Dropdown menu, show/hide based on menu state.

            Entering: "transition ease-out duration-100"
              From: "transform opacity-0 scale-95"
              To: "transform opacity-100 scale-100"
            Leaving: "transition ease-in duration-75"
              From: "transform opacity-100 scale-100"
              To: "transform opacity-0 scale-95"
          -->
          <div id="user-dropdown" class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <!-- Active: "bg-gray-100 outline-hidden", Not Active: "" -->
            <a href="{{ route('account.index', ['user' => auth()->user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Dashboard</a>
            <a href="{{ route('account.inbox') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Inbox</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
            <form method="POST" action="/logout">
                @csrf
                <button class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">
                <span>Log out</span>
                </button>
            </form>
          </div>
        </div>

<script>
  const menuButton = document.getElementById('user-menu-button');
  const dropdown = document.getElementById('user-dropdown');

  menuButton.addEventListener('click', (event) => {
    dropdown.classList.toggle('hidden');
    dropdown.classList.toggle('opacity-0');
    dropdown.classList.toggle('scale-95');
    dropdown.classList.toggle('opacity-100');
    dropdown.classList.toggle('scale-100');
  });

  // Optional: close when clicking outside
  document.addEventListener('click', function (event) {
    const isClickInside = menuButton.contains(event.target) || dropdown.contains(event.target);

    if (!isClickInside) {
      dropdown.classList.add('hidden');
      dropdown.classList.remove('opacity-100', 'scale-100');
      dropdown.classList.add('opacity-0', 'scale-95');
    }
  });
</script>
