<script setup>
import { ref, watch, } from 'vue';

const props = defineProps({
  pokemons: {
    type: Array,
    required: true
  },
});

let shapingInputValue;
const results = ref([]);
const inputValue = ref("");
const current = ref("0");
const isHover = ref(false);
const isFocus = ref(false);

watch(inputValue, () => {
  if (isFocus.value && inputValue.value.length >= 1) {
    shapingInputValue = hiraganaToKatakana(inputValue.value);
    results.value = props.pokemons.filter((pokemon) => {
      return pokemon.name.search(shapingInputValue) != -1;
    });
  }
})

const changeFocus = () => isFocus.value = !isFocus.value;
const changeHover = () => isHover.value = !isHover.value;

const closeSuggestionList = () => {
  if (isHover.value) return;
  changeFocus();
}

function hiraganaToKatakana(src) {
  return src.replace(/[\u3041-\u3096]/g, function(match) {
    const chr = match.charCodeAt(0) + 0x60;
    return String.fromCharCode(chr);
  });
}

const suggestionClick = (pokemon) => {
  changeHover();
  closeSuggestionList();

  current.value = 0;
  inputValue.value = pokemon;
  results.value = [];
}
</script>

<template>
  <div>
    <input
      v-model="inputValue"
      type="text"
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
      placeholder="ポケモン or フィルターを検索"
      autocomplete="off"
      @focus="changeFocus"
      @blur="closeSuggestionList"
    >

    <ul
      v-show="isFocus && results.length"
      class="w-48 text-sm font-medium mt-1 text-gray-900 bg-white rounded-lg border border-gray-200"
    >
      <li
        v-for="result in results"
        :key="result.id"
        class="block py-2 px-4 w-full border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700"
        @click="suggestionClick(result.name)"
        @mouseover="changeHover"
        @mouseleave="changeHover"
      >
        {{ result.name }}
      </li>
    </ul>
  </div>
</template>