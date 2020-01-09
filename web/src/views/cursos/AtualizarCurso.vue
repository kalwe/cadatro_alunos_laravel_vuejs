<template>
  <div class="atualizar-curso">
  <form @submit="atualizarCurso" method="POST">
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
        <option value="matutino">Matutino</option>
        <option value="vespertino">Vespertino</option>
        <option value="noturno">Noturno</option>
      </select>
    </div>

    <div class="form-group">
      <label>Meses de Duração</label>
      <input v-model="curso.meses_duracao" type="text" maxlength="32" class="form-control" id="meses_duracao" placeholder="3">
    </div>
    <button type="submit" class="btn btn-success">Atualizar!</button>
  </form>
  </div>
</template>

<script>
import Cursos from '@/services/cursos'

export default {
  name: 'CursoAtualizar',
  data() {
    return {
      curso: []
    }
  },
  created() {
    this.id = this.$route.params.id;
  },
  mounted() {
    Cursos.encontrar(this.id)
          .then(response => {
              this.curso = response.data
              console.log(this.curso)
          })
          .catch(err => console.log('Atualizar.vue - error: ' + err))
  },
  methods: {
    atualizarCurso: function (event) {
      event.preventDefault()
      Cursos.atualizar(this.curso)
      this.$router.push('/gerenciarCursos')
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
