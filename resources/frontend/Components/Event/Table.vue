<template>
  <div class="q-pa-md event-table">
    <q-table
      :rows="rows"
      :columns="columns"
      row-key="id"
      :filter="filter"
      :loading="loading"
    >
      <template #top>
        <q-btn
          color="primary"
          :disable="loading"
          label="Adicionar Novo Evento"
          @click="addEvent()"
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
              @click="editEvent(props.row.id)"
            >
              <i-fe-pencil />
              Editar
            </q-btn>
            <q-btn
              no-caps
              align="left"
              color="red"
              @click="deleteEvent(props.row.id)"
            >
              <i-fe-trash />
              Deletar
            </q-btn>
          </q-td>
        </q-tr>
      </template>
    </q-table>
  </div>
</template>

<script setup>

const props = defineProps({
  events: Array
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

// emulate fetching data from server
const addEvent = () => {
  loading.value = true
}

// emulate fetching data from server
const editEvent = (eventId) => {
  loading.value = true
}

// emulate fetching data from server
const deleteEvent = (eventId) => {
  loading.value = true
}

</script>

<style lang="scss">
.event-table th {
  font-weight: bold !important;
  font-size: 0.8rem !important;
}
</style>
