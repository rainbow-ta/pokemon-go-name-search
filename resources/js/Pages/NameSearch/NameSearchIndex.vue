<script setup>
import ComponentsHeader from '@/Components/ComponentsHeader.vue';

defineProps({
  searchLists: {
    type: Array,
    required: true,
  },
});
</script>

<template>
  <ComponentsHeader />
  <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
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
        placeholder="タグ名を入力してください"
      >

      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-5">
        保存
      </button>
    </div>
    <div class="flex justify-center">
      <table class="table-fixed min-w-full">
        <thead class="bg-gray-50">
          <tr>
            <th class="w-1/12 px-4 py-2">
              コピー
            </th>
            <th class="w-10/12 px-4 py-2">
              保存済みのタグ
            </th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="searchList in searchLists"
            :key="searchList.id"
          >
            <td class="border px-4 py-2 flex justify-center">
              <span class="cursor-pointer"><font-awesome-icon icon="fa-solid fa-copy" /></span>
            </td>
            <td class="border px-4 py-2">
              <!-- TODO:hover時に何かアニメーション付与する -->
              <a :href="`/name-search/${searchList.id}/edit`">
                {{ searchList.name }}
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
