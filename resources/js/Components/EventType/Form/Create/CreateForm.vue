<script setup lang="ts">
import { PlusIcon } from "lucide-vue-next";
import ModalContainer from "@/Components/ModalContainer.vue";
import { Button } from "@/Components/ui/button";
import Form from "../Form.vue";
</script>

<template>
  <ModalContainer modal-title="Utwórz rodzaj wydarzenia">
    <template #trigger>
      <Button variant="outline">
        <PlusIcon class="h-4 mr-1" />
        Dodaj rodzaj wydarzenia
      </Button>
    </template>

    <template v-slot="{ handleClose }">
      <Form @success="handleClose" />
    </template>
  </ModalContainer>
</template>
