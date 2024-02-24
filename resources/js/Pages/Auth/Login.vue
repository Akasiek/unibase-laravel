<script setup lang="ts">
import IslandLayout from "@/Layouts/IslandLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import {
  FormControl,
  FormField,
  FormItem,
  FormLabel,
} from "@/Components/ui/form";
import { Button } from "@/Components/ui/button";
import { Input } from "@/Components/ui/input";
import { Checkbox } from "@/Components/ui/checkbox";
import InputError from "@/Components/InputError.vue";

defineProps<{
  canResetPassword?: boolean;
  status?: string;
}>();

const form = useForm({
  email: "",
  password: "",
  remember: false,
});

const submit = () => {
  form.post(route("login"), {
    onFinish: () => {
      form.reset("password");
    },
  });
};
</script>

<template>
  <IslandLayout>
    <Head title="Log in" />

    <form class="space-y-6" @submit.prevent="submit">
      <FormField name="email" v-slot="{ componentField }" v-model="form.email">
        <FormItem>
          <FormLabel>E-mail</FormLabel>
          <FormControl>
            <Input
              type="text"
              placeholder="example@mail.com"
              v-bind="componentField"
            />
          </FormControl>
          <InputError :message="form.errors.email" />
        </FormItem>
      </FormField>

      <FormField
        name="password"
        v-slot="{ componentField }"
        v-model="form.password"
      >
        <FormItem>
          <FormLabel>Hasło</FormLabel>
          <FormControl>
            <Input type="password" v-bind="componentField" />
          </FormControl>
          <InputError :message="form.errors.password" />
        </FormItem>
      </FormField>

      <FormField
        v-slot="{ value, handleChange }"
        type="checkbox"
        name="mobile"
        v-model="form.remember"
      >
        <FormItem class="flex flex-row items-start gap-x-3 space-y-0">
          <FormControl>
            <Checkbox :checked="value" @update:checked="handleChange" />
          </FormControl>
          <div class="space-y-1 leading-none">
            <FormLabel>Pamiętaj mnie</FormLabel>
          </div>
        </FormItem>
      </FormField>

      <Button type="submit"> Submit</Button>
    </form>
  </IslandLayout>
</template>
