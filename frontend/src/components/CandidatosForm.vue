<template>
  <v-container class="center-container" fluid>
    <v-row justify="center">
      <v-col cols="12" sm="10" md="8">
        <v-card>
          <v-card-title class="text-center">Formulário de Candidato</v-card-title>
          <v-card-text>
            <v-form @submit.prevent="submitForm">
              <v-card-title class="text-left">Informações Pessoais</v-card-title>
              <v-text-field v-model="nome" label="Nome Completo*"></v-text-field>
              <v-text-field v-model="nomeMae" label="Nome Completo da Mãe*"></v-text-field>
              <v-text-field v-model="nomePai" label="Nome Completo do Pai*"></v-text-field>
              <v-row>
                <v-col cols="12" sm="6" md="3">
                  <v-select v-model="sexo" :items="optSexo" label="Sexo*"></v-select>
                </v-col>
                <v-col cols="12" sm="6" md="3">
                  <v-select v-model="estadoCivil" :items="optEstadoCivil" label="Estado Civíl*"></v-select>
                </v-col>
                <v-col cols="12" sm="6" md="3">
                  <v-select v-model="grauInstrucao" :items="optGrauInstrucao" label="Grau de Instrução*"></v-select>
                </v-col>
                <v-col cols="12" sm="6" md="3">
                  <v-select v-model="cor" :items="optCor" label="Raça/Cor*"></v-select>
                </v-col>
              </v-row>
              <v-card-title class="text-left">Informações de Nascimento</v-card-title>
              <v-row>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="nascimento" label="Data de Nascimento*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-select v-model="nacionalidade" :items="optNacionalidade" label="Nacionalidade*"></v-select>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-select v-model="paisNascimento" :items="optPaisNascimento" label="País Nascimento*"></v-select>
                </v-col>
              </v-row>
              <v-row>
                <v-col cols="12" sm="12" md="6">
                  <v-text-field v-model="estadoNascimento" label="Estado de Nascimento*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="6">
                  <v-text-field v-model="cidadeNascimento" label="Cidade de Nascimento*"></v-text-field>
                </v-col>
              </v-row>
              <v-card-title class="text-left">Tamanhos</v-card-title>
              <v-row>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="numeroBotina" label="Número de Botina*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="numeroCalca" label="Número de Calça*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="tamanhoCamisa" label="Tamanho de Camisa*"></v-text-field>
                </v-col>
              </v-row>
              <v-card-title class="text-left">Contato</v-card-title>
              <v-row>
                <v-col cols="12" sm="12" md="6">
                  <v-text-field v-model="telefone1" label="Telefone 1*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="6">
                  <v-text-field v-model="telefone2" label="Telefone 2"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="12">
                  <v-text-field v-model="email" label="Email*"></v-text-field>
                </v-col>
              </v-row>
              <v-card-title class="text-left">Endereço</v-card-title>
              <v-row>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="cep" label="CEP*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="pais" label="País*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="estado" label="Estado*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="cidade" label="Cidade*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="bairro" label="Bairro*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-select v-model="tipoLogradouro" :items="optTipoLogradouro" label="Tipo de Logradouro*"></v-select>
                </v-col>
                <v-col cols="12" sm="12" md="9">
                  <v-text-field v-model="rua" label="Rua*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="3">
                  <v-text-field v-model="num" label="Número*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="6">
                  <v-text-field v-model="complemento" label="Complemento"></v-text-field>
                </v-col>
              </v-row>
              <v-card-title class="text-left">Documentos</v-card-title>
              <v-row>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="numRG" label="RG*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="orgaoEmissor" label="Orgão Emissor*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-select v-model="estadoEmissao" :items="optEstadoEmissao" label="Estado de Emissão*"></v-select>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-select v-model="cidadeEmissao" :items="optCidadeEmissao" label="Cidade de Emissão*"></v-select>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="dataExpedicao" label="Data de Expedição*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="cpf" label="Número do CPF*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="pis" label="Número do PIS/PASEP*"></v-text-field>
                </v-col>
              </v-row>
              <v-card-title class="text-left">Outros</v-card-title>
              <v-row>
                <v-col cols="12" sm="12" md="6">
                  <v-select v-model="funcao" :items="optFuncao" label="Função*"></v-select>
                </v-col>
                <v-col cols="12" sm="12" md="3">
                  <v-select v-model="alojado" :items="optAlojado" label="Alojado*"></v-select>
                </v-col>
                <v-col cols="12" sm="12" md="3">
                  <v-select v-model="pcd" :items="optPDC" label="PCD*"></v-select>
                </v-col>
              </v-row>
              <v-card-title class="text-left">Anexos</v-card-title>
              <v-col cols="12">
                <v-file-input v-model="fileRG" label="Arquivo de Identidade (RG)*"></v-file-input>
              </v-col>
              <v-col cols="12">
                <v-file-input v-model="fileCPF" label="Arquivo de CPF*"></v-file-input>
              </v-col>
              <v-col cols="12">
                <v-file-input v-model="fileCurriculo" label="Arquivo de Currículo*"></v-file-input>
              </v-col>
              <v-col cols="12">
                <v-file-input v-model="fileCNH" label="Arquivo de CNH*"></v-file-input>
              </v-col>
              <v-col cols="12">
                <v-file-input v-model="fileReservista" label="Arquivo de Certificado de Reservista*"></v-file-input>
              </v-col>
              <v-row>
                <v-col cols="12">
                  <p style="padding-left: 10px;">Possui algum familiar ou amigo que trabalha na Alfa?</p>
                  <v-radio-group v-model="conhecido" inline>
                    <v-radio label="Sim" value="1" active></v-radio>
                    <v-radio label="Não" value="0"></v-radio>
                  </v-radio-group>
                </v-col>
              </v-row>
              <v-row v-if="conhecido === '1'">
                <v-col cols="12" sm="12" md="12">
                  <v-text-field v-model="nomeConhecido" label="Nome"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="6">
                  <v-text-field v-model="cargoConhecido" label="Cargo que ocupa"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="6">
                  <v-text-field v-model="cidadeConhecido" label="Cidade onde trabalha"></v-text-field>
                </v-col>
              </v-row>

              <v-card-title class="text-left">Dependentes</v-card-title>
              <!-- <v-row>
                <v-col cols="12">
                  <p>Dynamic Inputs:</p>
                  <v-btn @click="addInput">Add Input</v-btn>
                  <v-btn @click="removeInput">Remove Input</v-btn>
                </v-col>
              </v-row> -->

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
      nome: '',
      nomeMae: '',
      nomePai: '',
      sexo: null,
      estadoCivil: null,
      grauInstrucao: null,
      cor: null,
      optSexo: ['Masculino', 'Feminino', 'Outro'],
      optEstadoCivil: ["Solteiro(a)", "Casado(a)", "Divorciado(a)", "Viúvo(a)", "União Estável", "Separado(a)", "Outro"],
      optGrauInstrucao: ["Ensino Fundamental", "Ensino Médio", "Ensino Técnico", "Ensino Superior", "Pós-Graduação", "Mestrado", "Doutorado", "Outro"],
      optCor: ["Branco", "Negro", "Pardo", "Amarelo", "Indígena", "Outra"],
      paisNascimento: null,
      nacionalidade: null,
      optNacionalidade: [],
      optPaisNascimento: [],
      nascimento: null,
      conhecido: null,
      dependentes: [],
    };
  },
  methods: {
    submitForm() {

    },
    addDep() {
      this.dependentes.push('');
    },
    removeDep(index) {
      this.dependentes.splice(index, 1);
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
