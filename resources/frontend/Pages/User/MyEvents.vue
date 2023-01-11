
<template layout="AppShell,Layout">
  <Head title="Meus Eventos" />

  <EventTable :events="events" />
</template>

<script setup>
defineProps({
  events: Object
})
</script>

<style lang="scss" scoped>

</style>
