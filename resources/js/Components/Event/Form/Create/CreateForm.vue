<script setup lang="ts">
import { PlusIcon } from "lucide-vue-next";
import ModalContainer from "@/Components/ModalContainer.vue";
import { Button } from "@/Components/ui/button";
import Form from "../Form.vue";

defineProps<{
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
  <ModalContainer modal-title="Utwórz wydarzenie">
    <template #trigger>
      <Button variant="outline">
        <PlusIcon class="h-4 mr-1" />
        Dodaj wydarzenie
      </Button>
    </template>

    <template v-slot="{ handleClose }">
      <Form
        @success="handleClose"
        :event-types="eventTypes"
        :subjects="subjects"
      />
    </template>
  </ModalContainer>
</template>
