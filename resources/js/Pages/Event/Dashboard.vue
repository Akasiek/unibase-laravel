<script setup lang="ts">
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import { Head } from "@inertiajs/vue3";

import { EventCreateForm } from "@/Components/Event/Form";
import { EventTable } from "@/Components/Event/Table";

defineProps<{
  events: {
    id: number;
    name: string;
    date?: Date;
    info?: string;
    subject?: {
      id: number;
      name: string;
    };
    eventType: {
      id: number;
      name: string;
    };
  }[];
  eventTypes: {
    id: number;
    name: string;
  }[];
  subjects: {
    id: number;
    name: string;
  }[];
}>();
</script>

<template>
  <Head title="Panel przedmiotów" />

  <DashboardLayout
    header-title="Wydarzenia"
    header-subtext="Dodaj, edytuj lub usuń wydarzenia."
  >
    <EventCreateForm :event-types="eventTypes" :subjects="subjects" />

    <EventTable
      :events="events"
      :event-types="eventTypes"
      :subjects="subjects"
    />
  </DashboardLayout>
</template>
