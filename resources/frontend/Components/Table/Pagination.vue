<template>
  <div class="q-pa-md ">
    <div class="table-pagination shadow-10 tw-rounded-b-sm">
      <q-table
        v-model:pagination="pagination"
        :rows="rows"
        :columns="columns"
        row-key="id"
        hide-bottom
        :filter="filter"
        flat
      >
        <template #top>
          <q-btn
            color="primary"
            :disable="loading"
            :label="buttonLabel"
            :href="route(buttonRoute)"
          />
          <q-space />
          <q-input
            v-model="filter"
            placeholder="Busque aqui"
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
        <slot name="body" />
      </q-table>

      <q-separator />

      <div class="bg-white q-pa-md tw-shadow-black full-width row justify-end items-center tw-rounded-b-sm q-gutter-x-lg">
        Itens por página:
        &nbsp;
        <q-select
          v-model="rowsPerPage"
          borderless=""
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
  rows: Array,
  columns: Array,
  buttonLabel: String,
  buttonRoute: String
})

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

const filter = ref('')

</script>

<style lang="scss">
  .table-pagination th {
    font-weight: bold !important;
    font-size: 0.8rem !important;
  }
</style>
