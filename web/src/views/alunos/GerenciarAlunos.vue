<template>
<div>
  <h1>Alunos</h1>
  <table class="table table-bordered table-hover">
  <thead>
  <tr>
    <th>#</th>
    <th>CPF</th>
    <th>RG</th>
    <th>Data de Nascimento</th>
    <th>Nome</th>
    <th>Telefone</th>
    <th>
      <router-link to="/aluno/cadastro" class="btn btn-success">Cadastrar</router-link>
    </th>
  </tr>
  </thead>
  <tbody>
  <tr v-for="(aluno, index) in alunos" v-bind:key="index">
    <th>{{ aluno.id }}</th>
    <th>{{ aluno.cpf }}</th>
    <td>{{ aluno.rg }}</td>
    <td>{{ aluno.data_nascimento }} </td>
    <td>{{ aluno.nome }}</td>
    <td>{{ aluno.telefone }}</td>
    <td>
    <div class="btn-group">
      <router-link :to="'/aluno/atualizar/' + aluno.id" class="btn btn-primary btn-router-link">Editar</router-link>
      <b-button class="btn btn-danger" @click="deletarAluno(aluno)" v-b-modal.modal-excluir-aluno>X</b-button>
    </div>
    </td>
  </tr>
  </tbody>
  </table>

  <div>
  <b-modal id="modal-excluir-aluno" title="">
    <div class="d-block text-center">
      <h3>Aluno deletado com sucesso!</h3>
    </div>

    <template v-slot:modal-footer="{ hideModal }">
      <b-button size="sm" variant="success" @click="$refs.hideModal()">
        Ok
      </b-button>
    </template>

  </b-modal>
  </div>

</div>
</template>

<script>
import Alunos from '@/services/alunos'
// import Gerenciador from '@/components/Gerenciador.vue'
import { BModal } from 'bootstrap-vue'

export default {
  name: 'buscarAluno',
  components: {
    // Gerenciador
    BModal
  },
  data() {
    return {
      alunos: [],
    }
  },
  mounted() {
    Alunos.listar()
      .then(response => {
        this.alunos = response.data
      })
      .catch(err => console.log('GerenciarAlunos.vue - error: ' + err))
  },
  methods: {
    listarAlunos: () => {
      Alunos.listar()
        .then((response) => {
          self.alunos = response.data
        })
    },

    deletarAluno(aluno) {
      Alunos.deletar(aluno)
      location.reload()
    },

    hideModal() {
      this.$refs['modal-excluir-aluno'].hide()
    },
  }
}
</script>

<style scoped>
input {
  margin: 15px;
}

body{

  background: linear-gradient(
		limegreen,
		transparent
	),
	linear-gradient(
		90deg,
		skyblue,
		transparent
	),
	linear-gradient(
		-90deg,
		coral,
		transparent
	);
  background-blend-mode: screen;
}
div:first-child{
  margin: 20px 0;
  table:first-of-type{
    margin: 15px 2px;
    background: #ffffff !important;
  }
  table:last-of-type{
    margin: 15px 2px;
    background: #fdfdef !important;
  }
  .head{
    text-align: center;
    margin: 45px 35px;
  }
  .img-container{
     text-align: center;
  }
}

button {
  margin: 5px;
}

.btn-router-link {
  height: 38px;
  top: 5px;
}

</style>
