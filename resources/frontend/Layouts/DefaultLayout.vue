<!-- eslint-disable vue/html-self-closing -->
<!-- eslint-disable vue/no-v-html -->
<template>
  <q-layout
    view="lHh lpr lFf"
    container
    style="height: 100vh"
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
          class="q-pa-md"
        >
          <slot name="content" />
        </main>
      </FadeTransaction>
    </q-page-container>
  </q-layout>
</template>

<script setup>

</script>
