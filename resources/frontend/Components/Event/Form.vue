<template>
  <div
    class="q-pa-md tw-mx-auto"
    style="max-width: 400px"
  >
    <q-form
      class="q-gutter-md flex tw-flex-col justify-center"
      @submit="onSubmit"
      @reset="onReset"
    >

      <div>

      </div>
      <!-- Image -->
      <q-file
        v-model="event.image"
        filled
        bottom-slots
        label="Imagem *"
        counter
      >
        <template #prepend>
          <i-fe-upload
            @click.stop.prevent
          />
        </template>
        <template #append>
          <i-fe-close
            class="cursor-pointer"
            @click.stop.prevent="event.image = null"
          />
        </template>
      </q-file>

      <!-- Title -->
      <q-input
        v-model="event.title"
        filled
        label="Título *"
        lazy-rules
        :rules="[ val => val && val.length > 0 || 'O título do evento é obrigatório.']"
      />

      <!-- Date -->
      <q-input
        v-model="event.date"
        filled
      >
        <template #prepend>
          <i-fe-calendar
            class="cursor-pointer"
          >
            <q-popup-proxy
              cover
              transition-show="scale"
              transition-hide="scale"
            >
              <q-date
                v-model="event.date"
                mask="DD/MM/YYYY HH:mm"
              >
                <div class="row items-center justify-end">
                  <q-btn
                    v-close-popup
                    label="Close"
                    color="primary"
                    flat
                  />
                </div>
              </q-date>
            </q-popup-proxy>
          </i-fe-calendar>
        </template>

        <template #append>
          <i-ic-outline-watch-later
            class="cursor-pointer"
          >
            <q-popup-proxy
              cover
              transition-show="scale"
              transition-hide="scale"
            >
              <q-time
                v-model="event.date"
                mask="DD/MM/YYYY HH:mm"
                format24h
              >
                <div class="row items-center justify-end">
                  <q-btn
                    v-close-popup
                    label="Close"
                    color="primary"
                    flat
                  />
                </div>
              </q-time>
            </q-popup-proxy>
          </i-ic-outline-watch-later>
        </template>
      </q-input>

      <!-- Duration -->
      <q-input
        v-model="event.time"
        filled
        mask="time"
        :rules="['time']"
      >
        <template #prepend>
          <i-ic-outline-watch-later
            class="cursor-pointer"
          >
            <q-popup-proxy
              cover
              transition-show="scale"
              transition-hide="scale"
            >
              <q-time v-model="event.duration">
                <div class="row items-center justify-end">
                  <q-btn
                    v-close-popup
                    label="Close"
                    color="primary"
                    flat
                  />
                </div>
              </q-time>
            </q-popup-proxy>
          </i-ic-outline-watch-later>
        </template>
      </q-input>

      <!-- Description -->
      <q-input
        v-model="event.description"
        filled
        type="textarea"
      />

      <!-- Buttons -->
      <div>
        <q-btn
          label="Submit"
          type="submit"
          color="primary"
        />
        <q-btn
          label="Reset"
          type="reset"
          color="primary"
          flat
          class="q-ml-sm"
        />
      </div>
    </q-form>
  </div>
</template>

<script setup>
import { useQuasar } from 'quasar'

const $q = useQuasar()

const event = reactive({
  image: '',
  title: '',
  date: '01/02/2023 12:44',
  duration: '12:44',
  description: ''
})

const onSubmit = () => {
  if (event.accept !== true) {
    $q.notify({
      color: 'red-5',
      textColor: 'white',
      icon: 'warning',
      message: 'You need to accept the license and terms first'
    })
  } else {
    $q.notify({
      color: 'green-4',
      textColor: 'white',
      icon: 'cloud_done',
      message: 'Submitted'
    })
  }
}

const onReset = () => {
  event.name = null
  event.age = null
  event.accept = false
}

</script>
