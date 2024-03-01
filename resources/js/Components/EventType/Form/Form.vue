<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";
import { Button } from "@/Components/ui/button";
import {
  FormControl,
  FormField,
  FormItem,
  FormLabel,
} from "@/Components/ui/form";
import { Input } from "@/Components/ui/input";
import InputError from "@/Components/InputError.vue";
import { toast } from "@/Components/ui/toast";

const { eventType } = defineProps<{
  eventType?: EventType;
}>();

const form = useForm({
  name: eventType?.name || "",
});

const emit = defineEmits(["success"]);

const submit = () => {
  if (eventType) {
    form.patch(route("event-types.update", eventType.id), {
      onSuccess: () => {
        handleSuccess();
      },
      onError: () => {
        handleError();
      },
    });
    return;
  }

  form.post(route("event-types.store"), {
    onSuccess: () => {
      handleSuccess();
    },
    onError: () => {
      handleError();
    },
  });
};

const handleSuccess = (isEdit = false) => {
  toast({
    title: isEdit
      ? "Rodzaj wydarzenia zaktualizowany"
      : "Rodzaj wydarzenia dodany pomyślnie",
    description: isEdit
      ? `Rodzaj wydarzenia ${form.name} został zaktualizowany.`
      : `Rodzaj wydarzenia ${form.name} został dodany do bazy.`,
  });
  emit("success");
};

const handleError = () => {
  toast({
    title: "Błąd",
    description: "Wystąpił błąd podczas dodawania rodzaju wydarzenia.",
    variant: "destructive",
  });
};
</script>

<template>
  <form class="space-y-6" @submit.prevent="submit">
    <FormField name="name" v-slot="{ componentField }" v-model="form.name">
      <FormItem>
        <FormLabel class="is-required">Nazwa rodzaju wydarzenia</FormLabel>
        <FormControl>
          <Input type="text" placeholder="Kolokwium" v-bind="componentField" />
        </FormControl>
        <InputError :message="form.errors.name" />
      </FormItem>
    </FormField>

    <Button type="submit">Dodaj</Button>
  </form>
</template>
