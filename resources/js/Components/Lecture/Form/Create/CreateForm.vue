<script setup lang="ts">
import { PlusIcon } from "lucide-vue-next";
import ModalContainer from "@/Components/ModalContainer.vue";
import { Button } from "@/Components/ui/button";
import Form from "../Form.vue";
import { Subject } from "@/Models";

defineProps<{
  subjects: Subject[];
}>();
</script>

<template>
  <ModalContainer modal-title="Utwórz wykład">
    <template #trigger>
      <Button variant="outline">
        <PlusIcon class="h-4 mr-1" />
        Dodaj wykład
      </Button>
    </template>

    <template v-slot="{ handleClose }">
      <Form @success="handleClose" :subjects="subjects" />
    </template>
  </ModalContainer>
</template>
