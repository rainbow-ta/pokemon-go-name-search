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
    <div class="mb-10">
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
      </div>

      <div class="flex items-center">
        <label
          for="default-toggle"
          class="inline-flex relative items-center cursor-pointer mr-5"
        >
          <input
            id="default-toggle"
            type="checkbox"
            value=""
            class="sr-only peer"
          >
          <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600" />
          <span class="ml-3">ポケモン</span>
        </label>
        <label
          for="default-toggle"
          class="inline-flex relative items-center cursor-pointer mr-5"
        >
          <input
            id="default-toggle"
            type="checkbox"
            value=""
            class="sr-only peer"
          >
          <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600" />
          <span class="ml-3">検索フィルター</span>
        </label>
        <label
          for="default-toggle"
          class="inline-flex relative items-center cursor-pointer mr-5"
        >
          <input
            id="default-toggle"
            type="checkbox"
            value=""
            class="sr-only peer"
          >
          <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600" />
          <span class="ml-3">保存した条件</span>
        </label>
        <label
          for="default-toggle"
          class="inline-flex relative items-center cursor-pointer"
        >
          <input
            id="default-toggle"
            type="checkbox"
            value=""
            class="sr-only peer"
          >
          <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600" />
          <span class="ml-3">検索文字列</span>
        </label>
      </div>
    </div>

    <div class="grid grid-cols-6 mb-5">
      <label
        v-for="filter in filters"
        :key="filter.id"
        for=""
        class="mb-2"
      >
        <div class="flex items-center mb-1">
          <input
            id="flexCheckDefault3"
            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 my-1 align-top bg-no-repeat bg-center bg-contain float-left cursor-pointer"
            type="checkbox"
            value=""
          >
          <span class="ml-3">{{ filter.name }}</span>
        </div>
        <div class="ml-5">
          <label for="">
            <input
              id="flexCheckDefault3"
              class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 my-1 align-top bg-no-repeat bg-center bg-contain float-left cursor-pointer"
              type="checkbox"
              value=""
            >
            <span class="ml-3">&検索</span>
          </label>
        </div>
      </label>
    </div>

    <div class="grid grid-cols-6">
      <label
        v-for="pokemon in pokemons"
        :key="pokemon.pokedex_no"
        for=""
      >
        <div class="flex items-center">
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
        </div>
        <div class="ml-5">
          <label for="">
            <input
              id="flexCheckDefault3"
              class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 my-1 align-top bg-no-repeat bg-center bg-contain float-left cursor-pointer"
              type="checkbox"
              value=""
            >
            <span class="ml-3">&検索</span>
          </label>
        </div>
      </label>
    </div>
  </div>
</template>
