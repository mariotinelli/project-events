<!-- eslint-disable vue/html-self-closing -->
<!-- eslint-disable vue/no-v-html -->
<template>
  <q-layout
    view="lHh lpr lFf"
    class="tw-bg-slate-200 tw-h-screen"
  >
    <q-header elevated>
      <NavbarTopNavbar />
    </q-header>

    <q-footer elevated>
      <Footer />
    </q-footer>

    <q-page-container>
      <slot name="image" />
      <FadeTransaction>
        <main
          v-if="$slots.content"
          class="q-pa-md tw-bg-slate-200"
        >
          <slot name="content" />
        </main>
      </FadeTransaction>
    </q-page-container>
  </q-layout>
</template>

<script setup>

</script>
