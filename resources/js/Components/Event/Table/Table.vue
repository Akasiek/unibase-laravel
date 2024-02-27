<script setup lang="ts">
import {
  Table,
  TableBody,
  TableCaption,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from "@/Components/ui/table";

import { EventUpdateForm } from "@/Components/Event/Form";
import { EventDeleteDialog } from "@/Components/Event/Delete";

defineProps<{
  events: {
    id: number;
    name: string;
    date?: Date;
    info?: string;
    subject?: {
      id: number;
      name: string;
    };
    event_type: {
      id: number;
      name: string;
    };
  }[];
  eventTypes: {
    id: number;
    name: string;
  }[];
  subjects: {
    id: number;
    name: string;
  }[];
}>();
</script>

<template>
  <Table>
    <TableCaption> Lista wydarzeń </TableCaption>

    <TableHeader>
      <TableRow>
        <TableHead> Nazwa wydarzenia </TableHead>
        <TableHead> Data </TableHead>
        <TableHead> Typ wydarzenia </TableHead>
        <TableHead> Przedmiot </TableHead>
        <TableHead> Informacje </TableHead>
        <TableHead class="w-28"> Akcje </TableHead>
      </TableRow>
    </TableHeader>

    <TableBody>
      <TableRow v-for="event in events" :key="event.id">
        <TableCell class="font-medium"> {{ event.name }} </TableCell>

        <TableCell>
          {{ event.date ? new Date(event.date).toLocaleDateString() : "-" }}
        </TableCell>

        <TableCell> {{ event.event_type.name }} </TableCell>

        <TableCell> {{ event.subject ? event.subject.name : "-" }} </TableCell>

        <TableCell
          :title="event.info || '-'"
          class="text-pretty whitespace-pre-wrap"
        >
          {{ event.info || "-" }}
        </TableCell>

        <TableCell class="space-x-2">
          <EventUpdateForm
            :event="event"
            :event-types="eventTypes"
            :subjects="subjects"
          />
          <EventDeleteDialog :event-id="event.id" />
        </TableCell>
      </TableRow>
    </TableBody>
  </Table>
</template>
