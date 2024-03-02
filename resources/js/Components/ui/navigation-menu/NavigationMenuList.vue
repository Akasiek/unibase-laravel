<script setup lang="ts">
import { computed, type HTMLAttributes } from "vue";
import {
  NavigationMenuList,
  type NavigationMenuListProps,
  useForwardProps,
} from "radix-vue";
import { cn } from "@/lib/utils";

const props = defineProps<
  NavigationMenuListProps & { class?: HTMLAttributes["class"] }
>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwardedProps = useForwardProps(delegatedProps);
</script>

<template>
  <NavigationMenuList
    v-bind="forwardedProps"
    :class="
      cn(
        'group flex flex-1 flex-col md:flex-row  list-none md:items-center justify-center gap-x-1 gap-y-2',
        props.class,
      )
    "
  >
    <slot />
  </NavigationMenuList>
</template>
