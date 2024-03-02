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
          :href="route('lectures.index')"
          :class="navigationMenuTriggerStyle()"
        >
          Wykłady
        </MenuLink>
      </MenuItem>
      <MenuItem>
        <MenuLink
          :href="route('events.index')"
          :class="navigationMenuTriggerStyle()"
        >
          Wydarzenia
        </MenuLink>
      </MenuItem>

      <MenuItem class="relative">
        <MenuTrigger>Użytkownik</MenuTrigger>
        <MenuContent>
          <ul class="grid p-4 md:grid-cols w-44 md:w-72">
            <MenuListItem :href="route('profile.edit')">
              Edytuj profil
            </MenuListItem>

            <MenuListItem :href="route('dashboard.subjects')">
              Dashboard
            </MenuListItem>

            <MenuListItem :href="route('logout')" method="post">
              Wyloguj
            </MenuListItem>
          </ul>
        </MenuContent>
      </MenuItem>
    </MenuList>
  </NavMenu>
</template>
