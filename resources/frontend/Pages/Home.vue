
<template layout="AppShell,Layout">
  <Head title="Home" />

  <div
    id="background-image"
    class="tw-w-full tw-h-96"
  />

  <div class="tw-p-6">
    <EventList />
  </div>
</template>

<script setup>

</script>

<style lang="scss" scoped>
  #background-image {
    background-image: url('../assets/images/background-image.jpg');
    background-repeat: no-repeat;
    background-size: 100% 100%;
  }
</style>
