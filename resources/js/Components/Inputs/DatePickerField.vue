<script setup lang="ts">
import { format } from "date-fns";
import { pl } from "date-fns/locale";

import { cn } from "@/lib/utils";
import {
  FormControl,
  FormField,
  FormItem,
  FormLabel,
} from "@/Components/ui/form";
import { Button } from "@/Components/ui/button";
import {
  Popover,
  PopoverContent,
  PopoverTrigger,
} from "@/Components/ui/popover";
import { Calendar } from "@/Components/ui/calendar";
import { CalendarIcon } from "lucide-vue-next";
import InputError from "@/Components/InputError.vue";

defineProps<{
  modelValue: Date | string | null;
  fieldName: string;
  fieldError: string | undefined;
  label: string;
}>();
</script>

<template>
  <FormField
    v-slot="{ componentField, value }"
    :name="fieldName"
    :model-value="modelValue"
    @update:model-value="$emit('update:modelValue', $event)"
  >
    <FormItem class="flex flex-col">
      <FormLabel>{{ label }}</FormLabel>
      <Popover>
        <PopoverTrigger as-child>
          <FormControl>
            <Button
              variant="outline"
              :class="
                cn(
                  'ps-3 text-start font-normal',
                  !value && 'text-muted-foreground',
                )
              "
            >
              <span>{{
                value ? format(value, "PPP", { locale: pl }) : "Wybierz datę"
              }}</span>
              <CalendarIcon class="ms-auto h-4 w-4 opacity-50" />
            </Button>
          </FormControl>
        </PopoverTrigger>
        <PopoverContent class="p-0">
          <Calendar v-bind="componentField" />
        </PopoverContent>
      </Popover>
      <InputError :message="fieldError" />
    </FormItem>
  </FormField>
</template>
