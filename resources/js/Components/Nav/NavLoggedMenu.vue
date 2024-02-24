<script setup lang="ts">
import {
  NavigationMenu as NavMenu,
  NavigationMenuContent as MenuContent,
  NavigationMenuItem as MenuItem,
  NavigationMenuLink as MenuLink,
  NavigationMenuList as MenuList,
  NavigationMenuTrigger as MenuTrigger,
  navigationMenuTriggerStyle,
} from "@/Components/ui/navigation-menu";
import MenuListItem from "@/Components/Nav/NavigationMenuListItem.vue";
</script>

<template>
  <NavMenu>
    <MenuList>
      <MenuItem>
        <MenuLink
          :href="route('dashboard')"
          :class="navigationMenuTriggerStyle()"
        >
          Dashboard
        </MenuLink>
      </MenuItem>

      <MenuItem>
        <MenuTrigger>User</MenuTrigger>
        <MenuContent class="right-0">
          <ul class="grid p-4 md:grid-cols w-44">
            <MenuListItem :href="route('profile.edit')">
              Edit Profile
            </MenuListItem>

            <MenuListItem :href="route('logout')" method="post">
              Log Out
            </MenuListItem>
          </ul>
        </MenuContent>
      </MenuItem>
    </MenuList>
  </NavMenu>
</template>

<style scoped></style>
