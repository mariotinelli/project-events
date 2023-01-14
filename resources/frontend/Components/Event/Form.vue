<template>
  <div
    class="q-pa-lg tw-mx-auto"
  >
    <q-form
      class="event-form q-gutter-md flex tw-flex-col justify-center"
      @submit="onSubmit"
      @reset="onReset"
    >
      <!-- Image -->
      <q-file
        v-model="event.image"
        outlined
        bottom-slots
        label="Imagem*"
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
        outlined
        label="Título*"
        lazy-rules
        :rules="[ val => val && val.length > 0 || 'O título do evento é obrigatório.']"
      />

      <!-- Date and Duration -->
      <div class="flex justify-between">
        <!-- Date -->
        <q-input
          v-model="event.date"
          label="Data do evento*"
          class="tw-w-72"
          outlined
        >
          <template #prepend>
            <div
              class="cursor-pointer"
            >
              <i-fe-calendar />
              <q-popup-proxy
                cover
                transition-show="scale"
                transition-hide="scale"
              >
                <q-date
                  v-model="event.date"
                  :locale="locale"
                  mask="DD/MM/YYYY HH:mm"
                >
                  <div class="tw-row items-center justify-end">
                    <q-btn
                      v-close-popup
                      label="Fechar"
                      color="primary"
                      flat
                    />
                  </div>
                </q-date>
              </q-popup-proxy>
            </div>
          </template>

          <template #append>
            <div
              class="cursor-pointer"
            >
              <i-ic-outline-watch-later />
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
                      label="Fechar"
                      color="primary"
                      flat
                    />
                  </div>
                </q-time>
              </q-popup-proxy>
            </div>
          </template>
        </q-input>

        <!-- Duration -->
        <q-input
          v-model="event.duration"
          label="Tempo de duração*"
          outlined
          class="tw-w-72"
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
                      label="Fechar"
                      color="primary"
                      flat
                    />
                  </div>
                </q-time>
              </q-popup-proxy>
            </i-ic-outline-watch-later>
          </template>
        </q-input>
      </div>

      <!-- Description -->
      <q-input
        v-model="event.description"
        label="Descrição*"
        outlined
        type="textarea"
      />

      <!-- Buttons -->
      <div class="flex justify-end">
        <q-btn
          label="Salvar"
          type="submit"
          color="positive"
        />
        <q-btn
          label="Limpar"
          type="reset"
          color="negative"
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

const locale = {
  days: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
  daysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
  months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
  monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'De']
}

</script>

<style lang="scss">
  .event-form textarea {
    resize: none !important;
  }
</style>
