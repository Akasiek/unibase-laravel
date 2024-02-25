<script setup lang="ts">
import { ref } from "vue";
import {
  Dialog,
  DialogContent,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from "@/Components/ui/dialog";

const open = ref(false);

const closeModal = () => {
  open.value = false;
};

defineProps<{
  modalTitle: string;
}>();
</script>

<template>
  <Dialog v-model:open="open">
    <DialogTrigger>
      <slot name="trigger" />
    </DialogTrigger>

    <DialogContent>
      <DialogHeader>
        <DialogTitle>{{ modalTitle }}</DialogTitle>
      </DialogHeader>

      <slot :handleClose="closeModal" />
    </DialogContent>
  </Dialog>
</template>
