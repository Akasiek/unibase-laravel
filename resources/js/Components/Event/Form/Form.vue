<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";
import { Button } from "@/Components/ui/button";
import { toast } from "@/Components/ui/toast";
import {
  DatePickerField,
  Select,
  TextArea,
  TextField,
} from "@/Components/Inputs";

const { event } = defineProps<{
  event?: {
    id: number;
    name: string;
    date?: Date;
    info?: string;
    event_type_id: number;
    subject_id?: number;
  };
  subjects: {
    id: number;
    name: string;
  }[];
  eventTypes: {
    id: number;
    name: string;
  }[];
}>();

const form = useForm({
  name: event?.name || "",
  date: event?.date || "",
  info: event?.info || "",
  event_type_id: event?.event_type_id.toString() || "",
  subject_id: event?.subject_id?.toString() || "",
});

const emit = defineEmits(["success"]);

const submit = () => {
  if (event) {
    form.patch(route("events.update", event.id), {
      onSuccess: () => {
        handleSuccess();
      },
      onError: () => {
        handleError();
      },
    });
    return;
  }

  form.post(route("events.store"), {
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
    title: isEdit ? "Wydarzenie zaktualizowane" : "Wydarzenie dodane pomyślnie",
    description: isEdit
      ? `Wydarzenie ${form.name} zostało zaktualizowane.`
      : `Wydarzenie ${form.name} zostało dodane do bazy.`,
  });
  emit("success");
};

const handleError = () => {
  toast({
    title: "Błąd",
    description: "Wystąpił błąd podczas dodawania wydarzenia.",
    variant: "destructive",
  });
};
</script>

<template>
  <form class="space-y-6" @submit.prevent="submit">
    <TextField
      v-model="form.name"
      field-name="name"
      label="Nazwa wydarzenia"
      :field-error="form.errors.name"
      is-required
      placeholder="Kolokwium z Matematyki dyskretnej"
    />

    <DatePickerField
      v-model="form.date"
      label="Data"
      field-name="date"
      :field-error="form.errors.date"
    />

    <Select
      v-model="form.event_type_id"
      field-name="event_type_id"
      :field-error="form.errors.event_type_id"
      :options="
        eventTypes.map((obj) => ({
          id: obj.id.toString(),
          text: obj.name,
        }))
      "
      label="Typ wydarzenia"
      placeholder="Wybierz typ wydarzenia..."
      is-required
    />

    <Select
      v-model="form.subject_id"
      field-name="subject_id"
      :field-error="form.errors.subject_id"
      :options="
        subjects.map((obj) => ({
          id: obj.id.toString(),
          text: obj.name,
        }))
      "
      label="Przedmiot"
      placeholder="Wybierz przedmiot skojarzony z wydarzeniem..."
    />

    <TextArea
      v-model="form.info"
      field-name="info"
      label="Informacje dodatkowe"
      :field-error="form.errors.info"
      placeholder="Dodatkowe informacje o wydarzeniu..."
    />

    <Button type="submit">Dodaj</Button>
  </form>
</template>
