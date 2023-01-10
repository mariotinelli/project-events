<template>
  <div class="full-width tw-self-start">
    <q-toolbar class="bg-dark text-white shadow-2">
      <q-btn
        no-caps
        flat
        class="hover:tw-text-white"
        label="Tinelli Eventos"
        :href="route('home')"
      />

      <q-space />

      <AccountMenu v-if="page.props.value.auth.user" />
      <div v-else>
        <q-btn
          no-caps
          flat
          label="Entrar"
          class="hover:tw-text-white"
          :href="route('login')"
        />

        <q-btn
          no-caps
          outline
          label="Cadastrar"
          class="hover:tw-text-white"
          :href="route('register')"
        />
      </div>
    </q-toolbar>
  </div>
</template>

<script setup>

const page = usePage()

</script>
