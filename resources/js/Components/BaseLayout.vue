<script setup>
import ComponentsHeader from '@/Components/ComponentsHeader.vue';
</script>

<template>
  <div class="max-w-screen-xl px-4 md:px-8 mx-auto">
    <components-header />
    <header>
      <slot name="header" />
    </header>
    <main>
      <slot />
    </main>
    <footer>
      <slot name="footer" />
    </footer>
  </div>
</template>
