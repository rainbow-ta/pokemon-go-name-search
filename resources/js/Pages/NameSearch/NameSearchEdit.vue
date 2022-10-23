<script setup>
import ComponentsHeader from '@/Components/ComponentsHeader.vue';

defineProps({
  filters: {
    type: Array,
    required: true,
  },
  pokemons: {
    type: Array,
    required: true,
  },
  searchListFilters: {
    type: Array,
    required: true,
  },
});

const makeImagePath = pokedexNo => {
  const zeroPaddingNo = String(pokedexNo).padStart(3, "0");

  return `/images/pokemon/sprites/${zeroPaddingNo}MS.png`;
};
</script>

<template>
  <ComponentsHeader />

  <div class="max-w-screen-2xl px-4 md:px-12 mx-auto">
    <div class="mb-5">
      <div class="flex items-center mb-5">
        <input
          id="exampleSearch"
          type="search"
          class="
            form-control
            block
            w-full
            px-3
            py-1.5
            text-base
            font-normal
            text-gray-700
            bg-white bg-clip-padding
            border border-solid border-gray-300
            rounded
            transition
            ease-in-out
            m-0
            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
            mr-5
            w-96
          "
          placeholder="Search"
        >

        <button class="bg-gray-200 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded mr-3">
          コピー
        </button>

        <button class="bg-gray-200 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded">
          検索文字列を表示
        </button>
      </div>

      <div class="flex items-center">
        <div
          class="inline-flex rounded-md shadow-sm"
          role="group"
        >
          <button
            type="button"
            class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white"
          >
            ポケモン
          </button>
          <button
            type="button"
            class="py-2 px-4 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white"
          >
            検索フィルタ
          </button>
          <button
            type="button"
            class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-r-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white"
          >
            保存した条件
          </button>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-6">
      <label
        v-for="filter in filters"
        :key="filter.id"
        for=""
        class="flex items-center"
      >
        <input
          id="flexCheckDefault3"
          class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 my-1 align-top bg-no-repeat bg-center bg-contain float-left cursor-pointer"
          type="checkbox"
          value=""
        >
        <span class="ml-3">{{ filter.name }}</span>
      </label>
    </div>

    <div class="grid grid-cols-6">
      <label
        v-for="pokemon in pokemons"
        :key="pokemon.pokedex_no"
        for=""
        class="flex items-center"
      >
        <input
          id="flexCheckDefault3"
          class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 my-1 align-top bg-no-repeat bg-center bg-contain float-left cursor-pointer"
          type="checkbox"
          value=""
        >
        <img
          :alt="pokemon.name"
          :src="makeImagePath(pokemon.pokedex_no)"
        >
        <span>{{ pokemon.name }}</span>
      </label>
    </div>
  </div>
</template>
