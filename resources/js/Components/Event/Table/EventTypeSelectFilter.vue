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
import { RowData, Table } from "@tanstack/vue-table";
import { Button } from "@/Components/ui/button";
import { XIcon } from "lucide-vue-next";

const { eventTypes, table } = defineProps<{
  eventTypes: EventType[];
  table: Table<RowData>;
}>();
</script>

<template>
  <FormField
    v-slot="{ componentField }"
    name="subject"
    :model-value="
      table.getColumn('event_type_name')?.getFilterValue() as string
    "
    @update:model-value="
      table.getColumn('event_type_name')?.setFilterValue($event)
    "
  >
    <FormItem class="flex items-center">
      <Select v-bind="componentField">
        <SelectTrigger>
          <SelectValue placeholder="Wybierz typ wydarzenia..." />
        </SelectTrigger>
        <SelectContent>
          <SelectGroup>
            <template v-for="eventType in eventTypes">
              <SelectItem :value="eventType.name">
                {{ eventType.name }}
              </SelectItem>
            </template>
          </SelectGroup>
        </SelectContent>
      </Select>
      <button
        @click="table.getColumn('event_type_name')?.setFilterValue('')"
        class="px-4 py-2 !mt-0"
      >
        <XIcon class="h-5 w-5" />
      </button>
    </FormItem>
  </FormField>
</template>
