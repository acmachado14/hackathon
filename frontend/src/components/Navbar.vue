<template>
  <nav class="bg-blue-800 py-4 px-8 fixed top-0 w-full flex justify-between items-center">
    <div class="flex items-center">
      <!-- Logo (You can replace this with your logo) -->
      <img
      src="logo.png"
      alt="Logo"
      class="h-14 w-auto"
      />
    </div>

    <!-- Desktop navigation -->
    <div class="hidden md:flex space-x-4 items-center">
      <router-link
        to="/candidatos"
        class="text-white hover:text-gray-500 transition duration-300"
        :class="{ 'font-bold': isActive('/candidatos') }"
      >Candidato</router-link>
      <router-link
        to="/reports"
        class="text-white hover:text-gray-500 transition duration-300"
        :class="{ 'font-bold': isActive('/reports') }"
      >Report</router-link>
    </div>

    <!-- Mobile Menu Toggle -->
    <div class="md:hidden">
      <button @click="toggleMobileMenu" class="text-white">
        <svg
          class="h-6 w-6"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4 6h16M4 12h16m-7 6h7"
          ></path>
        </svg>
      </button>
    </div>

    <!-- Mobile Menu -->
    <div v-if="showMobileMenu" class="md:hidden absolute top-16 right-0 bg-blue-800 py-4 px-8 w-48">
      <div class="flex flex-col space-y-2">
        <router-link
          to="/candidatos"
          class="text-white hover:text-gray-500 transition duration-300"
          :class="{ 'font-bold': isActive('/candidatos') }"
        >Candidato</router-link>
        <router-link
          to="/reports"
          class="text-white hover:text-gray-500 transition duration-300"
          :class="{ 'font-bold': isActive('/reports') }"
        >Report</router-link>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      showMobileMenu: false,
    };
  },
  methods: {
    toggleMobileMenu() {
      this.showMobileMenu = !this.showMobileMenu;
    },
    isActive(route) {
      return this.$route.path === route;
    },
  },
};
</script>

<style scoped>

</style>
