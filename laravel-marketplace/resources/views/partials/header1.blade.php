@if (!empty(trim($__env->yieldContent('title'))))
<header class="bg-white shadow-sm">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h2 class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">@yield('title', 'Default Title')</h2>
        <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
            <div class="mt-2 flex items-center text-sm text-gray-500">
                <h2>@yield('heading', 'Default Heading')</h2>
            </div>
        </div>
    </div>
</header>
@endif