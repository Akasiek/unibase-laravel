<script setup lang="ts">
import { FormControl, FormField, FormItem } from "@/Components/ui/form";
import { Input } from "@/Components/ui/input";
import { Separator } from "@/Components/ui/separator";
import { Button } from "@/Components/ui/button";

defineProps<{
  modelValue: { youtube_link: string }[];
}>();
</script>

<template>
  <Separator />

  <h2 class="font-semibold">Filmy YouTube</h2>
  <template v-for="(video, index) in modelValue" :key="index">
    <FormField
      :name="`videos[${index}][youtube_link]`"
      :fieldError="undefined"
      label="Link do filmu"
      :isRequired="true"
    >
      <FormItem class="flex gap-3 items-center">
        <FormControl>
          <Input
            type="text"
            v-model="modelValue[index].youtube_link"
            @update:model-value="
              modelValue[index].youtube_link = $event as string
            "
            placeholder="https://www.youtube.com/watch?v=..."
          />
        </FormControl>
        <Button
          variant="outline"
          @click="modelValue.splice(index, 1)"
          type="button"
          class="!mt-0 hover:bg-red-500 hover:text-zinc-950 text-white"
        >
          Usuń
        </Button>
      </FormItem>
    </FormField>
  </template>

  <div>
    <Button
      variant="outline"
      @click="modelValue.push({ youtube_link: '' })"
      type="button"
    >
      Dodaj film
    </Button>
  </div>

  <Separator />
</template>

<style scoped></style>
