<script setup lang="ts">
import { PlusIcon } from "lucide-vue-next";
import SubjectForm from "@/Components/Subject/Form/SubjectForm.vue";
import ModalContainer from "@/Components/ModalContainer.vue";
import { Button } from "@/Components/ui/button";
</script>

<template>
  <ModalContainer modal-title="Utwórz przedmiot">
    <template #trigger>
      <Button variant="outline">
        <PlusIcon class="h-4 mr-1" />
        Dodaj przedmiot
      </Button>
    </template>

    <template v-slot="{ handleClose }">
      <SubjectForm @success="handleClose" />
    </template>
  </ModalContainer>
</template>

<style scoped></style>
