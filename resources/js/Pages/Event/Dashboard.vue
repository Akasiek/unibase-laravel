<script setup lang="ts">
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import { Head } from "@inertiajs/vue3";
import { EventDataTable } from "@/Components/Event/Table";

defineProps<{
  events: Event[];
  eventTypes: EventType[];
  subjects: Subject[];
}>();
</script>

<template>
  <Head title="Panel wydarzeń" />

  <DashboardLayout
    header-title="Wydarzenia"
    header-subtext="Dodaj, edytuj lub usuń wydarzenia."
  >
    <EventDataTable
      :events="events"
      :event-types="eventTypes"
      :subjects="subjects"
    />
  </DashboardLayout>
</template>
