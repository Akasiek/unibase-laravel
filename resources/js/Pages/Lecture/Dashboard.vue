<script setup lang="ts">
import { Head } from "@inertiajs/vue3";
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import { LectureCreateForm } from "@/Components/Lecture/Form";
import { LectureTable } from "@/Components/Lecture/Table";

defineProps<{
  lectures: Lecture[];
  subjects: Subject[];
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
