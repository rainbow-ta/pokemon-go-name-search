<script setup>
import { ref, } from 'vue';
import ComponentsHeader from '@/Components/ComponentsHeader.vue';
import SuggestInput from '@/Components/SuggestInput.vue';

const props = defineProps({
  filters: {
    type: Array,
    required: true,
  },
  pokemons: {
    type: Array,
    required: true,
  },
  searchWords: {
    type: Array,
    required: true,
  },
});

const refSearchWords = ref(props.searchWords[0].search_word);

const generateSearchWords = (pokemonName) => {
  if (refSearchWords.value.length)
    refSearchWords.value += "," + pokemonName;
  else {
    refSearchWords.value = pokemonName;
  }
};
</script>

<template>
  <ComponentsHeader />

  <div class="max-w-screen-2xl px-4 md:px-12 mx-auto">
    <div class="max-w-screen-md">
      <div class="max-w-screen-md mb-5 flex justify-between items-center">
        <div>
          <h1 class="text-2xl font-extrabold truncate">
            {{ props.searchWords[0].name }}
          </h1>
        </div>
      </div>

      <suggest-input
        :pokemons="pokemons"
        @completeUserInputEvent="generateSearchWords"
      />

      <div class="bg-gray-50 rounded-lg border border-gray-200 mt-10">
        <div class="flex justify-between items-center py-1 px-3 border-b">
          <button
            type="button"
            data-tooltip-target="tooltip-fullscreen"
            class="p-2 rounded cursor-pointer sm:ml-auto hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600"
          >
            <svg
              aria-hidden="true"
              class="w-5 h-5"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            ><path
              fill-rule="evenodd"
              d="M3 4a1 1 0 011-1h4a1 1 0 010 2H6.414l2.293 2.293a1 1 0 11-1.414 1.414L5 6.414V8a1 1 0 01-2 0V4zm9 1a1 1 0 010-2h4a1 1 0 011 1v4a1 1 0 01-2 0V6.414l-2.293 2.293a1 1 0 11-1.414-1.414L13.586 5H12zm-9 7a1 1 0 012 0v1.586l2.293-2.293a1 1 0 111.414 1.414L6.414 15H8a1 1 0 010 2H4a1 1 0 01-1-1v-4zm13-1a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 010-2h1.586l-2.293-2.293a1 1 0 111.414-1.414L15 13.586V12a1 1 0 011-1z"
              clip-rule="evenodd"
            /></svg>
            <span class="sr-only">Full screen</span>
          </button>
          <div
            id="tooltip-fullscreen"
            role="tooltip"
            class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700"
          >
            Show full screen
            <div
              class="tooltip-arrow"
              data-popper-arrow
            />
          </div>
        </div>
        <div class="py-2 px-4 bg-white rounded-b-lg">
          <label
            for="editor"
            class="sr-only"
          >Publish post</label>
          <textarea
            id="editor"
            v-model="refSearchWords"
            rows="8"
            class="block px-0 w-full text-sm text-gray-800 bg-white border-0 focus:ring-0"
          />
        </div>
      </div>
    </div>
  </div>
</template>
