<template>
  <li
    class="tw-relative tw-px-[10px]"
    :class="{'tw-z-10': active}"
  >
    <Link
      v-bind="$attrs"
      class="
        tw-relative
        tw-flex
        tw-w-full
        tw-items-center
        tw-space-x-[10px]
        tw-group
        tw-transition
        tw-text-white
      "
      :class="{
        'hover:tw-border-b-2 hover:tw-border-white hover:tw-text-primary-900': !active,
        'tw-border-b-2 tw-border-white hover:tw-text-white hover:tw-cursor-default': active,
      }"
    >
      <slot />
    </Link>
  </li>
</template>

<script setup>
defineProps({
  active: Boolean
})
</script>
