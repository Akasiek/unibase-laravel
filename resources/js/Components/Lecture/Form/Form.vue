<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";
import { Button } from "@/Components/ui/button";
import { toast } from "@/Components/ui/toast";
import { DatePickerField, Select, TextField } from "@/Components/Inputs";
import VideosInputs from "@/Components/Lecture/Form/VideosInputs.vue";
import { format } from "date-fns";
import { Lecture, Subject } from "@/Models";

const { lecture } = defineProps<{
  lecture?: Lecture;
  subjects: Subject[];
}>();

const form = useForm({
  date: lecture?.date || null,
  summary: lecture?.summary || "",
  notion_link: lecture?.notion_link || "",
  subject_id: lecture?.subject_id?.toString() || "",
  videos: lecture?.videos || [{ youtube_links: "" }],
});

const emit = defineEmits(["success"]);

const submit = () => {
  if (lecture) {
    form.patch(route("lectures.update", lecture.id), {
      onSuccess: () => {
        handleSuccess();
      },
      onError: () => {
        handleError();
      },
    });
    return;
  }

  form.post(route("lectures.store"), {
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
    title: isEdit ? "Wykład zaktualizowany" : "Wykład dodany pomyślnie",
    description: isEdit
      ? `Wykład z ${form.date !== null ? format(form.date, "yyyy-MM-dd") : ""} został zaktualizowany.`
      : `Wykład z ${form.date !== null ? format(form.date, "yyyy-MM-dd") : ""} został dodany.`,
  });
  emit("success");
};

const handleError = () => {
  toast({
    title: "Błąd",
    description: "Wystąpił błąd podczas dodawania wykładu.",
    variant: "destructive",
  });
};
</script>

<template>
  <form class="space-y-6" @submit.prevent="submit">
    <DatePickerField
      v-model="form.date"
      label="Data"
      field-name="date"
      is-required
      :field-error="form.errors.date"
    />

    <Select
      v-model="form.subject_id"
      field-name="subject_id"
      :field-error="form.errors.subject_id"
      :options="
        subjects.map((obj) => ({
          id: obj.id,
          text: obj.name,
        }))
      "
      label="Przedmiot"
      is-required
      placeholder="Wybierz przedmiot wykładu..."
    />

    <TextField
      v-model="form.summary"
      field-name="summary"
      label="Podsumowanie wykładu"
      :field-error="form.errors.summary"
      placeholder="Wstęp do teorii grafów..."
    />

    <TextField
      v-model="form.notion_link"
      field-name="notion_link"
      label="Link do notatki na Notion"
      :field-error="form.errors.notion_link"
    />

    <VideosInputs v-model="form.videos" />

    <Button type="submit">
      {{ lecture ? "Zaktualizuj" : "Dodaj" }}
    </Button>
  </form>
</template>
