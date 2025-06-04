<form class="flex items-center justify-center">
  <select id="dropdown" class="rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 sm:w-auto">
    <option value="" selected>Filter by category</option>
    @foreach ( $categories as $category )
        <option value="{{ $category->id }}"
          class="category-checkbox ml-2 rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900">
          {{ $category->name }}
        </option>
    @endforeach
  </select>
</form>

