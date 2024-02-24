<script setup lang="ts">
import { cn } from "@/lib/utils";
import { Button } from "@/Components/ui/button";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

interface Item {
  title: string;
  href: string;
}

const sidebarNavItems: Item[] = [
  {
    title: "Edytuj profil",
    href: route("profile.edit"),
  },
  {
    title: "Przedmioty",
    href: route("subjects.dashboard"),
  },
  {
    title: "Wydarzenia",
    // href: route("events.dashboard"),
    href: route("home"),
  },
  {
    title: "Wykłady",
    // href: route("lectures.dashboard"),
    href: route("home"),
  },
];

const pathname = ref(window.location.pathname);
</script>

<template>
  <nav class="flex space-x-2 lg:flex-col lg:space-x-0 lg:space-y-1">
    <template v-for="item in sidebarNavItems">
      <Link :href="item.href">
        <Button
          as="a"
          variant="ghost"
          :class="
            cn(
              'w-full text-left justify-start',
              item.href.endsWith(pathname) && 'bg-muted hover:bg-muted',
            )
          "
        >
          {{ item.title }}
        </Button>
      </Link>
    </template>
  </nav>
</template>
