<template>
  <div class="full-width tw-self-start">
    <q-toolbar class="bg-purple text-white shadow-2 rounded-borders">
      <q-btn
        flat
        label="Homepage"
      />
      <q-space />
      <NavList>
        <NavLink
          :href="route('dashboard')"
          :active="route().current('dashboard')"
        >
          Ínicio
        </NavLink>
        <NavLink
          :href="route('dashboard')"
          :active="route().current('dashboard')"
        >
          Eventos
        </NavLink>
        <NavLink
          :href="route('dashboard')"
          :active="route().current('dashboard')"
        >
          Sobre
        </NavLink>
      </NavList>
      <q-space />
      <q-btn-dropdown
        unelevated
        label="Account Settings"
        class="hover:bg-purple"
      >
        <div class="row no-wrap q-pa-md">
          <div class="column">
            <div class="text-h6 q-mb-md">
              Settings
            </div>
            <q-toggle
              v-model="mobileData"
              label="Use Mobile Data"
            />
            <q-toggle
              v-model="bluetooth"
              label="Bluetooth"
            />
          </div>

          <q-separator
            vertical
            inset
            class="q-mx-lg"
          />

          <div class="column items-center">
            <q-avatar size="72px">
              <img src="https://cdn.quasar.dev/img/boy-avatar.png">
            </q-avatar>

            <div class="text-subtitle1 q-mt-md q-mb-xs">
              John Doe
            </div>

            <q-btn
              v-close-popup
              color="primary"
              label="Logout"
              push
              size="sm"
            />
          </div>
        </div>
      </q-btn-dropdown>
    </q-toolbar>
  </div>
</template>

<script setup>

</script>
