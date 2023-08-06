<template>
  <v-container class="center-container" fluid>
    <v-row justify="center">
      <v-col cols="12" sm="10" md="8">
        <v-card>
          <v-card-title class="text-center">Registrar um Report (Ocorrências, críticas e ideias)</v-card-title>
          <v-card-text>
            <v-form @submit.prevent="submitForm">
              <v-card-title class="text-left">Identificação</v-card-title>
              <v-text-field v-model="nome" label="Nome (Deixe em branco caso anônimo)"></v-text-field>
              <v-row>
                <v-col cols="12" sm="6" md="3">
                  <v-select :rules="ruleReq" v-model="centroDeCusto" :items="optCentroDeCusto" label="Centro de Custo*"></v-select>
                </v-col>
                <v-col cols="12" sm="6" md="3">
                  <v-select :rules="ruleReq" v-model="referenciaDaAreaDeAtuacao" :items="optReferenciaDaAreaDeAtuacao" label="Referência da Área de Atuação*"></v-select>
                </v-col>
                <v-col cols="12" sm="6" md="3">
                  <v-select :rules="ruleReq" v-model="tipoDeReporte" :items="optTipoDeReporte" label="Tipo de Report*"></v-select>
                </v-col>
              </v-row>
              <v-card-title class="text-left">Localização do Report:</v-card-title>
              <v-btn @click="addLocalizacao">Registrar localização</v-btn>
              <div v-if="localizacao">
                <p>Latitude: {{ localizacao.latitude }}</p>
                <p>Longitude: {{ localizacao.longitude }}</p>
              </div>
              <v-card-title class="text-left">Descrição:</v-card-title>
              <v-textarea :rules="ruleReq" v-model="descricao" label="Descrição do relato*"></v-textarea>
              <v-card-title class="text-left">Fotos:</v-card-title>
              <v-layout row wrap>
                <v-flex xs6>
                  <v-btn @click="capturarImagem">Capturar imagem</v-btn>
                </v-flex>
                <v-flex xs6>
                  <input type="file" @change="anexarImagem" accept="image/*">
                </v-flex>
              </v-layout>
              <v-layout row wrap>
                <v-flex xs6>
                  <v-btn @click="capturarImagem">Capturar imagem</v-btn>
                </v-flex>
                <v-flex xs6>
                  <input type="file" @change="anexarImagem" accept="image/*">
                </v-flex>
              </v-layout>
              <v-layout row wrap>
                <v-flex xs6>
                  <v-btn @click="capturarImagem">Capturar imagem</v-btn>
                </v-flex>
                <v-flex xs6>
                  <input type="file" @change="anexarImagem" accept="image/*">
                </v-flex>
              </v-layout>
              <v-row>
                <v-col cols="12" sm="6" md="3">
                  <v-flex xs6 v-for="(imagem, index) in imagens" :key="index">
                    <v-img :src="imagem" width="100" height="100"></v-img>
                    <v-btn @click="removerFoto(index)" color="error">Excluir Imagem</v-btn>
                  </v-flex>
                </v-col>
              </v-row>
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
      //Por orientação e porque não foram fornecidas de antemão, as opções de Centro de Custo e Referência da Área de Atuação foram criadas de forma genérica apenas para demonstração
      optCentroDeCusto: ['Centro 1', 'Centro 2', 'Centro 3', 'Centro 4', 'Centro 5'],
      optReferenciaDaAreaDeAtuacao: ['Area 1', 'Area 2', 'Area 3', 'Area 4', 'Area 5'],
      optTipoDeReporte: ['Ocorrência', 'Crítica', 'Ideia'],

      nome: '',
      centroDeCusto: null,
      referenciaDaAreaDeAtuacao: null,
      tipoDeReporte: null,

      localizacao: null,
      latitude: null,
      longitude: null,

      descricao: '',

      imagens: [],
      imagensSend: [],
      ruleReq:[
        // value => !!value || 'Esse campo é obrigatório.',
      ],
    };
  },
  methods: {
    submitForm() {

      const fields = JSON.stringify({
        nome: this.nome,
        centroDeCusto: this.centroDeCusto,
        referenciaDaAreaDeAtuacao: this.referenciaDaAreaDeAtuacao,
        tipoDeReporte: this.tipoDeReporte,

        latitude: this.localizacao.latitude,
        longitude: this.localizacao.longitude,

        descricao: this.descricao,

      });

      const fd = new FormData();
      fd.append('fields', fields);
      console.log(this.imagensSend[0])

      fd.append('foto1', this.imagensSend[0]);
      fd.append('foto2', this.imagensSend[1]);
      fd.append('foto3', this.imagensSend[2]);

      axios.post('http://127.0.0.1:8989/api/cadastararReporte', fd, {
        headers: {
          'Content-Type': 'multipart/form-data',
          'Access-Control-Allow-Origin': '*'
        }
      })
    },
    capturarImagem() {
      if (this.imagens.length < 3) {
        if ("mediaDevices" in navigator && "getUserMedia" in navigator.mediaDevices) {
          navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => {
              const video = document.createElement("video");
              video.srcObject = stream;

              video.onloadedmetadata = () => {
                video.play();

                const canvas = document.createElement("canvas");
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                canvas.getContext("2d").drawImage(video, 0, 0, canvas.width, canvas.height);

                const imagemCapturada = canvas.toDataURL("image/jpeg");
                this.imagens.push(imagemCapturada);

                video.srcObject.getTracks().forEach(track => track.stop());
              };
            })
            .catch(error => {
              console.error("Erro ao abrir a câmera:", error);
            });
        } else {
          console.error("Acesso à câmera não é suportado pelo navegador.");
        }
      } else {
        console.error("Você já atingiu o limite de 3 imagens.");
      }
    },
    anexarImagem(event) {
      if (this.imagens.length >= 3) {
        console.error("Você já atingiu o limite de 3 imagens.");
        return;
      }
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = () => {
          this.imagensSend.push(file);
          this.imagem = reader.result;
          this.imagens.push(this.imagem);
          this.imagem = null;
        };
        reader.readAsDataURL(file);
      }
    },
    removerFoto(index) {
      this.imagens.splice(index, 1);
      this.imagensSend.splice(index, 1);
    },
    addLocalizacao() {
      if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(position => {
          this.localizacao = {
            latitude: position.coords.latitude,
            longitude: position.coords.longitude
          };
        })
        this.latitude = this.localizacao.latitude;
        this.longitude = this.localizacao.longitude;
      } else {
        console.error("Erro ao obter a localização.");
      }
    },
    fillForm() {
      this.nome = '';
      this.centroDeCusto = this.optCentroDeCusto[0];
      this.referenciaDaAreaDeAtuacao = this.optReferenciaDaAreaDeAtuacao[0];
      this.tipoDeReporte = this.optTipoDeReporte[0];
      this.descricao = 'Descrição padrão.';
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
