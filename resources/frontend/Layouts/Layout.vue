<template>
  <q-layout
    view="lHh lpr lFf"
    class="tw-bg-slate-200 tw-h-full"
  >
    <!-- eslint-disable-next-line vue/attribute-hyphenation -->
    <Header :isAdmin="admin" />

    <Footer />

    <q-page-container>
      <FadeTransition>
        <slot />
      </FadeTransition>
    </q-page-container>
  </q-layout>
</template>

<script setup>
const admin = false
</script>
