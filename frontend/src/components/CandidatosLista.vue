<template>
  <v-container>
    <v-row justify="center">
      <v-col cols="12" md="8">
        <v-card>
          <v-card-title>Lista de Candidatos</v-card-title>
          <v-card-text>
            <v-list>
              <v-list-item
                v-for="(candidato, index) in candidatos"
                :key="index"
              >
                <v-list-item-content>
                  <v-list-item-title>{{ candidato.nomeCandidato }}</v-list-item-title>
                  <v-list-item-subtitle>
                    Status: {{ getStatusLabel(candidato.status) }}
                  </v-list-item-subtitle>
                  <v-list-item-subtitle>Job: {{ candidato.descricao }}</v-list-item-subtitle>
                  <v-btn @click="redirectToCandidatePage(candidato)">
                    Ver Detalhes
                  </v-btn>
                </v-list-item-content>
              </v-list-item>
            </v-list>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>

import axios from "axios";

export default {
  data() {
    return {
      candidatos: [],
    };
  },
  mounted() {
    this.fetchCandidates();
  },
  methods: {
    getStatusLabel(status) {
      const statusLabels = ["Pendente", "Aprovado", "Rejeitado"];
      return statusLabels[status];
    },
    fetchCandidates() {
      axios.get("http://127.0.0.1:8989/api/candidatos")
        .then(response => {
          this.candidatos = response.data;
          console.log(response.data);
        })
        .catch(error => {
          console.error("Erro ao buscar candidatos:", error);
        });
    },
    redirectToCandidatePage(candidato) {
      this.$router.push('/candidato?id='+candidato.idCandidato);
    },
  },
};
</script>
