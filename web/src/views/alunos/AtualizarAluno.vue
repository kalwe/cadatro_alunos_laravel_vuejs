<template>
  <div class="atualizar-aluno">
  <form @submit="atualizarAluno" method="POST">
    <div class="form-group">
      <label>Nome</label>
      <input v-model="aluno.nome" type="text" maxlength="120" class="form-control" id="nome" placeholder="Historia">
    </div>

    <div class="form-group">
      <label>Valor da Mensalidade</label>
      <input v-model="aluno.valor_mensalidade" type="text" maxlength="12" class="form-control" id="rg" placeholder="900.00">
    </div>

    <div class="form-group">
      <label>Valor da Matrícula</label>
      <input v-model="aluno.valor_matricula" type="text" maxlength="12" class="form-control" id="valor_matricula" placeholder="1000.00">
    </div>

    <div class="form-group">
      <label>Período</label>
      <select v-model="aluno.periodo">
        <option value="matutino">Matutino</option>
        <option value="vespertino">Vespertino</option>
        <option value="noturno">Noturno</option>
      </select>
    </div>

    <div class="form-group">
      <label>Meses de Duração</label>
      <input v-model="aluno.meses_duracao" type="text" maxlength="32" class="form-control" id="meses_duracao" placeholder="3">
    </div>
    <button type="submit" class="btn btn-success">Atualizar!</button>
  </form>
  </div>
</template>

<script>
import Alunos from '@/services/alunos'

export default {
  name: 'AlunoAtualizar',
  data() {
    return {
      aluno: []
    }
  },
  created() {
    this.id = this.$route.params.id;
  },
  mounted() {
    Alunos.encontrar(this.id)
          .then(response => {
              this.aluno = response.data
              console.log(this.aluno)
          })
          .catch(err => console.log('Atualizar.vue - error: ' + err))
  },
  methods: {
    atualizarAluno: function (event) {
      event.preventDefault()
      Alunos.atualizar(this.aluno)
      this.$router.push('/gerenciarAlunos')
    }
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
