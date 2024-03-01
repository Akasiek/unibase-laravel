<script setup lang="ts">
import DeleteModal from "@/Components/DeleteModal.vue";
import { router } from "@inertiajs/vue3";
import { toast } from "@/Components/ui/toast";

defineProps<{
  lectureId: number;
}>();

const handleDelete = (id: number) => {
  router.delete(route("lectures.destroy", id), {
    onSuccess: () => {
      toast({
        title: "Wykład został pomyślnie usunięty",
      });
    },
  });
};
</script>

<template>
  <DeleteModal :handle-delete="() => handleDelete(lectureId)" />
</template>
