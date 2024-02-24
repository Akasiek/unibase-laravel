<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";
import { Button } from "@/Components/ui/button";
import {
  FormControl,
  FormField,
  FormItem,
  FormLabel,
} from "@/Components/ui/form";
import { Checkbox } from "@/Components/ui/checkbox";
import { Input } from "@/Components/ui/input";
import InputError from "@/Components/InputError.vue";
import { toast } from "@/Components/ui/toast";

const { subject } = defineProps<{
  subject?: {
    id: number;
    name: string;
    color: string;
    archived_at: string;
  };
}>();

const form = useForm({
  name: subject?.name || "",
  color: subject?.color || "",
  archive: !!subject?.archived_at,
  archived_at: subject?.archived_at || "",
});

const emit = defineEmits(["close-modal"]);

const submit = () => {
  form.archived_at = form.archive ? new Date().toISOString() : "";

  if (subject) {
    form.patch(route("subjects.update", subject.id), {
      onSuccess: () => {
        handleSuccess();
      },
      onError: () => {
        handleError();
      },
    });
    return;
  }

  form.post(route("subjects.store"), {
    onSuccess: () => {
      handleSuccess();
    },
    onError: () => {
      handleError();
    },
  });
};

const handleSuccess = (isEdit = false) => {
  toast({
    title: isEdit ? "Przedmiot zaktualizowany" : "Przedmiot dodany pomyślnie",
    description: isEdit
      ? `Przedmiot ${form.name} został zaktualizowany.`
      : `Przedmiot ${form.name} został dodany do bazy.`,
  });
  emit("close-modal");
};

const handleError = () => {
  toast({
    title: "Błąd",
    description: "Wystąpił błąd podczas dodawania przedmiotu.",
    variant: "destructive",
  });
};
</script>

<template>
  <form class="space-y-6" @submit.prevent="submit">
    <FormField name="name" v-slot="{ componentField }" v-model="form.name">
      <FormItem>
        <FormLabel class="is-required">Nazwa przedmiotu</FormLabel>
        <FormControl>
          <Input
            type="text"
            placeholder="Matematyka dyskretna"
            v-bind="componentField"
          />
        </FormControl>
        <InputError :message="form.errors.name" />
      </FormItem>
    </FormField>

    <FormField name="color" v-slot="{ componentField }" v-model="form.color">
      <FormItem>
        <FormLabel>Kolor</FormLabel>
        <FormControl>
          <Input type="text" v-bind="componentField" placeholder="#000000" />
        </FormControl>
        <InputError :message="form.errors.color" />
      </FormItem>
    </FormField>

    <div
      v-if="
        form.color &&
        (form.color.length === 7 || form.color.length === 4) &&
        form.color[0] === '#'
      "
      class="w-full h-8 bg-gray-200 rounded-lg border-2 border-gray-300 dark:border-gray-700"
      :style="{ backgroundColor: form.color }"
    />

    <FormField
      v-slot="{ value, handleChange }"
      type="checkbox"
      name="mobile"
      v-model="form.archive"
    >
      <FormItem class="flex flex-row items-start gap-x-3 space-y-0">
        <FormControl>
          <Checkbox :checked="value" @update:checked="handleChange" />
        </FormControl>
        <div class="space-y-1 leading-none">
          <FormLabel> Archiwizuj</FormLabel>
        </div>
      </FormItem>
    </FormField>

    <Button type="submit" @click="$emit('close')">Dodaj</Button>
  </form>
</template>

<style scoped></style>
