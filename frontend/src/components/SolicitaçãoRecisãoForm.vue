<template>
  <v-container class="center-container" fluid>
    <v-row justify="center">
      <v-col cols="8" sm="6" md="4">
        <v-card>
          <v-card-title class="text-center">Solicitação de recisão</v-card-title>
          <v-card-text>
            <v-form @submit.prevent="submitForm">
              <v-card-title class="text-left">Identificação</v-card-title>
              <v-text-field v-model="cpf" label="CPF do colaborador a ser rescindido"></v-text-field>
              <v-card-title class="text-left">Motivo da recisão:</v-card-title>
              <v-textarea :rules="ruleReq" v-model="motivo" label="Motivo da recisão"></v-textarea>
              <v-card-title class="text-left">Ranking de recomendação de recontratação do colaborador:</v-card-title>
              <v-select
                :rules="[ruleReq]"
                v-model="rankingRecomendacao"
                :items="intervaloRanking.map(ranking => ranking)"
                label="(0 -> Não recomendaria a recontratação, 5 -> Recomendaria a recontratação)"
              ></v-select>
              <v-card-title>Data solicitação:</v-card-title>
              <v-text-field
                v-model="dataSolicitacaoRecisao"
                label="Data da solicitação (DD/MM/AAAA)"
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
      motivo: '',

      rankingRecomendacao: null,
      intervaloRanking: [],
      
      dataSolicitacaoRecisao: null,

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
    // Preenche o array os valores possíveis para o ranking de recomendação
    for (let ranking = 1; ranking <= 5; ranking++) {
      this.intervaloDias.push(ranking);
    }

    this.rankingRecomendacao = this.intervaloRanking[0];
  },
  methods: {
    submitForm() {
      
      const formattedDataSolicitacao = this.$vcalendar.getFormattedDate(this.dataSolicitacaoRecisao, 'DD/MM/YYYY');

      const fields = JSON.stringify({
        cpf: parseInt(this.cpf),
        rankingRecomendacao: parseInt(this.rankingRecomendacao),

        motivo: this.motivo,

        dataSolicitacaoRecisao: formattedDataSolicitacao,

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
      this.qntdDiasSelecionada = 0;
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
