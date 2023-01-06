<!-- eslint-disable vue/no-template-shadow -->
<template>
  <div class="row q-gutter-md tw-px-5">
    <q-table
      v-model:pagination="pagination"
      grid
      :card-container-class="cardContainerClass"
      title="Próximos Eventos"
      :rows="events"
      :columns="columns"
      row-key="name"
      :filter="filter"
      hide-header
      hide-bottom
      :rows-per-page-options="rowsPerPageOptions"
      class="full-width"
    >
      <template #top-right>
        <q-input
          v-model="filter"
          borderless
          dense
          debounce="300"
          class="tw-px-2 tw-border-2 tw-border-slate-500"
          placeholder="Search"
        >
          <template #append>
            <i-fe-search />
          </template>
        </q-input>
      </template>

      <template #item="props">
        <div class="q-pa-xs">
          <EventCard
            :event="props.row"
          />
        </div>
      </template>
    </q-table>

    <div class="full-width row justify-center q-mt-md">
      <q-pagination
        v-model="pagination.page"
        color="dark"
        direction-links
        :max="pagesNumber"
        size="lg"
      />
    </div>
  </div>
</template>

<script setup>

const props = defineProps({
  events: Array
})

const pagesNumber = computed(() => Math.ceil(props.events.length / pagination.value.rowsPerPage))
const $q = useQuasar()

function getItemsPerPage () {
  if ($q.screen.lt.sm) {
    return 6
  }
  if ($q.screen.lt.md) {
    return 9
  }
  if ($q.screen.lt.lg) {
    return 12
  }

  return 14
}

const filter = ref('')
const pagination = ref({
  sortBy: 'desc',
  descending: false,
  page: 1,
  rowsPerPage: getItemsPerPage()
})

watch(() => $q.screen.name, () => {
  pagination.value.rowsPerPage = getItemsPerPage()
})

const columns = [
  { name: 'title', label: 'Título', field: 'title' },
  { name: 'date', label: 'Data', field: 'date' }
]

const cardContainerClass = computed(() => {
  return $q.screen.gt.xs
    ? 'grid-masonry grid-masonry--' + ($q.screen.gt.sm ? '3' : '2')
    : null
})

const rowsPerPageOptions = computed(() => {
  return $q.screen.gt.xs
    ? $q.screen.gt.sm ? [3, 6, 9] : [3, 6]
    : [3]
})

</script>

<style lang="scss">

  .q-table__grid-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr))
  }
</style>
