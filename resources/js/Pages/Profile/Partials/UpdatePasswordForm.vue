<script setup lang="ts">
import InputError from "@/Components/InputError.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import {
  FormControl,
  FormField,
  FormItem,
  FormLabel,
} from "@/Components/ui/form";
import { Input } from "@/Components/ui/input";
import { Button } from "@/Components/ui/button";

const passwordInput = ref<HTMLInputElement | null>(null);
const currentPasswordInput = ref<HTMLInputElement | null>(null);

const form = useForm({
  current_password: "",
  password: "",
  password_confirmation: "",
});

const updatePassword = () => {
  form.put(route("password.update"), {
    preserveScroll: true,
    onSuccess: () => {
      form.reset();
    },
    onError: () => {
      if (form.errors.password) {
        form.reset("password", "password_confirmation");
        passwordInput.value?.focus();
      }
      if (form.errors.current_password) {
        form.reset("current_password");
        currentPasswordInput.value?.focus();
      }
    },
  });
};
</script>

<template>
  <section>
    <header>
      <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
        Zaktualizuj hasło
      </h2>

      <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
        Upewnij się, że Twoje konto używa długiego, losowego hasła, aby zachować
        bezpieczeństwo.
      </p>
    </header>

    <form @submit.prevent="updatePassword" class="mt-6 space-y-6">
      <FormField
        name="password"
        v-slot="{ componentField }"
        v-model="form.current_password"
      >
        <FormItem>
          <FormLabel>Stare hasło</FormLabel>
          <FormControl>
            <Input
              type="password"
              v-bind="componentField"
              autocomplete="current-password"
              ref="currentPasswordInput"
            />
          </FormControl>
          <InputError :message="form.errors.current_password" />
        </FormItem>
      </FormField>

      <FormField
        name="password"
        v-slot="{ componentField }"
        v-model="form.password"
      >
        <FormItem>
          <FormLabel>Nowe hasło</FormLabel>
          <FormControl>
            <Input
              type="password"
              v-bind="componentField"
              autocomplete="current-password"
              ref="currentPasswordInput"
            />
          </FormControl>
          <InputError :message="form.errors.password" />
        </FormItem>
      </FormField>

      <FormField
        name="password"
        v-slot="{ componentField }"
        v-model="form.password_confirmation"
      >
        <FormItem>
          <FormLabel>Nowe hasło</FormLabel>
          <FormControl>
            <Input
              type="password"
              v-bind="componentField"
              autocomplete="current-password"
              ref="currentPasswordInput"
            />
          </FormControl>
          <InputError :message="form.errors.password_confirmation" />
        </FormItem>
      </FormField>

      <div class="flex items-center gap-4">
        <Button type="submit" :disabled="form.processing">Zapisz</Button>

        <Transition
          enter-active-class="transition ease-in-out"
          enter-from-class="opacity-0"
          leave-active-class="transition ease-in-out"
          leave-to-class="opacity-0"
        >
          <p
            v-if="form.recentlySuccessful"
            class="text-sm text-gray-600 dark:text-gray-400"
          >
            Zapisano.
          </p>
        </Transition>
      </div>
    </form>
  </section>
</template>
