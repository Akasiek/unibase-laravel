<script setup lang="ts">
import { h } from "vue";
import { usePage } from "@inertiajs/vue3";
import { ArrowUpDown } from "lucide-vue-next";
import { ColumnDef } from "@tanstack/vue-table";

import { DataTable } from "@/Components/ui/table";
import { Button } from "@/Components/ui/button";
import { Badge } from "@/Components/ui/badge";
import { EventCreateForm, EventUpdateForm } from "@/Components/Event/Form";
import { EventDeleteDialog } from "@/Components/Event/Delete";
import SubjectSelectFilter from "@/Components/SubjectSelectFilter.vue";
import EventTypeSelectFilter from "@/Components/Event/Table/EventTypeSelectFilter.vue";
import { Separator } from "@/Components/ui/separator";
import { Event, EventType, Subject } from "@/Models";

const page = usePage();
const { events, subjects, eventTypes } = defineProps<{
  events: Event[];
  eventTypes: EventType[];
  subjects: Subject[];
}>();

const columns: ColumnDef<Event>[] = [
  {
    accessorKey: "name",
    header: ({ column }) =>
      h(
        Button,
        {
          variant: "ghost",
          onClick: () => column.toggleSorting(column.getIsSorted() === "asc"),
          class: "-ml-4",
        },
        () => ["Nazwa", h(ArrowUpDown, { class: "ml-2 h-4 w-4" })],
      ),
    cell: (props) => props.row.original.name,
    enableSorting: true,
  },
  {
    accessorKey: "date",
    header: ({ column }) =>
      h(
        Button,
        {
          variant: "ghost",
          onClick: () => column.toggleSorting(column.getIsSorted() === "asc"),
          class: "-ml-4",
        },
        () => ["Data", h(ArrowUpDown, { class: "ml-2 h-4 w-4" })],
      ),
    cell: (props) =>
      props.row.original.date
        ? new Date(props.row.original.date).toLocaleDateString()
        : "-",
    enableSorting: true,
  },
  {
    id: "event_type_name",
    accessorKey: "event_type.name",
    header: ({ column }) =>
      h(
        Button,
        {
          variant: "ghost",
          onClick: () => column.toggleSorting(column.getIsSorted() === "asc"),
          class: "-ml-4",
        },
        () => ["Typ wydarzenia", h(ArrowUpDown, { class: "ml-2 h-4 w-4" })],
      ),
    cell: (props) => props.row.original.event_type.name,
  },
  {
    id: "subject_name",
    accessorKey: "subject.name",
    header: ({ column }) =>
      h(
        Button,
        {
          variant: "ghost",
          onClick: () => column.toggleSorting(column.getIsSorted() === "asc"),
          class: "-ml-4",
        },
        () => ["Przedmiot", h(ArrowUpDown, { class: "ml-2 h-4 w-4" })],
      ),
    cell: (props) =>
      props.row.original.subject
        ? props.row.original.subject.color
          ? h(
              Badge,
              {
                style: { backgroundColor: props.row.original.subject.color },
              },
              props.row.original.subject.name,
            )
          : props.row.original.subject.name
        : "-",
  },
  {
    accessorKey: "info",
    header: "Informacje dodatkowe",
    cell: (props) => props.row.original.info,
  },
  {
    id: "actions",
    header: "Akcje",
    cell: (props) =>
      h("div", { class: "space-x-2" }, [
        h(EventUpdateForm, {
          event: props.row.original,
          subjects: subjects,
          eventTypes: eventTypes,
        }),
        h(EventDeleteDialog, { eventId: props.row.original.id }),
      ]),
  },
];

const guestColumns: ColumnDef<Event>[] = columns.filter(
  (column) => column.id !== "actions",
);
</script>

<template>
  <DataTable
    :data="events"
    :columns="$page.props.auth.user ? columns : guestColumns"
  >
    <template #header="{ table }">
      <div class="flex flex-wrap justify-between mb-4">
        <div class="flex gap-y-4 flex-wrap py-4">
          <div class="w-64">
            <SubjectSelectFilter :subjects="subjects" :table="table" />
          </div>

          <Separator orientation="vertical" class="mx-4 hidden sm:block" />

          <div class="w-64">
            <EventTypeSelectFilter :event-types="eventTypes" :table="table" />
          </div>
        </div>

        <EventCreateForm
          :event-types="eventTypes"
          :subjects="subjects"
          v-if="$page.props.auth.user"
        />
      </div>
    </template>
  </DataTable>
</template>
<style scoped></style>
