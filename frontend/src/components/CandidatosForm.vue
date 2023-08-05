<template>
  <v-container class="center-container" fluid>
    <v-row justify="center">
      <v-col cols="12" sm="10" md="8">
        <v-card>
          <v-card-title class="text-center">Formulário de Candidato</v-card-title>
          <v-card-text>
            <v-form @submit.prevent="submitForm">
              <v-card-title class="text-left">Informações Pessoais</v-card-title>
              <v-text-field :rules="ruleReq" v-model="nome" label="Nome Completo*"></v-text-field>
              <v-text-field :rules="ruleReq" v-model="nomeMae" label="Nome Completo da Mãe*"></v-text-field>
              <v-text-field :rules="ruleReq" v-model="nomePai" label="Nome Completo do Pai*"></v-text-field>
              <v-row>
                <v-col cols="12" sm="6" md="3">
                  <v-select :rules="ruleReq" v-model="sexo" :items="optSexo" label="Sexo*"></v-select>
                </v-col>
                <v-col cols="12" sm="6" md="3">
                  <v-select :rules="ruleReq" v-model="estadoCivil" :items="optEstadoCivil" label="Estado Civíl*"></v-select>
                </v-col>
                <v-col cols="12" sm="6" md="3">
                  <v-select :rules="ruleReq" v-model="grauInstrucao" :items="optGrauInstrucao" label="Grau de Instrução*"></v-select>
                </v-col>
                <v-col cols="12" sm="6" md="3">
                  <v-select :rules="ruleReq" v-model="cor" :items="optCor" label="Raça/Cor*"></v-select>
                </v-col>
              </v-row>
              <v-card-title class="text-left">Informações de Nascimento</v-card-title>
              <v-row>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field :rules="ruleReq" v-model="dataNascimento" label="Data de Nascimento*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-select :rules="ruleReq" v-model="nacionalidade" :items="optNacionalidade" label="Nacionalidade*"></v-select>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-select :rules="ruleReq" v-model="paisNascimento" :items="optPaisNascimento" label="País Nascimento*"></v-select>
                </v-col>
              </v-row>
              <v-row>
                <v-col cols="12" sm="12" md="6">
                  <v-text-field :rules="ruleReq" v-model="estadoNascimento" label="Estado de Nascimento*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="6">
                  <v-text-field :rules="ruleReq" v-model="cidadeNascimento" label="Cidade de Nascimento*"></v-text-field>
                </v-col>
              </v-row>
              <v-card-title class="text-left">Tamanhos</v-card-title>
              <v-row>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field :rules="ruleReq" v-model="numeroBotina" label="Número de Botina*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field :rules="ruleReq" v-model="numeroCalca" label="Número de Calça*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field :rules="ruleReq" v-model="tamanhoCamisa" label="Tamanho de Camisa*"></v-text-field>
                </v-col>
              </v-row>
              <v-card-title class="text-left">Contato</v-card-title>
              <v-row>
                <v-col cols="12" sm="12" md="6">
                  <v-text-field :rules="ruleReq" v-model="telefone1" label="Telefone 1*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="6">
                  <v-text-field v-model="telefone2" label="Telefone 2"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="12">
                  <v-text-field :rules="ruleReq" v-model="email" label="Email*"></v-text-field>
                </v-col>
              </v-row>
              <v-card-title class="text-left">Endereço</v-card-title>
              <v-row>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field :rules="ruleReq" v-model="cep" label="CEP*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field :rules="ruleReq" v-model="pais" label="País*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field :rules="ruleReq" v-model="estado" label="Estado*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field :rules="ruleReq" v-model="cidade" label="Cidade*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field :rules="ruleReq" v-model="bairro" label="Bairro*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-select :rules="ruleReq" v-model="tipoLogradouro" :items="optTipoLogradouro" label="Tipo de Logradouro*"></v-select>
                </v-col>
                <v-col cols="12" sm="12" md="9">
                  <v-text-field :rules="ruleReq" v-model="rua" label="Rua*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="3">
                  <v-text-field :rules="ruleReq" v-model="num" label="Número*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="6">
                  <v-text-field v-model="complemento" label="Complemento"></v-text-field>
                </v-col>
              </v-row>
              <v-card-title class="text-left">Documentos</v-card-title>
              <v-row>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field :rules="ruleReq" v-model="numRG" label="RG*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field :rules="ruleReq" v-model="orgaoEmissor" label="Orgão Emissor*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-select :rules="ruleReq" v-model="estadoEmissao" :items="optEstadoEmissao" label="Estado de Emissão*"></v-select>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-select :rules="ruleReq" v-model="cidadeEmissao" :items="optCidadeEmissao" label="Cidade de Emissão*"></v-select>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field :rules="ruleReq" v-model="dataExpedicao" label="Data de Expedição*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field :rules="ruleReq" v-model="cpf" label="Número do CPF*"></v-text-field>
                </v-col>
                <v-col cols="12" sm="12" md="4">
                  <v-text-field :rules="ruleReq" v-model="pis" label="Número do PIS/PASEP*"></v-text-field>
                </v-col>
              </v-row>
              <v-card-title class="text-left">Outros</v-card-title>
              <v-row>
                <v-col cols="12" sm="12" md="6">
                  <v-select :rules="ruleReq" v-model="funcao" :items="optFuncao" label="Função*"></v-select>
                </v-col>
                <v-col cols="12" sm="12" md="3">
                  <v-select :rules="ruleReq" v-model="alojado" :items="optAlojado" label="Alojado*"></v-select>
                </v-col>
                <v-col cols="12" sm="12" md="3">
                  <v-select :rules="ruleReq" v-model="pcd" :items="optPCD" label="PCD*"></v-select>
                </v-col>
              </v-row>
              <v-card-title class="text-left">Anexos</v-card-title>
              <v-col cols="12">
                <v-file-input :rules="ruleReq" v-model="fileRG" label="Arquivo de Identidade (RG)*"></v-file-input>
              </v-col>
              <v-col cols="12">
                <v-file-input :rules="ruleReq" v-model="fileCPF" label="Arquivo de CPF*"></v-file-input>
              </v-col>
              <v-col cols="12">
                <v-file-input :rules="ruleReq" v-model="fileCurriculo" label="Arquivo de Currículo*"></v-file-input>
              </v-col>
              <v-col cols="12">
                <v-file-input :rules="ruleReq" v-model="fileCNH" label="Arquivo de CNH*"></v-file-input>
              </v-col>
              <v-col cols="12">
                <v-file-input :rules="ruleReq" v-model="fileReservista" label="Arquivo de Certificado de Reservista*"></v-file-input>
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
              <v-row style="padding-left: 15px; margin-bottom: 10px;">
                <v-col cols="12">
                  <v-btn @click="addField" color="primary">Adicionar Dependente</v-btn>
                  <v-btn @click="removeField" color="error">Remover Dependente</v-btn>
                </v-col>
              </v-row>
              <v-row v-for="(item, index) in dependentes" :key="index">
                <v-col cols="8">
                  <v-text-field v-model="item.nome" :label="'Nome do Dependente ' + (index + 1)"></v-text-field>
                </v-col>
                <v-col cols="4">
                  <v-select v-model="item.tipo" :items="optDependente" :label="'Tipo do Dependente ' + (index + 1)"></v-select>
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
import axios from 'axios';

export default {
  data() {
    return {
      optSexo: ['Masculino', 'Feminino', 'Outro'],
      optEstadoCivil: ["Solteiro(a)", "Casado(a)", "Divorciado(a)", "Viúvo(a)", "União Estável", "Separado(a)", "Outro"],
      optGrauInstrucao: ["Ensino Fundamental", "Ensino Médio", "Ensino Técnico", "Ensino Superior", "Pós-Graduação", "Mestrado", "Doutorado", "Outro"],
      optCor: ["Branco", "Negro", "Pardo", "Amarelo", "Indígena", "Outra"],
      optNacionalidade: [],
      optPaisNascimento: [],
      optTipoLogradouro: ["Avenida", "Rua", "Travessa", "Alameda", "Praça", "Estrada", "Largo", "Viela", "Passagem", "Rodovia", "Beco", "Ponte", "Caminho", "Alley", "Boulevard", "Calçada", "Cais", "Elevado", "Jardim", "Ladeira", "Marginal", "Passeio", "Pátio", "Pier", "Ramal", "Sítio", "Vila"],

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
      dependentes: [],
      optDependente: ['Filho(a)', 'Enteado(a)', 'Cônjuge', 'Pai/Mãe', 'Outro'],
      optPCD: ["Não", "Sim"],
      ruleReq: [
        // value => !!value || 'Esse campo é obrigatório.',
      ],
    };
  },
  watch: {
    cep(newCep) {
      if (newCep.length === 8) {
        this.fetchAddress();
      }
    },
  },
  methods: {
    submitForm() {
      const deps = [];
      this.dependentes.forEach(item => {
        // Do something with each item, if needed
        deps.push({ nomeDep: item.nome, tipoDep: item.tipo });
      });

      const fields = JSON.stringify({
        nomeCandidato: this.nome,
        nomeMae: this.nomeMae,
        nomePai: this.nomePai,

        sexoCandidato: this.sexo,
        estadoCivil: this.estadoCivil,
        grauInstrucao: this.grauInstrucao,
        racaCor: this.cor,

        dataNascimentoCandidato: this.dataNascimento,
        nacionalidade: this.nacionalidade,
        paisNascimento: this.paisNascimento,
        estadoNascimento: this.estadoNascimento,
        cidadeNascimento: this.cidadeNascimento,

        numeroBotina: this.numeroBotina,
        numeroCalca: this.numeroCalca,
        tamanhoCamisa: this.tamanhoCamisa,

        email: this.email,
        numIdentidade: this.numIdentidade,
        orgaoEmissorIdentidade: this.orgaoEmissor,
        estadoOrgaoEmissor: this.estadoEmissao,
        cidadeEmissaoIdentidade: this.cidadeEmissao,
        dataExpedicaoIdentidade: this.dataExpedicao,
        numCPF: this.cpf,
        numPisPasep: this.pis,

        conhecido: this.conhecido,
        nomeConhecido: this.nomeConhecido,
        cargoConhecido: this.cargoConhecido,
        cidadeConhecido: this.cidadeConhecido,

        endereco: {
          CEP: this.cep,
          pais: this.pais,
          estado: this.estado,
          cidade: this.cidade,
          bairro: this.bairro,
          tipoLogradouro: this.tipoLogradouro,
          enderecoResidencial: this.rua,
          numeroResidencia: this.num,
          complementoEndereco: this.complemento,
        },
        status: 0,
        idFuncao: this.funcao,
        alojado: this.alojado,
        pcd: this.pcd,
        qntDependentes: this.count,
        dependentes: deps
      });

      const fd = new FormData();
      fd.append('fields', fields);
      fd.append('fileRG', this.fileRG);
      fd.append('fileCPF', this.fileCPF);
      fd.append('fileCurriculo', this.fileCurriculo);
      fd.append('fileCNH', this.fileCNH);
      fd.append('fileReservista', this.fileReservista);
      console.log();
      for (var pair of fd.entries()) {
          console.log(pair[0]+ ', ' + pair[1]);
      }

      axios.post('/candidatos', fields, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      })

    },
    addField() {
      this.dependentes.push({ text: '', select: null });
    },
    removeField() {
      this.dependentes.pop();
    },
    async fetchAddress() {
      try {
        const response = await axios.get(`https://viacep.com.br/ws/${this.cep}/json/`);
        const data = response.data;
        this.logradouro = data.logradouro;
        this.bairro = data.bairro;
        this.cidade = data.localidade;
        this.estado = data.uf;
        this.tipoLogradouro = data.logradouro.split(' ')[0]; // Obtém o tipo de logradouro
        this.rua = data.logradouro.substring(this.tipoLogradouro.length + 1);
        this.readOnly = false;
      } catch (error) {
        console.error('Erro ao buscar o endereço:', error);
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
