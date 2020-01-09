import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  {
    path: '/gerenciarAlunos',
    name: 'gerenciarAlunos',
    component: () => import('../views/alunos/GerenciarAlunos.vue')
  },
    {
      path: '/aluno/cadastro',
      name: 'alunoCadastro',
      component: () => import('../views/alunos/CadastroAluno.vue')
    },
    {
      path: '/aluno/atualizar/:id',
      name: 'alunoAtualizar',
      component: () => import('../views/alunos/AtualizarAluno.vue')
    },
  {
    path: '/gerenciarCursos',
    name: 'gerenciarCursos',
    component: () => import('../views/cursos/GerenciarCursos.vue')
  },
    {
      path: '/curso/cadastro',
      name: 'cursoCadastro',
      component: () => import('../views/cursos/CadastroCurso.vue')
    },
    {
      path: '/curso/atualizar/:id',
      name: 'cursoAtualizar',
      component: () => import('../views/cursos/AtualizarCurso.vue')
    },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
