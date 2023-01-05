<template>
  <DefaultLayout>
    <template #content>
      <EventGrid :events="events" />
      <q-pagination
        v-model="current"
        :max="events.length"
        direction-links
        flat
        color="grey"
        active-color="primary"
        gutter="20px"
      />
    </template>
  </DefaultLayout>
</template>

<script setup>
const current = ref(1)
const events = [
  {
    title: 'Event',
    description: 'This is a description of the event',
    date: '2020-03-03'
  },
  {
    title: 'Event 2',
    description: 'This is a description of the event',
    date: '2020-03-03'
  },
  {
    title: 'Event 3',
    description: 'This is a description of the event',
    date: '2020-03-03'
  }
]
</script>
