<script setup lang="ts">
import PrimaryLayout from "@/Layouts/PrimaryLayout.vue";
import { Separator } from "@/Components/ui/separator";
import { EventDataTable } from "@/Components/Event/Table";
import { Event, EventType, Subject } from "@/Models";

defineProps<{
  events: Event[];
  eventTypes: EventType[];
  subjects: Subject[];
}>();
</script>

<template>
  <PrimaryLayout>
    <div class="mt-8 px-4">
      <h1 class="text-lg sm:text-2xl lg:text-4xl font-bold">Wydarzenia</h1>

      <Separator class="mt-4 mb-8 w-64" />

      <EventDataTable
        :events="events"
        :subjects="subjects"
        :eventTypes="eventTypes"
      />
    </div>
  </PrimaryLayout>
</template>
