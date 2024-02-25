<script setup lang="ts">
import DeleteModal from "@/Components/DeleteModal.vue";
import { router } from "@inertiajs/vue3";
import { toast } from "@/Components/ui/toast";

defineProps<{
  eventTypeId: number;
}>();

const handleDelete = (id: number) => {
  router.delete(route("event-types.destroy", id), {
    onSuccess: () => {
      toast({
        title: "Rodzaj wydarzenia został pomyślnie usunięty",
      });
    },
  });
};
</script>

<template>
  <DeleteModal :handle-delete="() => handleDelete(eventTypeId)" />
</template>
