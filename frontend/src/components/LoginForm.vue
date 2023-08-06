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
              <v-text-field :rules="ruleReq" v-model="CPF" label="CPF"></v-text-field>
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
// import axios from 'axios';

export default {
  data() {
    return {
      CPF: '',
      senha: '',

      ruleReq:[
        value => !!value || 'Esse campo é obrigatório.',
      ],    
    };
  },
  methods: {
    submitForm() {
      const fields = JSON.stringify({
        CPF: this.CPF,
        senha: this.senha
      });
      axios.post('/login', fields, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      })
    },
    login() {
      //Faz a validação do login neste if
      if (this.CPF === '12345678911' && this.senha === '123456') {
        alert('Login bem-sucedido! Redirecionando para a página interna.');
      } else {
        alert('CPF ou senha incorretos. Tente novamente!');
      }
    },
    fillForm() {
      this.CPF = '12345678911';
      this.senha = 'ABCC1234';
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
