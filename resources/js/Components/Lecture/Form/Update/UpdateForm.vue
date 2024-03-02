<script setup lang="ts">
import { PencilIcon } from "lucide-vue-next";
import ModalContainer from "@/Components/ModalContainer.vue";
import Form from "../Form.vue";
import { Lecture, Subject } from "@/Models";

defineProps<{
  lecture: Lecture;
  subjects: Subject[];
}>();
</script>

<template>
  <ModalContainer modal-title="Zaktualizuj wykład">
    <template #trigger>
      <PencilIcon
        class="h-5 text-zinc-600 hover:text-zinc-800 dark:hover:text-zinc-400 transition"
      />
    </template>

    <template v-slot="{ handleClose }">
      <Form :lecture="lecture" @success="handleClose" :subjects="subjects" />
    </template>
  </ModalContainer>
</template>

<style scoped></style>
