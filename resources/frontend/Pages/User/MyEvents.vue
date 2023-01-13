<!-- eslint-disable vue/attribute-hyphenation -->

<template layout="AppShell,Layout">
  <Head title="Meus Eventos" />

  <EventTable
    :rows="events"
  />
</template>

<script setup>

defineProps({
  events: Object
})

</script>
