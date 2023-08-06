<template>
  <v-app-bar app>
    <v-toolbar-title>Alfa Engenharia</v-toolbar-title>
    <v-spacer></v-spacer>
    <div class="center-buttons">
      <v-btn text to="/candidatos">Candidatos</v-btn>
      <v-btn text to="/reports">Reports</v-btn>
      <v-btn v-if="!getIsLoggedIn" text to="/login">Login</v-btn>
      <v-app-bar-nav-icon v-if="getIsLoggedIn" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
    </div>
  </v-app-bar>

  <v-navigation-drawer v-if="getIsLoggedIn" app right v-model="drawer" >
    <!-- Sidebar content goes here -->

      <v-btn text to="/candidatos-lista" class="menu-side">Lista de Candidatos</v-btn>
      <v-btn text to="/reports-lista" class="menu-side">Lista de Reports</v-btn>
      <v-btn text to="/areas-equipamentos" class="menu-side">Áreas e Equipamentos</v-btn>

  </v-navigation-drawer>
</template>

<script>
import { mapGetters } from 'vuex';
export default {
  computed: {
    ...mapGetters(['getIsLoggedIn']),
  },
  data() {
    return {
      drawer: false, // Set this to false to initially collapse the sidebar
    };
  },
};
</script>

<style>
.center-buttons {
  display: flex;
  align-items: center;
}

.menu-side {
  width: 100%;
  margin-top: 5px;
}

</style>
