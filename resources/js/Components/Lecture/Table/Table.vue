<script setup lang="ts">
import {
  Table,
  TableCaption,
  TableHead,
  TableHeader,
  TableRow,
} from "@/Components/ui/table";

import TableBody from "./TableBody.vue";

defineProps<{
  lectures: Lecture[];
  subjects: Subject[];
}>();
</script>

<template>
  <Table>
    <TableCaption> Lista wykładów </TableCaption>

    <TableHeader>
      <TableRow>
        <TableHead class="w-fit"> Data </TableHead>
        <TableHead class="w-32"> Przedmiot </TableHead>
        <TableHead> Podsumowanie </TableHead>
        <TableHead class="w-32"> Link do Notion </TableHead>
        <TableHead class="w-36"> Linki do YouTube </TableHead>
        <TableHead class="w-28"> Akcje </TableHead>
      </TableRow>
    </TableHeader>

    <TableBody :lectures="lectures" :subjects="subjects" />
  </Table>
</template>
