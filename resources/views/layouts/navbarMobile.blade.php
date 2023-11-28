<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <div class="flex flex-col ml-5 mt-5">
            <span class="text-2xl font-semibold whitespace-nowrap dark:text-white">
                {{ $greeting ?? '' }},
            </span>
            <span class="text-xl font-semibold whitespace-nowrap dark:text-white">
                {{ Auth::user()->full_name }}</span>
        </div>
        <div class="flex items-center mr-2 mt-4 md:order-2">
            <button type="button"
                class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom">
                <img class="w-11 h-11 object-cover rounded-full" src="{{ Auth::user()->murid->image }}" alt="user photo">
            </button>
        </div>
    </div>
</nav>
