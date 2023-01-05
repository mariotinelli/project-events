<template>
  <q-card class="my-card">
    <img src="https://cdn.quasar.dev/img/mountains.jpg">

    <q-card-section>
      <div class="text-h6">
        {{ event.title }}
      </div>
      <div class="text-subtitle2">
        {{ event.date }}
      </div>
    </q-card-section>

    <q-card-section class="q-pt-none">
      {{ event.description }}
    </q-card-section>
  </q-card>
</template>

<script setup>
defineProps({
  event: Object
})
</script>
