<template>
  <div
    class="q-pa-lg tw-mx-auto"
  >
    <q-form
      class="event-form q-gutter-md flex tw-flex-col justify-between"
      @submit.prevent="form.post(route('events.store'))"
      @reset="onReset"
    >
      <div class="flex justify-between">
        <!-- Event Data -->
        <div>
          <h5>Dados do Evento</h5>

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
            class="tw-w-49%"
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

          <!-- Title, Date and Duration -->
          <div class="flex justify-between">
            <!-- Title -->
            <q-input
              v-model="form.title"
              outlined
              :error-message="form.errors.title"
              clearable
              :error="isValidFormTitle"
              autocomplete="off"
              label="Título*"
              class="tw-w-three-inputs"
            />

            <!-- Date -->
            <q-input
              v-model="form.date"
              :error-message="form.errors.date"
              :error="isValidFormDate"
              autocomplete="off"
              label="Data do evento*"
              class="tw-w-three-inputs"
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
                      v-model="form.date"
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
              class="tw-w-three-inputs"
              mask="time"
            >
              <template #prepend>
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
                      v-model="form.duration"
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
        </div>

        <q-separator vertical />

        <!-- Event Address -->
        <div>
          <h5>Endereço do Evento</h5>

          <!-- Zip Code, Street and Number -->
          <div class="flex justify-between">
            <!-- ZIP CODE -->
            <q-input
              v-model="form.address.zip_code"
              outlined
              label="CEP*"
              mask="#####-###"
              unmasked-value
              :error-message="form.errors['address.zip_code']"
              clearable
              :error="isValidFormZipCode"
              autocomplete="off"
              class="tw-w-three-inputs"
            />

            <!-- Street -->
            <q-input
              v-model="form.address.street"
              outlined
              label="Rua\Av*"
              :error-message="form.errors['address.street']"
              clearable
              :error="isValidFormStreet"
              autocomplete="off"
              class="tw-w-three-inputs"
            />

            <!-- Number -->
            <q-input
              v-model="form.address.number"
              outlined
              label="Número*"
              :error-message="form.errors['address.number']"
              clearable
              :error="isValidFormNumber"
              autocomplete="off"
              class="tw-w-three-inputs"
            />
          </div>

          <!-- District, Complement and City -->
          <div class="flex justify-between">
            <!-- District -->
            <q-input
              v-model="form.address.district"
              outlined
              label="Bairro*"
              :error-message="form.errors['address.district']"
              clearable
              :error="isValidFormDistrict"
              autocomplete="off"
              class="tw-w-three-inputs"
            />

            <!-- Complement -->
            <q-input
              v-model="form.address.complement"
              outlined
              label="Complemento"
              clearable
              autocomplete="off"
              class="tw-w-three-inputs"
            />

            <!-- City -->
            <q-input
              v-model="form.address.city"
              outlined
              disable
              label="Cidade*"
              clearable
              autocomplete="off"
              class="tw-w-three-inputs"
            />
          </div>

          <!-- State -->
          <q-input
            v-model="form.address.state"
            outlined
            disable
            label="Estado*"
            clearable
            autocomplete="off"
            class="tw-w-three-inputs"
          />
        </div>
      </div>
      <!-- Buttons -->
      <div class="flex justify-between">
        <q-btn
          label="Voltar"
          color="blue"
          :href="route('users.my-events')"
        />
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
      </div>
    </q-form>
  </div>
</template>

<script setup>
const props = defineProps({
  event: Object,
  validationErrors: Object
})

const onReset = async () => {
  resetForm()
  resetValidation()
}

const form = useForm({
  image: props.event?.image ?? '',
  title: props.event?.title ?? '',
  date: props.event?.date ?? '',
  duration: props.event?.duration ?? '',
  description: props.event?.description ?? '',
  address: {
    zip_code: props.event?.address.zip_code ?? '',
    street: props.event?.address.street ?? '',
    number: props.event?.address.number ?? '',
    district: props.event?.address.district ?? '',
    complement: props.event?.address.complement ?? '',
    city: props.event?.address.city ?? '',
    state: props.event?.address.state ?? ''
  }
})

const resetForm = () => {
  form.title = props.event?.title ?? ''
  form.image = props.event?.image ?? ''
  form.date = props.event?.date ?? ''
  form.duration = props.event?.duration ?? ''
  form.description = props.event?.description ?? ''
  form.address.zip_code = props.event?.address.zip_code ?? ''
  form.address.street = props.event?.address.street ?? ''
  form.address.number = props.event?.address.number ?? ''
  form.address.district = props.event?.address.district ?? ''
  form.address.complement = props.event?.address.complement ?? ''
  form.address.city = props.event?.address.city ?? ''
  form.address.state = props.event?.address.state ?? ''
}

const resetValidation = () => {
  form.clearErrors()
}

const isValidFormImage = computed(() => { return form.image === '' && Object.keys(form.errors).length > 0 })
const isValidFormTitle = computed(() => { return form.title === '' && Object.keys(form.errors).length > 0 })
const isValidFormDate = computed(() => { return form.date === '' && Object.keys(form.errors).length > 0 })
const isValidFormDuration = computed(() => { return form.duration === '' && Object.keys(form.errors).length > 0 })
const isValidFormDescription = computed(() => { return form.description === '' && Object.keys(form.errors).length > 0 })
// Address
const isValidFormZipCode = computed(() => { return form.address.zip_code === '' && Object.keys(form.errors).length > 0 })
const isValidFormStreet = computed(() => { return form.address.street === '' && Object.keys(form.errors).length > 0 })
const isValidFormNumber = computed(() => { return form.address.number === '' && Object.keys(form.errors).length > 0 })
const isValidFormDistrict = computed(() => { return form.address.district === '' && Object.keys(form.errors).length > 0 })

// Options calendar
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
