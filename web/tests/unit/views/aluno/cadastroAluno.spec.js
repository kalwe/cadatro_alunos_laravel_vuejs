import { mount } from '@vue/test-utils'
import CadastroAluno from '@/views/alunos/CadastroAluno.vue'

describe('CadastroAluno.vue', () => {
    const wrapper = mount(CadastroAluno)
    it("deve conter um formulario", () => {
        const form = wrapper.find('form')

        const labelCpf = wrapper.findAll('label').at(0)
        const labelRg = wrapper.findAll('label').at(1)
        const labelDataNascimento = wrapper.findAll('label').at(2)
        const labelNome = wrapper.findAll('label').at(3)
        const labelTelefone = wrapper.findAll('label').at(4)

        const inputCpf = wrapper.find('#cpf')
        const inputRg = wrapper.find('#rg')
        const inputDataNascimento = wrapper.find('#data_nascimento')
        const inputNome = wrapper.find('#nome')
        const inputTelefone = wrapper.find('#telefone')

        const buttonCadastrar = wrapper.findAll('button').at(0)

        expect(form.exists()).toBe(true)

        expect(labelCpf.element.textContent).toBe('CPF')
        expect(labelRg.element.textContent).toBe('RG')
        expect(labelDataNascimento.element.textContent).toBe('Data de Nascimento')
        expect(labelNome.element.textContent).toBe('Nome')
        expect(labelTelefone.element.textContent).toBe('Telefone')

        expect(inputCpf.is('input')).toBe(true)
        expect(inputRg.is('input')).toBe(true)
        expect(inputDataNascimento.is('input')).toBe(true)
        expect(inputNome.is('input')).toBe(true)
        expect(inputTelefone.is('input')).toBe(true)

        expect(buttonCadastrar.element.textContent).toBe('Cadastrar!')
    })
})
