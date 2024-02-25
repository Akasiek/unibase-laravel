<script setup lang="ts">
import { MoonIcon, SunIcon } from "lucide-vue-next";
import { onMounted, ref } from "vue";

const getSystemTheme = () =>
  window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";

const getTheme = () => {
  const theme = localStorage.getItem("theme");
  if (theme) {
    return theme;
  }

  return getSystemTheme();
};

const isDark = ref(getTheme() === "dark");

const toggleTheme = () => {
  const newTheme = isDark.value ? "light" : "dark";
  isDark.value = !isDark.value;
  localStorage.setItem("theme", newTheme);

  changeTheme(newTheme);
};

onMounted(() => {
  changeTheme(getTheme());
});

const changeTheme = (theme: string) => {
  const root = window.document.documentElement;
  root.classList.remove("light", "dark");
  root.classList.add(theme);
};
</script>

<template>
  <div>
    <button
      aria-label="Toggle theme"
      class="p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500/50"
      @click="toggleTheme"
    >
      <template v-if="isDark">
        <SunIcon class="w-6 h-6" />
      </template>
      <template v-else>
        <MoonIcon class="w-6 h-6" />
      </template>
    </button>
  </div>
</template>

<style scoped></style>
