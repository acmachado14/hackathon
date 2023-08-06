<template>
  <v-container class="center-container" fluid>
    <v-row justify="center">
      <v-col cols="8" sm="6" md="4">
        <v-card>
          <v-card-title class="text-center">Solicitação de férias</v-card-title>
          <v-card-text>
            <v-form @submit.prevent="submitForm">
              <v-card-title class="text-left">Identificação</v-card-title>
              <v-text-field v-model="cpf" label="CPF"></v-text-field>
              <v-card-title>Quantidade de dias:</v-card-title>
              <v-select
                :rules="[ruleReq]"
                v-model="qntdDiasSelecionada"
                :items="intervaloDias.map(dia => dia + ' dias')"
                label="Dias"
              ></v-select>
              <v-card-title>Data solicitação:</v-card-title>
              <v-text-field
                v-model="dataSolicitacaoFerias"
                label="Data de solicitação (DD/MM/AAAA)"
                @input="onDateInput"
                :rules="[dateRule, ruleReq]"
                mask="##/##/####"
              ></v-text-field>
              <v-card-title>Data de início:</v-card-title>
              <v-text-field
                v-model="dataInicioFerias"
                label="Data de início (DD/MM/AAAA)"
                @input="onDateInput"
                :rules="[dateRule, ruleReq]"
                mask="##/##/####"
              ></v-text-field>
              <v-btn type="submit" color="primary">Enviar</v-btn>
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

export default {
  data() {
    return {
      cpf: '',

      qntdDiasSelecionada: null,
      intervaloDias: [],
      
      dataInicioFerias: null,
      dataSolicitacaoFerias: null,

      customDateFormat: 'dd/MM/yyyy',

      ruleReq:[
        value => !!value || 'Esse campo é obrigatório.',
      ],
      
      dateRule: [
        v => /^\d{2}\/\d{2}\/\d{4}$/.test(v) || 'Formato de data inválido (DD-MM-AAAA)',
      ],
    };
  },
  mounted() {
    // Preenche no array a quntidade maxima de dias definida como 30
    for (let dia = 1; dia <= 30; dia++) {
      this.intervaloDias.push(dia);
    }

    this.qntdDiasSelecionada = this.intervaloDias[0];
  },
  methods: {
    submitForm() {
      
      const formattedDataInicio = this.$vcalendar.getFormattedDate(this.dataInicioFerias, 'DD/MM/YYYY');
      const formattedDataSolicitacao = this.$vcalendar.getFormattedDate(this.dataSolicitacaoFerias, 'DD/MM/YYYY');

      const fields = JSON.stringify({
        cpf: parseInt(this.cpf),
        qntdDiasSelecionada: parseInt(this.qntdDiasSelecionada),

        dataInicioFerias: formattedDataInicio,
        dataSolicitacaoFerias: formattedDataSolicitacao,

      });

      //TODO -
      axios.post('http://127.0.0.1:8989/api/cadastararReporte', fd, {
        headers: {
          'Content-Type': 'multipart/form-data',
          'Access-Control-Allow-Origin': '*'
        }
      })
    },
    onDateInput(date) {
      if (date) {
        const [day, month, year] = date.split('/');
        this.dataSelecionada = `${day}/${month}/${year}`;
      }
    },
    fillForm() {
      this.cpf = '12345678900';
      this.qntdDiasSelecionada = this.intervaloDias[0];
      this.dataInicioFerias = '01/01/2021';
      this.dataSolicitacaoFerias = '01/01/2021';
    },
  },
};
</script>

<style>
.center-container {
  display: flex;
  justify-content: center;
  min-height: 100vh;
}
</style>
