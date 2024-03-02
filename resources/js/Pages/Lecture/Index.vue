<script setup lang="ts">
import PrimaryLayout from "@/Layouts/PrimaryLayout.vue";
import { Separator } from "@/Components/ui/separator";
import { LectureDataTable } from "@/Components/Lecture/Table";

const { lectures, subjects } = defineProps<{
  lectures: Lecture[];
  subjects: Subject[];
}>();
</script>

<template>
  <PrimaryLayout>
    <div class="mt-8">
      <h1 class="text-4xl font-bold">Wykłady</h1>
      <Separator class="mt-4 mb-8 w-64" />

      <LectureDataTable :lectures="lectures" :subjects="subjects" />
    </div>
  </PrimaryLayout>
</template>

<style scoped></style>
