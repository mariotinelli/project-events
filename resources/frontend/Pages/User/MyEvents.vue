
<template layout="AppShell,Layout">
  <Head title="Meus Eventos" />

  <EventTable :events="events" />
</template>

<script setup>
defineProps({
  events: Array
})
</script>

<style lang="scss" scoped>

</style>
