<script setup lang="ts">
import {
  Select,
  SelectContent,
  SelectGroup,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from "@/Components/ui/select";
import { FormField, FormItem } from "@/Components/ui/form";
import { Table } from "@tanstack/vue-table";
import { Button } from "@/Components/ui/button";
import { XIcon } from "lucide-vue-next";
import { Event, Lecture, Subject } from "@/Models";

const { subjects, table } = defineProps<{
  subjects: Subject[];
  table: Table<Lecture> | Table<Event>;
}>();
</script>

<template>
  <FormField
    v-slot="{ componentField }"
    name="subject"
    :model-value="table.getColumn('subject_name')?.getFilterValue() as string"
    @update:model-value="
      table.getColumn('subject_name')?.setFilterValue($event)
    "
  >
    <FormItem class="flex items-center">
      <Select v-bind="componentField">
        <SelectTrigger>
          <SelectValue placeholder="Wybierz przedmiot..." />
        </SelectTrigger>
        <SelectContent>
          <SelectGroup>
            <template v-for="subject in subjects">
              <SelectItem :value="subject.name">
                {{ subject.name }}
              </SelectItem>
            </template>
          </SelectGroup>
        </SelectContent>
      </Select>
      <button
        @click="table.getColumn('subject_name')?.setFilterValue('')"
        class="px-4 py-2 !mt-0"
      >
        <XIcon class="h-5 w-5" />
      </button>
    </FormItem>
  </FormField>
</template>
