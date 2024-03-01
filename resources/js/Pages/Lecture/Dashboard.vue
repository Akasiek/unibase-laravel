<script setup lang="ts">
import { Head } from "@inertiajs/vue3";
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import { LectureCreateForm } from "@/Components/Lecture/Form";
import { LectureTable } from "@/Components/Lecture/Table";

defineProps<{
  lectures: {
    id: number;
    date: Date;
    notion_link?: string;
    summary?: string;
    subject: {
      id: number;
      name: string;
    };
    videos: {
      id: number;
      youtube_link: string;
    }[];
  }[];
  subjects: {
    id: number;
    name: string;
  }[];
}>();
</script>

<template>
  <Head title="Panel wykładów" />

  <DashboardLayout
    header-title="Wykłady"
    header-subtext="Dodaj, edytuj lub usuń wykład."
  >
    <LectureCreateForm :subjects="subjects" />

    <LectureTable :lectures="lectures" :subjects="subjects" />
  </DashboardLayout>
</template>
