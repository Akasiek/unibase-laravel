<script setup lang="ts">
import { Head } from "@inertiajs/vue3";
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import { LectureDataTable } from "@/Components/Lecture/Table";

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
    <LectureDataTable :lectures="lectures" :subjects="subjects" />
  </DashboardLayout>
</template>
