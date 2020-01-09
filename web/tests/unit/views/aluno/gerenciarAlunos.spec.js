import { shallowMount } from '@vue/test-utils'
import GerenciarAlunos from '@/views/alunos/GerenciarAlunos.vue'

describe("GerenciarAlunos.vue", () => {
  const wrapper = shallowMount(GerenciarAlunos)
  it("deve conter um grid com h1, table, thead, seis th e um tbody", () => {
    const h1Grid = wrapper.findAll('h1').at(0)
    const tableGrid = wrapper.findAll('table')
    const theadGrid = wrapper.findAll('thead')
    const thIdGrid = wrapper.findAll('th').at(0)
    const thCpfGrid = wrapper.findAll('th').at(1)
    const thRgGrid = wrapper.findAll('th').at(2)
    const thDataNascimentoGrid = wrapper.findAll('th').at(3)
    const thNomeGrid = wrapper.findAll('th').at(4)
    const thTelefoneGrid = wrapper.findAll('th').at(5)
    const tbodyGrid = wrapper.findAll('tbody')

    expect(h1Grid.element.textContent).toBe('Alunos')
    expect(tableGrid.exists()).toBe(true)
    expect(theadGrid.exists()).toBe(true)
    expect(thIdGrid.element.textContent).toBe('#')
    expect(thCpfGrid.element.textContent).toBe('CPF')
    expect(thRgGrid.element.textContent).toBe('RG')
    expect(thDataNascimentoGrid.element.textContent).toBe('Data de Nascimento')
    expect(thNomeGrid.element.textContent).toBe('Nome')
    expect(thTelefoneGrid.element.textContent).toBe('Telefone')
    expect(tbodyGrid.exists()).toBe(true)
  })

  it("deve conter uma row com td e botoes para editar e excluir", () => {
    const trGridRow = wrapper.findAll('tr')

    expect(trGridRow.exists()).toBe(true)
  })
})
