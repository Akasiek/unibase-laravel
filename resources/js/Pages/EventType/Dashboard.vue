<script setup lang="ts">
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import { Head } from "@inertiajs/vue3";

import { EventTypeCreateForm } from "@/Components/EventType/Form";
import { EventTypeTable } from "@/Components/EventType/Table";

defineProps<{
  eventTypes: EventType[];
}>();
</script>

<template>
  <Head title="Panel rodzajów wydarzeń" />

  <DashboardLayout
    header-title="Rodzaje wydarzeń"
    header-subtext="Dodaj, edytuj lub usuń rodzaje wydarzeń."
  >
    <EventTypeCreateForm />

    <EventTypeTable :event-types="eventTypes" />
  </DashboardLayout>
</template>
