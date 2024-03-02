<script setup lang="ts">
import Toaster from "@/Components/ui/toast/Toaster.vue";
import { Nav } from "@/Components/Nav";
</script>

<template>
  <Toaster />

  <Nav />

  <main class="max-w-7xl w-full mx-auto">
    <slot />
  </main>
</template>

<style scoped></style>
