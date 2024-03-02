<script setup lang="ts">
import { Head } from "@inertiajs/vue3";

import Toaster from "@/Components/ui/toast/Toaster.vue";
import { onMounted } from "vue";
import { changeTheme } from "@/lib/utils";

// Get system or preferred theme
onMounted(() => {
  changeTheme(getTheme());
});
</script>

<template>
  <Head>
    <meta
      http-equiv="Content-Security-Policy"
      content="upgrade-insecure-requests"
    />
  </Head>

  <Toaster />

  <slot />
</template>

<style scoped></style>
