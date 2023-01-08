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

    <q-separator />

    <q-card-actions align="between">
      <q-btn
        no-caps
        color="green-14"
      >
        <i-fe-check />
        Participar
      </q-btn>
      <q-btn
        no-caps
        color="indigo-13"
      >
        <i-fe-eye />
        Ver mais
      </q-btn>
      <q-btn
        no-caps
        align="right"
        class="hover:tw-text-red-900"
      >
        <i-fe-heart-o />
      </q-btn>
    </q-card-actions>
  </q-card>
</template>

<script setup>
defineProps({
  event: Object
})
</script>
