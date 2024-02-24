<script setup lang="ts">
import { Head } from "@inertiajs/vue3";
import { onMounted } from "vue";
import { useToast } from "@/Components/ui/toast";
import PrimaryLayout from "@/Layouts/PrimaryLayout.vue";

const { justLoggedIn } = defineProps<{
  justLoggedIn?: boolean;
}>();

const { toast } = useToast();

onMounted(() => {
  if (justLoggedIn) {
    toast({
      title: "Pomyślnie zalogowano.",
      description: "Witaj z powrotem!",
    });
  }
});
</script>

<template>
  <PrimaryLayout>
    <Head title="Witaj" />

    <main></main>

    <!--  <div-->
    <!--    class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"-->
    <!--  >-->
    <!--    <div v-if="canLogin">-->
    <!--      <Link-->
    <!--        v-if="$page.props.auth.user"-->
    <!--        :href="route('dashboard')"-->
    <!--        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"-->
    <!--        >Dashboard</Link-->
    <!--      >-->

    <!--      <template v-else>-->
    <!--        <Link-->
    <!--          :href="route('login')"-->
    <!--          class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"-->
    <!--          >Log in</Link-->
    <!--        >-->

    <!--        <Link-->
    <!--          v-if="canRegister"-->
    <!--          :href="route('register')"-->
    <!--          class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"-->
    <!--          >Register</Link-->
    <!--        >-->
    <!--      </template>-->
    <!--    </div>-->
    <!--  </div>-->
  </PrimaryLayout>
</template>
