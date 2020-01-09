import { http } from './config'

export default {
  listar:() => {
    const url = '/cursos'
    return http.get(url)
  },

  salvar: (curso) => {
    const url = '/cursos'
    return http
          .post(
            url,
            {
              nome: curso.nome,
              valor_mensalidade: curso.valor_mensalidade,
              valor_matricula: curso.valor_matricula,
              periodo: curso.periodo,
              meses_duracao: curso.meses_duracao
            })
          .then(response => { console.log(response) })
  },

  encontrar: (id) => {
    const url = `/cursos/${id}`
    return http.get(url)
  },

  atualizar: (curso) => {
    const url = `/cursos/${curso.id}`
    return http
          .put(
            url,
            {
              nome: curso.nome,
              valor_mensalidade: curso.valor_mensalidade,
              valor_matricula: curso.valor_matricula,
              periodo: curso.periodo,
              meses_duracao: curso.meses_duracao
            })
            .then(response => console.log(response));
  },

  deletar: (curso) => {
    const url = `/cursos/${curso.id}`
    console.log(url)

    return http.delete(url)
  }
}
