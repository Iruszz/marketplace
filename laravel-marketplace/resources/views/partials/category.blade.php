<div class="relative inline-block">
  <select id="dropdown"
    class="appearance-none rounded-lg border border-gray-200 bg-white pl-3 pr-10 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none">
    <option value="" selected>Filter by category</option>
    @foreach ($categories as $category)
      <option value="{{ $category->id }}"
        class="relative border rounded-md {{ getCategoryClasses($category->color) }}">
          ■ {{ $category->name }}
      </option>
    @endforeach
  </select>

  <div class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
    <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
    </svg>
  </div>
</div>


