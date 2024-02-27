<script setup lang="ts">
import DeleteModal from "@/Components/DeleteModal.vue";
import { router } from "@inertiajs/vue3";
import { toast } from "@/Components/ui/toast";

defineProps<{
  eventId: number;
}>();

const handleDelete = (id: number) => {
  router.delete(route("events.destroy", id), {
    onSuccess: () => {
      toast({
        title: "Wydarzenie zostało pomyślnie usunięte",
      });
    },
  });
};
</script>

<template>
  <DeleteModal :handle-delete="() => handleDelete(eventId)" />
</template>
