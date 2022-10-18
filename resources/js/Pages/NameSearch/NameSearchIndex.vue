<script setup>
import ComponentsHeader from '@/Components/ComponentsHeader.vue';

defineProps({
  searchWords: {
    type: Array,
    required: true,
  },
});
</script>

<template>
  <ComponentsHeader />
  <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
    <div class="mb-5">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-5">
        Button
      </button>
      <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
        Button
      </button>
    </div>
    <div class="flex justify-center">
      <table class="table-fixed min-w-full">
        <thead>
          <tr>
            <th class="w-1/12 px-4 py-2">
              選択
            </th>
            <th class="w-1/12 px-4 py-2">
              コピー
            </th>
            <th class="w-10/12 px-4 py-2">
              保存した検索ワード
            </th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="searchWord in searchWords"
            :key="searchWord.id"
          >
            <td class="border px-4 py-2">
              <div class="form-check flex justify-center">
                <input
                  id="flexCheckDefault3"
                  class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 my-1 align-top bg-no-repeat bg-center bg-contain float-left cursor-pointer"
                  type="checkbox"
                  value=""
                >
              </div>
            </td>
            <td class="border px-4 py-2 flex justify-center">
              <span class="cursor-pointer"><font-awesome-icon icon="fa-solid fa-copy" /></span>
            </td>
            <td class="border px-4 py-2">
              {{ searchWord.name }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
