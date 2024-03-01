<script setup lang="ts">
import { PencilIcon } from "lucide-vue-next";
import ModalContainer from "@/Components/ModalContainer.vue";
import Form from "../Form.vue";

defineProps<{
  eventType: EventType;
}>();
</script>

<template>
  <ModalContainer modal-title="Zaktualizuj rodzaj wydarzenia">
    <template #trigger>
      <PencilIcon
        class="h-5 text-zinc-600 hover:text-zinc-800 dark:hover:text-zinc-400 transition"
      />
    </template>

    <template v-slot="{ handleClose }">
      <Form :event-type="eventType" @success="handleClose" />
    </template>
  </ModalContainer>
</template>

<style scoped></style>
