<script setup lang="ts">
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import { Head } from "@inertiajs/vue3";
import { SubjectForm } from "@/Components/Subject/Form";
import { SubjectTable } from "@/Components/Subject/Table";
import { Button } from "@/Components/ui/button";
import { PlusIcon } from "lucide-vue-next";

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
    <SubjectForm>
      <Button variant="outline">
        <PlusIcon class="h-4 mr-1" />
        Dodaj przedmiot
      </Button>
    </SubjectForm>

    <SubjectTable :subjects="subjects" />
  </DashboardLayout>
</template>

<style scoped></style>
