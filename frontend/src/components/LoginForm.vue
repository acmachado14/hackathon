<template>
  <v-container class="center-container" fluid>
    <v-row justify="center" align="center">
      <v-col cols="3">
        <v-card>
          <div class="logo-container">
            <img src="@/assets/logoAlfaHorizontal.png" alt="Logo" width="450">
          </div>
          <v-card-title class="text-center">Login</v-card-title>
          <v-card-text>
            <v-form @submit.prevent="login">
              <v-text-field :rules="ruleReq" v-model="cpf" label="CPF"></v-text-field>
              <v-text-field :rules="ruleReq" v-model="senha" label="Senha" type="password"></v-text-field>
              <v-btn type="submit" color="primary">Entrar</v-btn>
              <v-btn @click="fillForm" color="warning">Fill</v-btn>
            </v-form>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import axios from 'axios';
import { mapActions, mapGetters } from 'vuex';

export default {
  computed: {
    ...mapGetters(['getIsLoggedIn']),
  },
  data() {
    return {
      cpf: '',
      senha: '',

      ruleReq:[
        value => !!value || 'Esse campo é obrigatório.',
      ],
    };
  },
  methods: {
    submitForm() {
      const fields = JSON.stringify({
        cpf: this.cpf,
        senha: this.senha
      });
      axios.post('/login', fields, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      })
    },
    async login() {
      try {
        const response = await axios.post('http://127.0.0.1:8989/api/login', {
          login: this.cpf,
          senha: this.senha,
        },
        {
          headers: {
            'Access-Control-Allow-Origin': '*'
          }
        });

        if (response.data.token) {
          this.$store.commit('login');
          this.updateToken(response.data.token);
          this.$router.push('/dashboard');
        } else {
          // Invalid credentials
          // Display an error message to the user
        }
      } catch (error) {
        // Handle error (e.g., network error)
      }
    },
    ...mapActions(['updateToken']),
    fillForm() {
      this.cpf = '12345678911';
      this.senha = '123456';
    }
  }
};
</script>

<style>
.center-container {
  display: flex;
  justify-content: center;
  min-height: 100vh;
}

.logo-container {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 20px;
}

.logo-container img {
  margin: 0 auto;
}
</style>
