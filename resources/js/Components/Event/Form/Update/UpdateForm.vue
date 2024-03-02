<script setup lang="ts">
import { PencilIcon } from "lucide-vue-next";
import ModalContainer from "@/Components/ModalContainer.vue";
import { Event, EventType, Subject } from "@/Models";
import Form from "../Form.vue";

defineProps<{
  event: Event;
  eventTypes: EventType[];
  subjects: Subject[];
}>();
</script>

<template>
  <ModalContainer modal-title="Zaktualizuj wydarzenie">
    <template #trigger>
      <PencilIcon
        class="h-5 text-zinc-600 hover:text-zinc-800 dark:hover:text-zinc-400 transition"
      />
    </template>

    <template v-slot="{ handleClose }">
      <Form
        :event="event"
        @success="handleClose"
        :event-types="eventTypes"
        :subjects="subjects"
      />
    </template>
  </ModalContainer>
</template>

<style scoped></style>
