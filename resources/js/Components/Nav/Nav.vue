<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
import NavLoggedMenu from "@/Components/Nav/NavLoggedMenu.vue";
import NavGuestMenu from "@/Components/Nav/NavGuestMenu.vue";

const iconClass =
  "h-6 w-6 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white";

const linkClass =
  "font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white";
</script>

<template>
  <nav class="sticky top-0 w-full inset-x-0 flex justify-between p-6">
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
    </div>
  </nav>
</template>

<style scoped></style>
