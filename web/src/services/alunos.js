import { http } from './config'

export default {
  listar:() => {
    const url = '/alunos'
    return http.get(url)
  },

  salvar: (aluno) => {
    const url = '/alunos'
    return http
          .post(
            url,
            {
              cpf: aluno.cpf,
              rg: aluno.rg,
              data_nascimento: aluno.data_nascimento,
              nome: aluno.nome,
              telefone: aluno.telefone
            })
          .then(response => { console.log(response) })
  },

  atualizar: (aluno) => {
    const url = `/api/aluno/${aluno.id}`;
    return http
          .put(
            url,
            {
              cpf: aluno.cpf,
              rg: aluno.rg,
              data_nascimento: aluno.data_nascimento,
              nome: aluno.nome,
              telefone: aluno.telefone
            })
            .then(response => console.log(response));
  },

  deletar: (aluno) => {
    return http.delete(`/alunos/${aluno.id}`)
  }
}
