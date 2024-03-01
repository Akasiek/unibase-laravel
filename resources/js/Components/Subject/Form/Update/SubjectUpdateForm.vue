<script setup lang="ts">
import ModalContainer from "@/Components/ModalContainer.vue";
import SubjectForm from "@/Components/Subject/Form/SubjectForm.vue";
import { PencilIcon } from "lucide-vue-next";

defineProps<{
  subject: Subject;
}>();
</script>

<template>
  <ModalContainer modal-title="Zaktualizuj przedmiot">
    <template #trigger>
      <PencilIcon
        class="h-5 text-zinc-600 hover:text-zinc-800 dark:hover:text-zinc-400 transition"
      />
    </template>

    <template v-slot="{ handleClose }">
      <SubjectForm :subject="subject" @success="handleClose" />
    </template>
  </ModalContainer>
</template>

<style scoped></style>
