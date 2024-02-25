<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
import NavLoggedMenu from "@/Components/Nav/NavLoggedMenu.vue";
import NavGuestMenu from "@/Components/Nav/NavGuestMenu.vue";
import ThemeToggler from "@/Components/ThemeToggler.vue";
import { Separator } from "@/Components/ui/separator";
</script>

<template>
  <nav
    class="sticky top-0 w-full inset-x-0 flex justify-between p-6 shadow-md shadow-gray-500/10 bg-white dark:bg-gray-900 dark:text-white"
  >
    <div class="flex items-center text-lg">
      <Link :href="route('home')" class="font-semibold">UniBase</Link>
    </div>

    <div class="flex gap-4">
      <template v-if="$page.props.auth.user">
        <NavLoggedMenu />
      </template>
      <template v-else>
        <NavGuestMenu />
      </template>

      <Separator orientation="vertical" />

      <ThemeToggler />
    </div>
  </nav>
</template>

<style scoped></style>
