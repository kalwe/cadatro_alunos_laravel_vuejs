<template>
<div>
  <h1>Cursos</h1>
  <table class="table table-bordered table-hover">
  <thead>
  <tr>
    <th>#</th>
    <th>Nome</th>
    <th>Valor Mensalidade</th>
    <th>Valor Matrícula</th>
    <th>Período</th>
    <th>Meses de Duração</th>
    <th>
      <router-link to="/curso/cadastro" class="btn btn-success">Cadastrar</router-link>
    </th>
  </tr>
  </thead>
  <tbody>
  <tr v-for="(curso, index) in cursos" v-bind:key="index">
    <th>{{ curso.id }}</th>
    <th>{{ curso.nome }}</th>
    <td>{{ curso.valor_mensalidade }}</td>
    <td>{{ curso.valor_matricula }} </td>
    <td>{{ curso.periodo }}</td>
    <td>{{ curso.meses_duracao }}</td>
    <td>
    <div class="btn-group">
      <router-link :to="'/curso/atualizar/' + curso.id" class="btn btn-primary btn-router-link">Editar</router-link>
      <b-button class="btn btn-danger" @click="deletarCurso(curso)" v-b-modal.modal-excluir-curso>X</b-button>
    </div>
    </td>
  </tr>
  </tbody>
  </table>

  <div>
  <b-modal id="modal-excluir-curso" title="">
    <div class="d-block text-center">
      <h3>curso deletado com sucesso!</h3>
    </div>

    <template v-slot:modal-footer="{ hideModal }">
      <b-button size="sm" variant="success" @click="this.hide()">
        Ok
      </b-button>
    </template>

  </b-modal>
  </div>

</div>
</template>

<script>
import Cursos from '@/services/cursos'
import { BModal } from 'bootstrap-vue'

export default {
  name: 'buscarCurso',
  components: {
    BModal
  },
  data() {
    return {
      cursos: [],
    }
  },
  mounted() {
    Cursos.listar()
      .then(response => {
        this.cursos = response.data
      })
      .catch(err => console.log('GerenciarCursos.vue - error: ' + err))
  },
  methods: {
    listarcursos: () => {
      Cursos.listar()
        .then((response) => {
          self.cursos = response.data
        })
    },

    deletarCurso(curso) {
      Cursos.deletar(curso)
      // location.reload()
    },

    hideModal() {
      this.$refs['modal-excluir-curso'].hide()
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
