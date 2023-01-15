<!-- eslint-disable vue/attribute-hyphenation -->

<template layout="AppShell,Layout">
  <Head title="Novo Evento" />

  <div class="bg-white tw-w-3/4 tw-mx-auto tw-my-10 tw-shadow tw-shadow-black tw-rounded">
    <h3 class="tw-text-center q-pa-md bg-blue tw-text-white">
      Novo Evento
    </h3>

    <q-separator />

    <EventForm :validationErrors="errors" />
  </div>
</template>

<script setup>

defineProps({
  errors: Object
})

</script>

<style lang="scss" scoped>

</style>
