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
                  <v-select v-model="centroDeCusto" :items="optCentroDeCusto" label="Centro de Custo*"></v-select>
                </v-col>  
                <v-col cols="12" sm="6" md="3">
                  <v-select v-model="referenciaDaAreaDeAtuacao" :items="optReferenciaDaAreaDeAtuacao" label="Referência da Área de Atuação*"></v-select>
                </v-col>
                <v-col cols="12" sm="6" md="3">
                  <v-select v-model="tipoDeReport" :items="optTipoDeReport" label="Tipo de Report*"></v-select>
                </v-col>
              </v-row>
              <v-card-title class="text-left">Localização do Report:</v-card-title>
              <v-btn @click="addLocalizacao">Registrar localização</v-btn>  
              <!-- Remover isto (verificação localização) -->
              <div v-if="localizacao">
                <p>Latitude: {{ localizacao.latitude }}</p>
                <p>Longitude: {{ localizacao.longitude }}</p>
              </div>
              <v-card-title class="text-left">Descrição:</v-card-title>
              <v-textarea v-model="descricao" label="Descrição do relato"></v-textarea>
              <v-card-title class="text-left">Fotos:</v-card-title>
              <v-layout row wrap>
                <v-flex xs6>
                  <v-btn @click="abrirCamera">Tirar Foto</v-btn>
                </v-flex>
                <v-flex xs6>
                  <input type="file" @change="anexarFoto" accept="image/*">
                </v-flex>
              </v-layout>
              <v-layout row wrap>
                <v-flex xs6>
                  <v-btn @click="abrirCamera">Tirar Foto</v-btn>
                </v-flex>
                <v-flex xs6>
                  <input type="file" @change="anexarFoto" accept="image/*">
                </v-flex>
              </v-layout>
              <v-layout row wrap>
                <v-flex xs6>
                  <v-btn @click="abrirCamera">Tirar Foto</v-btn>
                </v-flex>
                <v-flex xs6>
                  <input type="file" @change="anexarFoto" accept="image/*">
                </v-flex>
              </v-layout>
              <v-row>
                <v-col cols="12" sm="6" md="3">
                  <v-flex xs6 v-for="(foto, index) in fotos" :key="index">
                    <v-img :src="foto" width="100" height="100"></v-img>
                    <v-btn @click="removerFoto(index)" color="error">Excluir Imagem</v-btn>
                  </v-flex>
                </v-col>
              </v-row>

              <v-btn type="submit" color="primary">Enviar</v-btn>
            </v-form>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>

export default {
  data() {
    return {
      //Por orientação e porque não foram fornecidas de antemão, as opções de Centro de Custo e Referência da Área de Atuação foram criadas de forma genérica apenas para demonstração 
      optCentroDeCusto: ['Centro 1', 'Centro 2', 'Centro 3', 'Centro 4', 'Centro 5'],
      optReferenciaDaAreaDeAtuacao: ['Area 1', 'Area 2', 'Area 3', 'Area 4', 'Area 5'],
      descricao: '',
      localizacao: null, 
      fotos: [],
      optTipoDeReport: ['Ocorrência', 'Crítica', 'Ideia'],
    };
  },
  methods: {
    submitForm() {
      
    },
    async startCamera() {
      try {
        this.videoStream = await navigator.mediaDevices.getUserMedia({ video: true });
        this.$refs.video.srcObject = this.videoStream;
      } catch (error) {
        console.error('Erro ao acessar a câmera:', error);
      }
    },
    async takePhoto() {
      if (!this.videoStream) return;
        const canvas = document.createElement('canvas');
        canvas.width = this.$refs.video.videoWidth;
        canvas.height = this.$refs.video.videoHeight;
        
        canvas.getContext('2d').drawImage(this.$refs.video, 0, 0, canvas.width, canvas.height);
        this.photoTaken = canvas.toDataURL('image/png');

        this.videoStream.getTracks().forEach(track => track.stop());
    },
    beforeDestroy() {
      if (this.videoStream) {
        this.videoStream.getTracks().forEach(track => track.stop());
      }
    },
    anexarFoto(event) {
      if (this.fotos.length >= 3) {
        console.error("Você já atingiu o limite de 3 fotos.");
        return;
      }

      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = () => {
          this.foto = reader.result;
          this.fotos.push(this.foto); // Adicionar foto anexada à lista de fotos
          this.foto = null; // Limpar a foto anexada para o próximo anexo
        };
        reader.readAsDataURL(file);
      }
    },
    removerFoto(index) {
      this.fotos.splice(index, 1);
    },
    addLocalizacao() {
      if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(position => {
          this.localizacao = {
            latitude: position.coords.latitude,
            longitude: position.coords.longitude
          };
        });
      } else {
        console.error("Erro ao obter a localização.");
      }
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
