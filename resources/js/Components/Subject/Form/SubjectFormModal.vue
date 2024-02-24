<script setup lang="ts">
import { ref } from "vue";

import {
  Dialog,
  DialogContent,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from "@/Components/ui/dialog";
import SubjectForm from "@/Components/Subject/Form/SubjectForm.vue";

defineProps<{
  subject?: {
    id: number;
    name: string;
    color: string;
    archived_at: string;
  };
}>();

const open = ref(false);
</script>

<template>
  <Dialog v-model:open="open">
    <DialogTrigger>
      <slot />
    </DialogTrigger>

    <DialogContent>
      <DialogHeader>
        <DialogTitle>Dodaj przedmiot</DialogTitle>
      </DialogHeader>

      <SubjectForm @close-modal="() => (open = false)" :subject="subject" />
    </DialogContent>
  </Dialog>
</template>

<style scoped></style>
