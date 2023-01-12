<template>
  <div class="tw-inline-flex tw-justify-center tw-items-center">
    <div class="flex items-center tw-hidden tw-mr-2 tw-text-sm tw-text-gray-600 lg:tw-block">
      Itens por página:
      &nbsp;
      <q-select
        v-model="pagination.per_page"
        borderless=""
        :options="options"
      />
    </div>

    <div
      v-if="pagination.last_page > 1"
      class="flex tw-space-x-1 tw-items-top"
    >
      <q-btn
        v-if="pagination.prev_page_url"
        :href="pagination.prev_page_url"
        color="dark"
      >
        ANTERIOR
      </q-btn>

      <div class="flex tw-flex-col tw-space-y-2 md:tw-flex-row md:tw-space-y-0 md:tw-items-center md:tw-space-x-1">
        <q-btn
          v-for="(link, index) in pagination.links"
          :key="index"
          :href="link.url"
          :outline="!link.active"
          color="dark"
        >
          {{ link.label }}
        </q-btn>
      </div>

      <q-btn
        v-if="pagination.next_page_url"
        :href="pagination.next_page_url"
        color="dark"
      >
        PRÓXIMO
      </q-btn>
    </div>
  </div>
</template>

<script setup>

const props = defineProps({
  pagination: Object
})

const pagination = ref(props.pagination)
const options = [5, 15, 50, 100, 'Todos']

const formatLinks = () => {
  pagination.value.links.pop()
  pagination.value.links.shift()
}

formatLinks()

watch(() => pagination.value.per_page, (perPage) => {
  Inertia.get(pagination.value.path, { pagination: perPage }, {
    preserveState: true
  })
})

</script>
