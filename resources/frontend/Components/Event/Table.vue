<template>
  <div class="q-pa-md ">
    <div class="table-pagination shadow-10 tw-rounded-b-sm">
      <q-table
        v-model:pagination="pagination"
        :rows="rows"
        :columns="columns"
        row-key="id"
        :loading="loading"
        hide-bottom
        :filter="filter"
        flat
      >
        <template #top>
          <q-btn
            color="primary"
            label="Adicionar Novo Evento"
            :href="route('events.create')"
            @click="() => { loading = true }"
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
                align="right"
                color="primary"
                :href="route('events.edit', props.row.id)"
              >
                <i-fe-pencil />
                Editar
              </q-btn>
              <q-btn
                no-caps
                align="right"
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

      <div class="bg-white q-pa-md tw-shadow-black full-width row justify-end items-center tw-rounded-b-sm q-gutter-x-lg">
        Itens por página:
        &nbsp;
        <q-select
          v-model="rowsPerPage"
          outlined
          style="max-height: 50px"
          :options="options"
        />
        <q-pagination
          v-model="pagination.page"
          :max="maxPerPage"
          direction-links
          boundary-links
        />
      </div>
    </div>
  </div>
</template>

<script setup>

const props = defineProps({
  rows: Array
})

const loading = ref(false)

const columns = [
  { name: 'title', required: true, label: 'Título', align: 'left', field: 'title', sortable: true },
  { name: 'category_name', align: 'left', label: 'Categoria', field: 'category_name', sortable: true },
  { name: 'participants', align: 'left', label: 'Participantes', field: 'participants', sortable: true },
  { name: 'date', align: 'left', label: 'Data', field: 'date', sortable: true },
  { name: 'duration', align: 'left', label: 'Duração', field: 'duration', sortable: true },
  { name: 'actions', align: 'center', label: 'Ações', field: 'actions' }
]

const filter = ref('')

const options = [5, 15, 50, 100, 'Todos']

const pagination = ref({
  page: 1,
  rowsPerPage: 5
})

const rowsPerPage = ref(pagination.value.rowsPerPage)

watch(() => rowsPerPage.value, (perPage) => {
  pagination.value.rowsPerPage = perPage !== 'Todos' ? perPage : 0
})

const maxPerPage = computed(() => {
  if (pagination.value.rowsPerPage === 0) {
    return 1
  }
  return Math.ceil(props.rows.length / pagination.value.rowsPerPage)
})

</script>

<style lang="scss">
  .table-pagination th {
    font-weight: bold !important;
    font-size: 0.8rem !important;
  }

  .table-pagination .q-field--auto-height .q-field__control,
  .table-pagination .q-field--auto-height .q-field__native,
  .table-pagination .q-field__marginal{
    min-height: 30px !important;
    max-height: 30px !important;
  }
</style>
