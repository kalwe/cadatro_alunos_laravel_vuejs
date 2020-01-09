<template>
  <div class="cadastro-curso">
  <form @submit="cadastrarCurso" method="POST">
    <div class="form-group">
      <label>Nome</label>
      <input v-model="curso.nome" type="text" maxlength="120" class="form-control" id="nome" placeholder="Historia">
    </div>

    <div class="form-group">
      <label>Valor da Mensalidade</label>
      <input v-model="curso.valor_mensalidade" type="text" maxlength="12" class="form-control" id="rg" placeholder="900.00">
    </div>

    <div class="form-group">
      <label>Valor da Matrícula</label>
      <input v-model="curso.valor_matricula" type="text" maxlength="12" class="form-control" id="valor_matricula" placeholder="1000.00">
    </div>

    <div class="form-group">
      <label>Período</label>
      <select v-model="curso.periodo">
        <option value="1">Matutino</option>
        <option value="2">Vespertino</option>
        <option value="3">Noturno</option>
      </select>
    </div>

    <div class="form-group">
      <label>Meses de Duração</label>
      <input v-model="curso.meses_duracao" type="text" maxlength="32" class="form-control" id="meses_duracao" placeholder="3">
    </div>
    <button type="submit" class="btn btn-success">Cadastrar!</button>
  </form>
  </div>
</template>

<script>
import Cursos from '@/services/cursos'

export default {
  name: 'CadastroCurso',
  data() {
    return {
      curso: []
    }
  },
  methods: {
    cadastrarCurso: function (event) {
      event.preventDefault();
      Cursos.salvar(this.curso)
            .then(response => console.log(response))
      this.$router.push('/gerenciarCursos')
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
