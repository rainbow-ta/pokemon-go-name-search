<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
import { ref } from 'vue';
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
  errors: {
    type: Object,
    required: true,
  },
});

const generateSearchWords = (pokemonName) => {
  if (form.searchWord === null)
    form.searchWord = pokemonName;
  else {
    form.searchWord += "," + pokemonName;
  }
};

const form = useForm({
  id: props.searchWords[0].id,
  tagName: props.searchWords[0].name,
  searchWord: props.searchWords[0].search_word,
})

const isSuccessMessage = ref(false);

const submit = () => {
  form.put('/name-search/' + form.id, {
    onSuccess: () => {
      isSuccessMessage.value = true
    },
    onError: () => {
      isSuccessMessage.value = false
    },
  });
}

const deleteSearchWord = () => {
  form.delete('/name-search/' + form.id, {
    onBefore: () => confirm('削除すると元には戻せなくなりますが、本当によろしいですか？'),
  })
}
</script>

<template>
  <ComponentsHeader />

  <div class="max-w-screen-2xl px-4 md:px-12 mx-auto">
    <div class="max-w-screen-md">
      <!-- TODO:コンポーネント化する -->
      <div
        v-if="isSuccessMessage"
        class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
        role="alert"
      >
        <font-awesome-icon icon="fa-solid fa-circle-check" />
        保存しました。
      </div>


      <div
        v-if="Object.keys(errors).length"
        class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
        role="alert"
      >
        <template
          v-for="(value, key) in errors"
          :key="key"
        >
          <p>
            <font-awesome-icon icon="fa-solid fa-circle-check" />
            {{ value }}
          </p>
        </template>
      </div>


      <form @submit.prevent="submit">
        <div class="max-w-screen-md mb-5 flex justify-between items-center">
          <div>
            <h1 class="text-2xl font-extrabold truncate">
              {{ form.tagName }}
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
              v-model="form.searchWord"
              rows="8"
              class="block px-0 w-full text-sm text-gray-800 bg-white border-0 focus:ring-0"
            />
          </div>
        </div>

        <div class="flex justify-end mt-5">
          <!-- TODO:ボタンをコンポーネント化する -->
          <button
            type="submit"
            :disabled="form.processing"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-5"
          >
            保存
          </button>
          <button
            type="submit"
            :disabled="form.processing"
            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
            @click="deleteSearchWord"
          >
            削除
          </button>
        </div>
      </form>
    </div>
  </div>
</template>
