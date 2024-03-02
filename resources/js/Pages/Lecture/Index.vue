<script setup lang="ts">
import PrimaryLayout from "@/Layouts/PrimaryLayout.vue";
import { Separator } from "@/Components/ui/separator";
import { LectureDataTable } from "@/Components/Lecture/Table";
import { Lecture, Subject } from "@/Models";
import { Head } from "@inertiajs/vue3";

defineProps<{
  lectures: Lecture[];
  subjects: Subject[];
}>();
</script>

<template>
  <Head title="Wykłady" />

  <PrimaryLayout>
    <div class="mt-8 px-4">
      <h1 class="text-lg sm:text-2xl lg:text-4xl font-bold">Wykłady</h1>

      <Separator class="mt-4 mb-8 w-32 sm:w-44 lg:w-64" />

      <LectureDataTable :lectures="lectures" :subjects="subjects" />
    </div>
  </PrimaryLayout>
</template>
