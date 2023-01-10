<template>
  <div class="q-pa-md ">
    <div class="event-table shadow-10 tw-rounded-b-sm">
      <q-table
        v-model:pagination="pagination"
        :rows="rows"
        :columns="columns"
        row-key="id"
        hide-bottom
        :filter="filter"
        :loading="loading"
        flat
      >
        <template #top>
          <q-btn
            color="primary"
            :disable="loading"
            label="Adicionar Novo Evento"
            :href="route('events.create')"
          />
          <q-space />
          <q-input
            v-model="filter"
            placeholder="Busque um evento"
            dense
            debounce="300"
            color="primary"
          >
            <template #append>
              <i-fe-search />
            </template>
          </q-input>
        </template>

        <!-- eslint-disable-next-line vue/no-template-shadow -->
        <template #body="props">
          <q-tr :props="props">
            <q-td
              key="title"
              :props="props"
            >
              {{ props.row.title }}
            </q-td>
            <q-td
              key="category_name"
              :props="props"
            >
              {{ props.row.category_name }}
            </q-td>
            <q-td
              key="participants"
              :props="props"
            >
              {{ props.row.participants }}
            </q-td>
            <q-td
              key="date"
              :props="props"
            >
              {{ props.row.date }}
            </q-td>
            <q-td
              key="duration"
              :props="props"
            >
              {{ props.row.duration }}
            </q-td>
            <q-td
              key="actions"
              class="q-gutter-x-sm"
              :props="props"
            >
              <q-btn
                no-caps
                align="left"
                color="primary"
                :href="route('events.edit', props.row.id)"
              >
                <i-fe-pencil />
                Editar
              </q-btn>
              <q-btn
                no-caps
                align="left"
                color="red"
                :href="route('events.destroy', props.row.id)"
              >
                <i-fe-trash />
                Deletar
              </q-btn>
            </q-td>
          </q-tr>
        </template>
      </q-table>

      <q-separator />

      <div class="bg-white q-pa-sm tw-shadow-black full-width row justify-end items-center tw-rounded-b-sm q-gutter-x-lg">
        Eventos por página:
        <q-select
          v-model="itemsPerPage"
          :options="options"
          borderless
          behavior="menu"
          outlined
        />
        <q-pagination
          v-model="pagination.page"
          color="primary"
          direction-links
          input
          boundary-numbers
          :max="pagesNumber"
          :max-pages="maxPages"
          size="lg"
        />
      </div>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  events: Array
})
const pagesNumber = computed(() => getPagesNumber())

function getPagesNumber () {
  if (pagination.value.rowsPerPage === 0) {
    return 1
  }
  return Math.ceil(props.events.length / pagination.value.rowsPerPage)
}

const $q = useQuasar()

const options = [5, 15, 20, 50, 'Todos']
const itemsPerPage = ref(5)

function getItemsPerPage () {
  if (itemsPerPage.value === 'Todos') {
    return 0
  }
  return itemsPerPage
}

const maxPages = computed(() => {
  if ($q.screen.lt.sm) {
    return 2
  }
  if ($q.screen.lt.md) {
    return 5
  }
  return 6
})

const pagination = ref({
  sortBy: 'desc',
  descending: false,
  page: 1,
  rowsPerPage: getItemsPerPage()
})

watchEffect(() => {
  pagination.value.rowsPerPage = getItemsPerPage()
})

const columns = [
  { name: 'title', required: true, label: 'Título', align: 'left', field: 'title', sortable: true },
  { name: 'category_name', align: 'left', label: 'Categoria', field: 'category_name', sortable: true },
  { name: 'participants', align: 'left', label: 'Participantes', field: 'participants', sortable: true },
  { name: 'date', align: 'left', label: 'Data', field: 'date', sortable: true },
  { name: 'duration', align: 'left', label: 'Duração', field: 'duration', sortable: true },
  { name: 'actions', align: 'center', label: 'Ações', field: 'actions' }
]

const loading = ref(false)
const filter = ref('')
// const rowCount = ref(10)
const rows = ref([...props.events])

// const deleteEvent = (eventId) => {
//   loading.value = true
// }

</script>

<style lang="scss">
  .event-table th {
    font-weight: bold !important;
    font-size: 0.8rem !important;
  }
</style>
