<script setup lang="ts">
import Toaster from "@/Components/ui/toast/Toaster.vue";
import { Nav } from "@/Components/Nav";
</script>

<template>
  <Toaster />

  <Nav />

  <main class="min-h-screen">
    <slot />
  </main>
</template>

<style scoped></style>
