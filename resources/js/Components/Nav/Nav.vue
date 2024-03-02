<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
import NavLoggedMenu from "@/Components/Nav/NavLoggedMenu.vue";
import NavGuestMenu from "@/Components/Nav/NavGuestMenu.vue";
import ThemeToggler from "@/Components/ThemeToggler.vue";
import { Separator } from "@/Components/ui/separator";
import { ref } from "vue";
import { MenuIcon, XIcon } from "lucide-vue-next";

const menuVisible = ref(false);
</script>

<template>
  <nav
    class="sticky top-0 w-full inset-x-0 flex justify-between p-6 shadow-xl shadow-zinc-50 dark:shadow-zinc-950 bg-white dark:bg-zinc-950 dark:text-white"
  >
    <div class="flex items-center text-lg">
      <Link :href="route('home')" class="font-semibold">UniBase</Link>
    </div>

    <div class="md:flex gap-4 hidden">
      <template v-if="$page.props.auth.user">
        <NavLoggedMenu />
      </template>
      <template v-else>
        <NavGuestMenu />
      </template>

      <Separator orientation="vertical" />

      <ThemeToggler />
    </div>

    <div class="md:hidden flex items-center gap-2">
      <button
        @click="menuVisible = true"
        class="p-2"
        aria-label="Show menu"
        v-if="!menuVisible"
      >
        <MenuIcon class="h-6 w-6" />
      </button>

      <Teleport to="body" v-else>
        <div
          class="fixed inset-0 bg-white dark:bg-zinc-950 dark:text-white z-[100]"
        >
          <button
            @click="menuVisible = false"
            class="p-2 absolute top-4 right-4"
            aria-label="Hide menu"
          >
            <XIcon class="h-6 w-6" />
          </button>

          <div class="h-full flex flex-col items-center justify-center gap-4">
            <div class="">
              <template v-if="$page.props.auth.user">
                <NavLoggedMenu />
              </template>
              <template v-else>
                <NavGuestMenu />
              </template>
            </div>
          </div>
        </div>
      </Teleport>

      <Separator orientation="vertical" />
      <ThemeToggler />
    </div>
  </nav>
</template>

<style scoped></style>
