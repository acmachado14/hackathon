<template>
  <v-app>
    <top-navbar></top-navbar>
    <v-main>
      <router-view></router-view>
    </v-main>
  </v-app>
</template>

<script>
import TopNavbar from '@/components/TopNavbar.vue';

export default {
  components: {
    TopNavbar,
  },
};
</script>
