<script setup lang="ts">
import { PencilIcon } from "lucide-vue-next";
import ModalContainer from "@/Components/ModalContainer.vue";
import Form from "../Form.vue";

defineProps<{
  eventType: {
    id: number;
    name: string;
  };
}>();
</script>

<template>
  <ModalContainer modal-title="Zaktualizuj rodzaj wydarzenia">
    <template #trigger>
      <PencilIcon
        class="h-5 text-slate-600 hover:text-slate-800 dark:hover:text-slate-400 transition"
      />
    </template>

    <template v-slot="{ handleClose }">
      <Form :event-type="eventType" @success="handleClose" />
    </template>
  </ModalContainer>
</template>

<style scoped></style>
