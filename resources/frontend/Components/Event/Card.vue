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

    <q-card-actions align="left">
      <q-btn
        no-caps
        color="secondary"
      >
        <i-fe-check />
        Participar
      </q-btn>
      <q-btn
        no-caps
        color="info"
      >
        <i-fe-eye />
        Ver mais
      </q-btn>
    </q-card-actions>
  </q-card>
</template>

<script setup>
defineProps({
  event: Object
})
</script>
