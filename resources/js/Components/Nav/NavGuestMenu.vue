<script setup lang="ts">
import {
  NavigationMenu as NavMenu,
  NavigationMenuItem as MenuItem,
  NavigationMenuLink as MenuLink,
  NavigationMenuList as MenuList,
  navigationMenuTriggerStyle,
} from "@/Components/ui/navigation-menu";
</script>

<template>
  <NavMenu>
    <MenuList>
      <MenuItem>
        <MenuLink :href="route('login')" :class="navigationMenuTriggerStyle()">
          Log In
        </MenuLink>
      </MenuItem>
    </MenuList>
  </NavMenu>
</template>

<style scoped></style>
