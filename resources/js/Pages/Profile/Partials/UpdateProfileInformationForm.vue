<script setup lang="ts">
import InputError from "@/Components/InputError.vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";
import {
  FormControl,
  FormField,
  FormItem,
  FormLabel,
} from "@/Components/ui/form";
import { Input } from "@/Components/ui/input";
import { Button } from "@/Components/ui/button";

defineProps<{
  mustVerifyEmail?: Boolean;
  status?: String;
}>();

const user = usePage().props.auth.user;

const form = useForm({
  name: user.name,
  email: user.email,
});
</script>

<template>
  <section>
    <header>
      <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
        Informacje o profilu
      </h2>

      <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
        Zaktualizuj informacje profilowe i adres e-mail swojego konta.
      </p>
    </header>

    <form
      @submit.prevent="form.patch(route('profile.update'))"
      class="mt-6 space-y-6"
    >
      <FormField name="name" v-model="form.name" v-slot="{ componentField }">
        <FormItem>
          <FormLabel>Nazwa użytkownika</FormLabel>
          <FormControl>
            <Input type="text" v-bind="componentField" />
          </FormControl>
          <InputError :message="form.errors.name" />
        </FormItem>
      </FormField>

      <FormField name="name" v-model="form.email" v-slot="{ componentField }">
        <FormItem>
          <FormLabel>E-mail</FormLabel>
          <FormControl>
            <Input type="text" v-bind="componentField" />
          </FormControl>
          <InputError :message="form.errors.email" />
        </FormItem>
      </FormField>

      <div v-if="mustVerifyEmail && user.email_verified_at === null">
        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
          Twój adres e-mail jest niezweryfikowany.
          <Link
            :href="route('verification.send')"
            method="post"
            as="button"
            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
          >
            Kliknij tutaj, aby ponownie wysłać e-mail weryfikacyjny.
          </Link>
        </p>

        <div
          v-show="status === 'verification-link-sent'"
          class="mt-2 font-medium text-sm text-green-600 dark:text-green-400"
        >
          Na Twój adres e-mail został wysłany nowy link weryfikacyjny.
        </div>
      </div>

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
