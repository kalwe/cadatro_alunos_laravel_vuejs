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
  // {
  //   path: '/gerenciarCursos',
  //   name: 'gerenciarCursos',
  //   component: () => import('../views/cursos/GerenciarCursos.vue')
  // },
  //   {
  //     path: '/cursos/cadastro',
  //     name: 'cursoCadastro',
  //     component: () => import('../views/alunos/CadastroCurso.vue')
  //   },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
