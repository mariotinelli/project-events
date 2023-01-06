<template>
  <UserHeader v-if="!isAdmin" />
  <AdminHeader v-if="isAdmin" />
</template>

<script setup>
defineProps({
  isAdmin: Boolean
})
</script>
