<template layout="AppShell">
  <div class="tw-p-6">
    <Head :title="title" />

    <h1 class="text-h4">
      {{ title }}
    </h1>
  </div>
</template>

<script setup>
defineProps({
  title: String
})
</script>
