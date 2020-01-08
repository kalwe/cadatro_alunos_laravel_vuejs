<template>
  <div class="cadastro-aluno">
  <form @submit="cadastrarAluno" method="POST">
    <div class="form-group">
      <label>CPF</label>
      <input v-model="aluno.cpf" type="text" maxlength="16" class="form-control" id="cpf" placeholder="000.000.000-00">
    </div>

    <div class="form-group">
      <label>RG</label>
      <input v-model="aluno.rg" type="text" maxlength="16" class="form-control" id="rg" placeholder="000.000.000-00">
    </div>

    <div class="form-group">
      <label>Data de Nascimento</label>
      <input v-model="aluno.data_nascimento" type="date" maxlength="12" class="form-control" id="data_nascimento">
    </div>

    <div class="form-group">
      <label>Nome</label>
      <input v-model="aluno.nome" type="text" maxlength="256" class="form-control" id="nome">
    </div>

    <div class="form-group">
      <label>Telefone</label>
      <input v-model="aluno.telefone" type="text" maxlength="32" class="form-control" id="telefone" placeholder="(67) 99123 5678">
    </div>
    <button type="submit" class="btn btn-success">Cadastrar!</button>
  </form>
  </div>
</template>

<script>
import Alunos from '@/services/alunos'

export default {
  name: 'CadastroAluno',
  data() {
    return {
      aluno: []
    }
  },
  methods: {
    cadastrarAluno: function (event) {
      event.preventDefault();
      Alunos.salvar(this.aluno)
            .then(response => console.log(response))
      this.$router.push('/gerenciarAlunos')
    },
  }
}
</script>

<style scoped>

input {
  width: 400px;
  display: inline-block;
  margin-left: 10px;
}

label {
  display: inline-block;
  width: 140px;
  text-align: right;
}

button {
  margin-top: 25px;
}

</style>
