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

      <!-- <q-btn-dropdown
        v-if="page.props.value.auth.user"
        unelevated
        label="Minha Conta"
        class="hover:bg-purple"
      >
        <div class="row no-wrap q-pa-md">
          <div
            class="column items-center"
          >
            <q-avatar size="72px">
              <img src="https://cdn.quasar.dev/img/boy-avatar.png">
            </q-avatar>

            <div class="text-subtitle1 q-mt-md q-mb-xs">
              {{ page.props.value.auth.user.name }}
            </div>

            <div class="full-width tw-flex tw-flex-col tw-items-start q-gutter-y-sm">
              <q-btn
                v-close-popup
                color="primary"
                label="Perfil"
                push
                size="sm"
              />

              <q-btn
                v-close-popup
                color="primary"
                label="Meus Eventos"
                push
                size="sm"
              />

              <q-separator
                class="full-width"
                color="dark-10"
              />

              <q-btn
                v-close-popup
                color="primary"
                label="Logout"
                push
                size="sm"
              />
            </div>
          </div>
        </div>
      </q-btn-dropdown> -->

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
