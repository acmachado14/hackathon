<template>
  <v-container>
    <v-row justify="center">
      <v-col cols="12" md="8">
        <v-card>
          <v-card-title>Lista de Reports</v-card-title>
          <v-card-text>
            <v-row v-for="(report, index) in reports" :key="index" class="mb-2">
              <v-col cols="3">
                <strong>Reporter:</strong>
                <span>{{ getReporterLabel(report.reporter) }}</span>
              </v-col>
              <v-col cols="3">
                <strong>Type:</strong>
                <span>{{ report.tipoReporte }}</span>
              </v-col>
              <v-col cols="3">
                <strong>Reference:</strong>
                <span>{{ report.referenciaDaAreaDeAtuacao }}</span>
              </v-col>
              <v-col cols="3">
                <strong>Center:</strong>
                <span>{{ report.centroDeCusto }}</span>
              </v-col>
              <v-col cols="4">
                <v-btn @click="redirectToReportPage(report)">
                  Mais Detalhes
                </v-btn>
              </v-col>
            </v-row>
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
      reports: [],
    };
  },
  mounted() {
    this.fetchReports();
  },
  methods: {
    fetchReports() {
      axios.get("http://127.0.0.1:8989/api/reporte")
        .then(response => {
          this.reports = response.data;
        })
        .catch(error => {
          console.error("Error fetching reports:", error);
        });
    },
    getReporterLabel(reporter) {
      return reporter || "Anonymous";
    },
    redirectToReportPage(report) {
      this.$router.push('/report?id='+report.idReporte);
    },
  },
};
</script>
