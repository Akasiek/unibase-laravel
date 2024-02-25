<script setup lang="ts">
import DeleteModal from "@/Components/DeleteModal.vue";
import { router } from "@inertiajs/vue3";
import { toast } from "@/Components/ui/toast";

defineProps<{
  subjectId: number;
}>();

const handleDelete = (id: number) => {
  router.delete(route("subjects.destroy", id), {
    onSuccess: () => {
      toast({
        title: "Przedmiot został pomyślnie usunięty",
      });
    },
  });
};
</script>

<template>
  <DeleteModal :handle-delete="() => handleDelete(subjectId)" />
</template>
