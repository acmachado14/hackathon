<template>
  <v-container class="center-container" fluid>
    <v-row justify="center">
      <v-col cols="12" sm="10" md="8">
        <v-card>
          <v-card-title class="text-center">Formulário de Candidato</v-card-title>
          <v-card-text>
            <v-form @submit.prevent="submitForm">
              <v-card-title class="text-left">Informações Pessoais</v-card-title>
              <v-text-field v-model="nome" label="Nome Completo"></v-text-field>
              <v-text-field v-model="nomeMae" label="Nome Completo da Mãe"></v-text-field>
              <v-text-field v-model="nomePai" label="Nome Completo do Pai"></v-text-field>
              <v-row>
                <v-col cols="12" sm="6" md="3">
                  <v-select v-model="sexo" :items="optSexo" label="Sexo"></v-select>
                </v-col>
                <v-col cols="12" sm="6" md="3">
                  <v-select v-model="estadoCivil" :items="optEstadoCivil" label="Estado Civíl"></v-select>
                </v-col>
                <v-col cols="12" sm="6" md="3">
                  <v-select v-model="grauInstrucao" :items="optGrauInstrucao" label="Grau de Instrução"></v-select>
                </v-col>
                <v-col cols="12" sm="6" md="3">
                  <v-select v-model="cor" :items="optCor" label="Raça/Cor"></v-select>
                </v-col>
              </v-row>
              <v-card-title class="text-left">Informações de Nascimento</v-card-title>
              <v-row>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="dataNascimento" label="Data de Nascimento"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-select v-model="nacionalidade" :items="optNacionalidade" label="Nacionalidade"></v-select>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-select v-model="paisNascimento" :items="optPaisNascimento" label="País Nascimento"></v-select>
                </v-col>
              </v-row>
              <v-row>
                <v-col cols="12" sm="12" md="6">
                  <v-text-field v-model="estadoNascimento" label="Estado de Nascimento"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="6">
                  <v-text-field v-model="cidadeNascimento" label="Cidade de Nascimento"></v-text-field>
                </v-col>
              </v-row>
              <v-card-title class="text-left">Tamanhos</v-card-title>
              <v-row>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="numeroBotina" label="Número de Botina"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="numeroCalca" label="Número de Calça"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="tamanhoCamisa" label="Tamanho de Camisa"></v-text-field>
                </v-col>
              </v-row>
              <v-card-title class="text-left">Contato</v-card-title>
              <v-row>
                <v-col cols="12" sm="12" md="6">
                  <v-text-field v-model="telefone1" label="Telefone 1"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="6">
                  <v-text-field v-model="telefone2" label="Telefone 2"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="12">
                  <v-text-field v-model="email" label="Email"></v-text-field>
                </v-col>
              </v-row>
              <v-card-title class="text-left">Endereço</v-card-title>
              <v-row>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="cep" label="CEP"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="pais" label="País"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="estado" label="Estado"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="cidade" label="Cidade"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="bairro" label="Bairro"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-select v-model="tipoLogradouro" :items="optTipoLogradouro" label="Tipo de Logradouro"></v-select>
                </v-col>
                <v-col cols="12" sm="12" md="9">
                  <v-text-field v-model="rua" label="Rua"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="3">
                  <v-text-field v-model="num" label="Número"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="6">
                  <v-text-field v-model="complemento" label="Complemento"></v-text-field>
                </v-col>
              </v-row>
              <v-card-title class="text-left">Documentos</v-card-title>
              <v-row>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="numRG" label="RG"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="orgaoEmissor" label="Orgão Emissor"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-select v-model="estadoEmissao" :items="optEstadoEmissao" label="Estado de Emissão"></v-select>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-select v-model="cidadeEmissao" :items="optCidadeEmissao" label="Cidade de Emissão"></v-select>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="dataExpedicao" label="Data de Expedição"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="cpf" label="Número do CPF"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field v-model="pis" label="Número do PIS/PASEP"></v-text-field>
                </v-col>
              </v-row>
              <v-card-title class="text-left">Outros</v-card-title>
              <v-row>
                <v-col cols="12" sm="12" md="6">
                  <v-select v-model="funcao" :items="optFuncao" label="Função"></v-select>
                </v-col>
                <v-col cols="12" sm="12" md="3">
                  <v-select v-model="alojado" :items="optAlojado" label="Alojado"></v-select>
                </v-col>
                <v-col cols="12" sm="12" md="3">
                  <v-select v-model="pcd" :items="optPCD" label="PCD"></v-select>
                </v-col>
              </v-row>
              <v-card-title class="text-left">Anexos</v-card-title>

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
              <v-row v-for="(item, index) in dependentes" :key="index">
                <v-col cols="12">
                <p style="padding-left: 15px;">Dependente {{ index+1 }}</p>
                </v-col>
                <v-col cols="8">
                  <v-text-field v-model="item.nome" :label="'Nome do Dependente ' + (index + 1)"></v-text-field>
                </v-col>
                <v-col cols="4">
                  <v-select v-model="item.grau" :items="optDependente" :label="'Tipo do Dependente ' + (index + 1)"></v-select>
                </v-col>
                <v-col cols="6">
                  <v-text-field v-model="item.cpf" :label="'CPF do Dependente ' + (index + 1)"></v-text-field>
                </v-col>
                <v-col cols="6">
                  <v-text-field v-model="item.dataNascimento" :label="'Nascimento do Dependente ' + (index + 1)"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="6">
                  <v-select v-model="item.sexo" :items="optSexo" :label="'Sexo do Dependente '  + (index + 1)"></v-select>
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
  props: ['id'],
  data() {
    return {
      nome: '',
      nomeMae: '',
      nomePai: '',

      count: 0,

      sexo: null,
      estadoCivil: null,
      grauInstrucao: null,
      cor: null,

      dataNascimento: '',
      estadoNascimento: '',
      cidadeNascimento: '',
      paisNascimento: null,
      nacionalidade: null,
      nascimento: null,

      conhecido: null,
      nomeConhecido: '',
      cargoConhecido: '',
      cidadeConhecido: '',

      cep: '',
      pais: '',
      estado: '',
      cidade: '',
      bairro: '',
      tipoLogradouro: null,
      rua: '',
      num: '',
      complemento: '',

      fileRG: null,
      fileCPF: null,
      fileCurriculo: null,
      fileCNH: null,
      fileReservista: null,

      estadoEmissao: null,
      cidadeEmissao: null,
      numRG: '',
      orgaoEmissor: '',
      dataExpedicao: '',
      cpf: '',
      pis: '',

      numeroBotina: '',
      numeroCalca: '',
      tamanhoCamisa: '',

      telefone1: '',
      telefone2: '',
      email: '',

      funcao: null,
      alojado: null,
      pcd: null,

      dependentes: [],

      report: []
    };
  },
  mounted() {
    this.fetchDetails();
  },
  methods: {
    addField(nome, grau, cpf, sexo, dataNascimento) {
      this.dependentes.push({ nome, grau, cpf, sexo, dataNascimento});
    },
    fetchDetails() {
      axios.get(`http://127.0.0.1:8989/api/candidatos/${this.id}`)
        .then(response => {
          this.report = response.data;
          console.log(this.report)
        })
        .catch(error => {
          console.error('Error fetching report details:', error);
        });
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
