<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import BaseLayout from '@/Components/BaseLayout.vue';
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

defineProps({
  searchWords: {
    type: Object,
    required: true,
  },
  errors: {
    type: Object,
    required: true,
  },
});

const form = useForm({
  tagName: null,
})
const isSuccessMessage = ref(false);

const submit = () => {
  Inertia.post('/name-search', form, {
    onSuccess: () => {
      form.reset('tagName'),
      isSuccessMessage.value = true
    },
    onError: () => {
      isSuccessMessage.value = false
    },
  })
}
</script>

<template>
  <base-layout>
    <div class="max-w-screen-xl px-4 md:px-8 mx-auto">
      <div
        v-if="isSuccessMessage"
        class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
        role="alert"
      >
        <font-awesome-icon icon="fa-solid fa-circle-check" />
        タグ名を保存しました。
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
        <div class="flex items-center mb-5">
          <input
            v-model="form.tagName"
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

          <button
            type="submit"
            :disabled="form.processing"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-5"
          >
            保存
          </button>
        </div>
      </form>

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
              v-for="searchWord in searchWords"
              :key="searchWord.id"
            >
              <td class="border px-4 py-2 flex justify-center">
                <span class="cursor-pointer"><font-awesome-icon icon="fa-solid fa-copy" /></span>
              </td>
              <td class="border px-4 py-2">
                <!-- TODO:hover時に何かアニメーション付与する -->
                <a :href="`/name-search/${searchWord.id}/edit`">
                  {{ searchWord.tag_name }}
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- TODO:ページネーションを実装する -->
    </div>
  </base-layout>
</template>
