<template>
  <q-layout
    view="lHh lpr lff"
    class="tw-bg-white tw-h-full"
  >
    <!-- eslint-disable-next-line vue/attribute-hyphenation -->
    <Header :isAdmin="admin" />

    <Footer />

    <q-page-container>
      <slot />
    </q-page-container>
  </q-layout>
</template>

<script setup>
const admin = false
</script>
