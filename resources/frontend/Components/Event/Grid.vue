<template>
  <div class="row q-gutter-md">
    <EventCard
      v-for="event in events"
      :key="event.id"
      :event="event"
      class="col"
    />
  </div>
</template>

<script setup>
defineProps({
  events: Array
})
</script>

<style lang="scss" scoped>
  .my-card {
    width: 250px;
    max-width: 250px;
    min-width: 250px;
  }
</style>
