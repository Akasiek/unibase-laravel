<script setup lang="ts">
import { NavigationMenuLink } from "@/Components/ui/navigation-menu";
import { Link } from "@inertiajs/vue3";
import type { Method } from "@inertiajs/core";

defineProps<{
  href: string;
  method?: Method;
}>();
</script>

<template>
  <li>
    <NavigationMenuLink as-child>
      <Link
        :href="href"
        :method="method"
        class="focus:shadow-[0_0_0_2px] hover:bg-zinc-100 block select-none rounded-[6px] p-3 text-[15px] leading-none no-underline outline-none transition-colors dark:hover:bg-zinc-800 dark:text-white"
      >
        <div class="font-medium leading-[1.2] text-sm">
          <slot />
        </div>
      </Link>
    </NavigationMenuLink>
  </li>
</template>

<style scoped></style>
