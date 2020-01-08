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
      <button class="btn btn-primary" @click="editar(aluno)">Editar</button>
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
import { RouterLink } from 'vue-router'

export default {
  name: 'buscarAluno',
  components: {
    // Gerenciador
    BModal, RouterLink
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

    // //function to add data to table
    // add: function() {
    //   this.alunos.push({
    //     lname: this.input.lname,
    //     fname: this.input.fname,
    //     age: this.input.age,
    //     job: this.input.job,
    //     address: this.input.address
    //   });

    //   for (var key in this.input) {
    //     this.input[key] = '';
    //   }
    //   // this.alunos.sort(ordonner);
    //   this.$refs.lname.focus();
    // },
    // //function to handle data edition
    // edit: function(index) {
    //   this.editInput = this.alunos[index];
    //   console.log(this.editInput);
    //   this.alunos.splice(index, 1);
    // },
    // //function to send data to bin
    // archive: function(index) {
    //   this.bin.push(this.alunos[index]);
    //   this.alunos.splice(index, 1);
    //   // this.bin.sort(ordonner);
    // },
    // //function to restore data
    // restore: function(index) {
    //   this.alunos.push(this.bin[index]);
    //   this.bin.splice(index, 1);
    //   // this.bin.sort(ordonner);
    // },
    // //function to update data
    // update: function(){
    //   // this.alunos.push(this.editInput);
    //    this.alunos.push({
    //     lname: this.editInput.lname,
    //     fname: this.editInput.fname,
    //     age: this.editInput.age,
    //     job: this.editInput.job,
    //     address: this.editInput.address
    //   });
    //    for (var key in this.editInput) {
    //     this.editInput[key] = '';
    //   }
    //   // this.alunos.sort(ordonner);
    // },
    // //function to defintely delete data
    // deplete: function(index) {
    //   // console.log(this.bin[index]);
    //   this.bin.splice(index, 1);
    // }
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

</style>
