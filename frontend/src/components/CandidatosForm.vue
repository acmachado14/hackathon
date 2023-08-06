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
                <v-col cols="12">
                <p style="padding-left: 15px;">Dependente {{ index+1 }}</p>
                </v-col>
                <v-col cols="8">
                  <v-text-field :rules="ruleReq" v-model="item.nome" :label="'Nome do Dependente ' + (index + 1)"></v-text-field>
                </v-col>
                <v-col cols="4">
                  <v-select :rules="ruleReq" v-model="item.grau" :items="optDependente" :label="'Tipo do Dependente ' + (index + 1)"></v-select>
                </v-col>
                <v-col cols="6">
                  <v-text-field :rules="ruleReq" v-model="item.cpf" :label="'CPF do Dependente ' + (index + 1)"></v-text-field>
                </v-col>
                <v-col cols="6">
                  <v-text-field :rules="ruleReq" v-model="item.dataNascimento" :label="'Nascimento do Dependente ' + (index + 1)"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="6">
                  <v-select :rules="ruleReq" v-model="item.sexo" :items="optSexo" :label="'Sexo do Dependente '  + (index + 1)"></v-select>
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
      optSexo: ['Masculino', 'Feminino', 'Outro'],
      optEstadoCivil: ["Solteiro(a)", "Casado(a)", "Divorciado(a)", "Viúvo(a)", "União Estável", "Separado(a)", "Outro"],
      optGrauInstrucao: ["Ensino Fundamental", "Ensino Médio", "Ensino Técnico", "Ensino Superior", "Pós-Graduação", "Mestrado", "Doutorado", "Outro"],
      optCor: ["Branco", "Negro", "Pardo", "Amarelo", "Indígena", "Outra"],
      optNacionalidade: ["Brasileiro"],
      optPaisNascimento: ["Brasil"],
      optTipoLogradouro: ["Avenida", "Rua", "Travessa", "Alameda", "Praça", "Estrada", "Largo", "Viela", "Passagem", "Rodovia", "Beco", "Ponte", "Caminho", "Alley", "Boulevard", "Calçada", "Cais", "Elevado", "Jardim", "Ladeira", "Marginal", "Passeio", "Pátio", "Pier", "Ramal", "Sítio", "Vila"],
      optFuncao: [1, 2],
      optAlojado: ["Betim"],
      optEstadoEmissao: ["MG"],
      optCidadeEmissao: ["Betim"],
      optDependente: ['Filho(a)', 'Enteado(a)', 'Cônjuge', 'Pai/Mãe', 'Outro'],
      optPCD: ["Não", "Sim"],

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
        deps.push({ nome: item.nome, grau: item.grau, cpf: item.cpf, sexo: item.sexo, dataNascimento: item.dataNascimento });
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

        numeroBotina: parseInt(this.numeroBotina),
        numeroCalca: parseInt(this.numeroCalca),
        tamanhoCamisa: this.tamanhoCamisa,

        email: this.email,
        numIdentidade: parseInt(this.numRG),
        orgaoEmissorIdentidade: this.orgaoEmissor,
        estadoOrgaoEmissor: this.estadoEmissao,
        cidadeEmissaoIdentidade: this.cidadeEmissao,
        dataExpedicaoIdentidade: this.dataExpedicao,
        numCPF: parseInt(this.cpf),
        numPisPasep: parseInt(this.pis),

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
      fd.append('anexoIdentidade', this.fileRG);
      fd.append('anexoCPF', this.fileCPF);
      fd.append('anexoCurriculo', this.fileCurriculo);
      fd.append('anexoCNH', this.fileCNH);
      fd.append('anexoCertificadoReservista', this.fileReservista);
      console.log();
      for (var pair of fd.entries()) {
          console.log(pair[0]+ ', ' + pair[1]);
      }

      axios.post('http://127.0.0.1:8989/api/cadastrarCandidato', fd, {
        headers: {
          'Content-Type': 'multipart/form-data; boundary=<calculated when request is sent>',
          'Access-Control-Allow-Origin': '*'
        }
      })

    },
    addField() {
      this.dependentes.push({ nome: '', grau: null, cpf: '', sexo: null, dataNascimento: '' });
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
    fillForm() {
      this.sexo = this.sexo || this.optSexo[0];
      this.estadoCivil = this.estadoCivil || this.optEstadoCivil[0];
      this.grauInstrucao = this.grauInstrucao || this.optGrauInstrucao[0];
      this.cor = this.cor || this.optCor[0];
      this.paisNascimento = this.paisNascimento || this.optPaisNascimento[0];
      this.nacionalidade = this.nacionalidade || this.optNacionalidade[0];
      this.tipoLogradouro = this.tipoLogradouro || this.optTipoLogradouro[0];
      this.estadoEmissao = this.estadoEmissao || this.optEstadoEmissao[0];
      this.cidadeEmissao = this.cidadeEmissao || this.optCidadeEmissao[0];
      this.funcao = this.funcao || this.optFuncao[0];
      this.alojado = this.alojado || this.optAlojado[0];
      this.pcd = this.pcd || this.optPCD[0];
      if (!this.nome) this.nome = 'Nome Padrão';
      if (!this.nomeMae) this.nomeMae = 'Mãe Padrão';
      if (!this.nomePai) this.nomePai = 'Pai Padrão';
      if (!this.dataNascimento) this.dataNascimento = '01/01/2000';
      if (!this.estadoNascimento) this.estadoNascimento = 'Estado Padrão';
      if (!this.cidadeNascimento) this.cidadeNascimento = 'Cidade Padrão';
      if (!this.nomeConhecido) this.nomeConhecido = 'Conhecido Padrão';
      if (!this.cargoConhecido) this.cargoConhecido = 'Cargo Padrão';
      if (!this.cidadeConhecido) this.cidadeConhecido = 'Cidade Conhecido Padrão';
      if (!this.cep) this.cep = '32603242';
      if (!this.rua) this.rua = 'Rua Padrão';
      if (!this.num) this.num = '123';
      if (!this.complemento) this.complemento = 'Complemento Padrão';
      if (!this.numRG) this.numRG = '12345678';
      if (!this.orgaoEmissor) this.orgaoEmissor = 'SSP';
      if (!this.dataExpedicao) this.dataExpedicao = '01/01/2010';
      if (!this.cpf) this.cpf = '12345678900';
      if (!this.pis) this.pis = '12345678900';
      if (!this.numeroBotina) this.numeroBotina = '42';
      if (!this.numeroCalca) this.numeroCalca = '40';
      if (!this.tamanhoCamisa) this.tamanhoCamisa = 'M';
      if (!this.telefone1) this.telefone1 = '(12) 3456-7890';
      if (!this.telefone2) this.telefone2 = '(34) 5678-9012';
      if (!this.email) this.email = 'email@example.com';
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
