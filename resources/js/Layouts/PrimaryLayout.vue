<script setup lang="ts">
import { Nav } from "@/Components/Nav";
import WrapperLayout from "@/Layouts/WrapperLayout.vue";
</script>

<template>
  <WrapperLayout>
    <Nav />

    <main class="max-w-7xl w-full mx-auto">
      <slot />
    </main>
  </WrapperLayout>
</template>
