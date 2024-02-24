<script setup lang="ts">
import { NavigationMenuLink } from "@/Components/ui/navigation-menu";
import { Link } from "@inertiajs/vue3";

defineProps<{
  href: string;
  method?: string;
}>();
</script>

<template>
  <li>
    <NavigationMenuLink as-child>
      <Link
        :href="href"
        :method="method"
        class="focus:shadow-[0_0_0_2px] hover:bg-gray-100 block select-none rounded-[6px] p-3 text-[15px] leading-none no-underline outline-none transition-colors"
      >
        <div class="font-medium leading-[1.2] text-sm">
          <slot />
        </div>
      </Link>
    </NavigationMenuLink>
  </li>
</template>

<style scoped></style>
