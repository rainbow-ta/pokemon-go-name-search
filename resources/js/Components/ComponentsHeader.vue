<template>
  <div class="bg-white mb-8 lg:mb-16">
    <div class="max-w-screen-xl px-4 md:px-8 mx-auto">
      <header class="flex justify-between items-center py-4 md:py-8">
        <!-- logo - start -->
        <a
          href="/name-search"
          class="inline-flex items-center text-black-800 text-2xl md:text-3xl font-bold gap-2.5"
          aria-label="logo"
        >
          <img
            src="https://img.icons8.com/dusk/64/000000/pokemon-go.png"
            alt="ポケモンGOのアイコン"
          >
          PokemonGO Name Search
        </a>
        <!-- logo - end -->

        <!-- buttons - start -->
        <div class="hidden lg:flex flex-col sm:flex-row sm:justify-center lg:justify-start gap-2.5 -ml-8">
          <a
            href="#"
            class="inline-block focus-visible:ring ring-indigo-300 text-gray-500 hover:text-indigo-500 active:text-indigo-600 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-4 py-3"
          >Sign in</a>

          <a
            href="#"
            class="inline-block bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 focus-visible:ring ring-indigo-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3"
          >Sign up</a>
        </div>

        <button
          type="button"
          class="inline-flex items-center lg:hidden bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold rounded-lg gap-2 px-2.5 py-2"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6"
            viewBox="0 0 20 20"
            fill="currentColor"
          >
            <path
              fill-rule="evenodd"
              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
              clip-rule="evenodd"
            />
          </svg>

          Menu
        </button>
        <!-- buttons - end -->
      </header>
    </div>
  </div>
</template>