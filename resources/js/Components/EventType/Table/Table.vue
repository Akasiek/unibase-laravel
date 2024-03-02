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

import { EventTypeUpdateForm } from "@/Components/EventType/Form";
import { EventTypeDeleteDialog } from "@/Components/EventType/Delete";
import { EventType } from "@/Models";

defineProps<{
  eventTypes: EventType[];
}>();
</script>

<template>
  <Table>
    <TableCaption> Lista rodzajów wydarzeń </TableCaption>

    <TableHeader>
      <TableRow>
        <TableHead> Nazwa rodzaju wydarzenia </TableHead>
        <TableHead> Akcje </TableHead>
      </TableRow>
    </TableHeader>

    <TableBody>
      <TableRow v-for="eventType in eventTypes" :key="eventType.id">
        <TableCell class="font-medium"> {{ eventType.name }} </TableCell>
        <TableCell class="space-x-2">
          <EventTypeUpdateForm :event-type="eventType" />
          <EventTypeDeleteDialog :event-type-id="eventType.id" />
        </TableCell>
      </TableRow>
    </TableBody>
  </Table>
</template>
