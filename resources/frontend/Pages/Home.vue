<template>
  <div
    class="tw-relative tw-flex tw-items-top tw-justify-center tw-min-h-screen tw-bg-gray-100 dark:tw-bg-gray-900 sm:tw-items-center sm:tw-pt-0"
  >
    <Head title="Welcome" />
    <NavbarTopNavbar />
    <!-- <div
      v-if="canLogin"
      class="tw-hidden tw-fixed tw-top-0 tw-right-0 tw-px-6 tw-py-4 sm:tw-block"
    >
      <Link
        v-if="$page.props.auth.user"
        :href="route('dashboard')"
        class="tw-text-sm tw-underline"
      >
        Dashboard
      </Link>

      <template v-else>
        <Link
          :href="route('login')"
          class="tw-text-sm tw-underline"
        >
          Log in
        </Link>

        <Link
          v-if="canRegister"
          :href="route('register')"
          class="tw-ml-4 tw-text-sm tw-underline"
        >
          Register
        </Link>
      </template>
    </div> -->
  </div>
</template>

<script setup>
defineProps({

})
</script>
