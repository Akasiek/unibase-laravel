<script setup lang="ts">
import { router } from "@inertiajs/vue3";

import { PencilIcon } from "lucide-vue-next";
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
import { SubjectForm } from "@/Components/Subject/Form";
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
        :class="subject.is_archived ? 'bg-slate-200/60' : ''"
      >
        <TableCell class="font-medium"> {{ subject.name }} </TableCell>
        <!--        <TableCell>{{ subject.color }}</TableCell>-->
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
          <SubjectForm :subject="subject">
            <PencilIcon class="h-5 text-slate-600 :hover:text-slate-800" />
          </SubjectForm>
          <DeleteModal :handle-delete="() => handleDelete(subject.id)" />
        </TableCell>
      </TableRow>

      <!--      <TableRow>-->
      <!--        <TableCell class="font-medium"> INV001 </TableCell>-->
      <!--        <TableCell>Paid</TableCell>-->
      <!--        <TableCell>Credit Card</TableCell>-->
      <!--      </TableRow>-->
    </TableBody>
  </Table>
</template>
