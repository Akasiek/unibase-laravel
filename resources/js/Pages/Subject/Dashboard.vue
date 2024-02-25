<script setup lang="ts">
import { Head } from "@inertiajs/vue3";
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import { SubjectCreateForm } from "@/Components/Subject/Form/Create";
import { SubjectTable } from "@/Components/Subject/Table";

const { subjects } = defineProps<{
  subjects: {
    id: number;
    name: string;
    color: string;
    is_archived: boolean;
  }[];
}>();
</script>

<template>
  <Head title="Panel przedmiotów" />

  <DashboardLayout
    header-title="Przedmioty"
    header-subtext="Dodaj, edytuj lub usuń przedmioty."
  >
    <SubjectCreateForm />

    <SubjectTable :subjects="subjects" />
  </DashboardLayout>
</template>

<style scoped></style>
