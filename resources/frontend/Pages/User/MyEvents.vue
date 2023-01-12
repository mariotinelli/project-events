<!-- eslint-disable vue/attribute-hyphenation -->

<template layout="AppShell,Layout">
  <Head title="Meus Eventos" />

  <TablePagination
    :rows="events"
    :columns="columns"
    :buttonLabel="'Adicionar Novo Evento'"
    :buttonRoute="'events.create'"
  >
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
  </TablePagination>
</template>

<script setup>

defineProps({
  events: Object
})
const columns = [
  { name: 'title', required: true, label: 'Título', align: 'left', field: 'title', sortable: true },
  { name: 'category_name', align: 'left', label: 'Categoria', field: 'category_name', sortable: true },
  { name: 'participants', align: 'left', label: 'Participantes', field: 'participants', sortable: true },
  { name: 'date', align: 'left', label: 'Data', field: 'date', sortable: true },
  { name: 'duration', align: 'left', label: 'Duração', field: 'duration', sortable: true },
  { name: 'actions', align: 'center', label: 'Ações', field: 'actions' }
]

</script>
