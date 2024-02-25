<script setup lang="ts">
import { router } from "@inertiajs/vue3";
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
import DeleteModal from "@/Components/DeleteModal.vue";

defineProps<{
  subjects: {
    id: number;
    name: string;
    color: string;
    is_archived: boolean;
  }[];
}>();

const handleDelete = (id: number) => {
  router.delete(route("subjects.destroy", id));
};
</script>

<template>
  <Table>
    <TableCaption>Lista przedmiotów</TableCaption>

    <TableHeader>
      <TableRow>
        <TableHead> Nazwa przedmiotu </TableHead>
        <TableHead>Kolor </TableHead>
        <TableHead>Czy archiwizowany?</TableHead>
        <TableHead> Akcje </TableHead>
      </TableRow>
    </TableHeader>

    <TableBody>
      <TableRow
        v-for="subject in subjects"
        :key="subject.id"
        :class="
          subject.is_archived ? 'bg-slate-200/60 dark:bg-slate-800/70' : ''
        "
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
        <TableCell>{{ subject.is_archived ? "Tak" : "Nie" }}</TableCell>
        <TableCell class="space-x-2">
          <SubjectUpdateForm :subject="subject" />
          <DeleteModal :handle-delete="() => handleDelete(subject.id)" />
        </TableCell>
      </TableRow>
    </TableBody>
  </Table>
</template>
