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
import { Badge } from "@/Components/ui/badge";
import { SubjectUpdateForm } from "@/Components/Subject/Form/Update";
import { SubjectDeleteDialog } from "@/Components/Subject/Delete";
import { Subject } from "@/Models";

defineProps<{
  subjects: Subject[];
}>();
</script>

<template>
  <Table>
    <TableCaption> Lista przedmiotów </TableCaption>

    <TableHeader>
      <TableRow>
        <TableHead> Nazwa przedmiotu </TableHead>
        <TableHead> Kolor </TableHead>
        <TableHead> Czy archiwizowany? </TableHead>
        <TableHead> Akcje </TableHead>
      </TableRow>
    </TableHeader>

    <TableBody>
      <TableRow
        v-for="subject in subjects"
        :key="subject.id"
        :class="subject.is_archived ? 'bg-zinc-200/60 dark:bg-zinc-800/70' : ''"
      >
        <TableCell class="font-medium"> {{ subject.name }} </TableCell>
        <TableCell>
          <Badge
            :style="{ backgroundColor: subject.color }"
            v-if="subject.color"
          >
            {{ subject.color }}
          </Badge>
          <span v-else> Brak koloru </span>
        </TableCell>
        <TableCell> {{ subject.is_archived ? "Tak" : "Nie" }} </TableCell>
        <TableCell class="space-x-2">
          <SubjectUpdateForm :subject="subject" />
          <SubjectDeleteDialog :subject-id="subject.id" />
        </TableCell>
      </TableRow>
    </TableBody>
  </Table>
</template>
