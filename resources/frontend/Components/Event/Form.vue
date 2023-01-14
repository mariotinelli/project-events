<template>
  <div
    class="q-pa-lg tw-mx-auto"
  >
    <q-form
      class="event-form q-gutter-md flex tw-flex-col justify-center"
      @submit.prevent="form.post(route('events.store'))"
      @reset="onReset"
    >
      <!-- Image -->
      <q-file
        v-model="form.image"
        :error-message="form.errors.image"
        :error="isValidFormImage"
        autocomplete="off"
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
            @click.stop.prevent="form.image = null"
          />
        </template>
      </q-file>

      <!-- Title -->
      <q-input
        v-model="form.title"
        outlined
        :error-message="form.errors.title"
        clearable
        :error="isValidFormTitle"
        autocomplete="off"
        label="Título*"
        :model-value="form.title"
      />

      <!-- Date and Duration -->
      <div class="flex justify-between">
        <!-- Date -->
        <q-input
          v-model="form.date"
          :error-message="form.errors.date"
          :error="isValidFormDate"
          autocomplete="off"
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
                  v-model="form.date"
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
          v-model="form.duration"
          :error-message="form.errors.duration"
          :error="isValidFormDuration"
          autocomplete="off"
          label="Tempo de duração*"
          outlined
          class="tw-w-72"
          mask="time"
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
                <q-time v-model="form.duration">
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
        v-model="form.description"
        :error-message="form.errors.description"
        :error="isValidFormDescription"
        autocomplete="off"
        label="Descrição*"
        outlined
        type="textarea"
      />

      <!-- Buttons -->
      <div class="flex justify-end">
        <q-btn
          :disabled="form.processing"
          :loading="form.processing"
          label="Salvar"
          type="submit"
          color="positive"
        />
        <q-btn
          :disabled="form.processing"
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
const props = defineProps({
  event: Object,
  validationErrors: Object
})

const form = useForm({
  image: props.event?.image ?? '',
  title: props.event?.title ?? '',
  date: props.event?.date ?? '',
  duration: props.event?.duration ?? '',
  description: props.event?.description ?? ''
})

// const errors = computed(() => {
//   return {
//     image: props.validationErrors.image ?? '',
//     title: props.validationErrors.title ?? '',
//     date: props.validationErrors.date ?? '',
//     duration: props.validationErrors.duration ?? '',
//     description: props.validationErrors.description ?? ''
//   }
// })

const onReset = async () => {
  resetForm()
  resetValidation()
}

const resetForm = () => {
  form.title = props.event?.title ?? ''
  form.image = props.event?.image ?? ''
  form.date = props.event?.date ?? ''
  form.duration = props.event?.duration ?? ''
  form.description = props.event?.description ?? ''
}

const resetValidation = () => {
  form.clearErrors()
}

const isValidFormImage = computed(() => { return form.image === '' && Object.keys(form.errors).length > 0 })
const isValidFormTitle = computed(() => { return form.title === '' && Object.keys(form.errors).length > 0 })
const isValidFormDate = computed(() => { return form.date === '' && Object.keys(form.errors).length > 0 })
const isValidFormDuration = computed(() => { return form.duration === '' && Object.keys(form.errors).length > 0 })
const isValidFormDescription = computed(() => { return form.description === '' && Object.keys(form.errors).length > 0 })

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
