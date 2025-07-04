<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// AIDEV-GENERATED: Controller para a gestão de Equipamentos.
class Equipamento extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Equipamento_model'); // AIDEV-GENERATED: Carrega o Model de Equipamentos

        if (!$this->session->userdata('logged_in')) {
            redirect('admin/login');
        }
    }

    public function index()
    {
        $this->listar();
    }

    public function listar()
    {
        $data['equipamentos'] = $this->Equipamento_model->get_equipamentos(); // AIDEV-GENERATED: Carrega equipamentos do Model
        $data['title'] = 'Listagem de Equipamentos';
        $data['page_title'] = 'Equipamentos';
        $data['content'] = $this->load->view('equipamento/listar', $data, TRUE);
        $this->load->view('templates/dashboard_template', $data);
    }

    public function inserir()
    {
        $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('localizacao', 'Localização', 'required|min_length[3]|max_length[255]');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Inserir Equipamento';
            $data['page_title'] = 'Inserir Equipamento';
            $data['content'] = $this->load->view('equipamento/inserir', '', TRUE);
            $this->load->view('templates/dashboard_template', $data);
        } else {
            $novo_equipamento = [
                'nome' => $this->input->post('nome'),
                'localizacao' => $this->input->post('localizacao')
            ];
            if ($this->Equipamento_model->insert_equipamento($novo_equipamento)) { // AIDEV-GENERATED: Salva no banco de dados
                $this->session->set_flashdata('success_message', 'Equipamento "' . $novo_equipamento['nome'] . '" inserido com sucesso.');
            } else {
                $this->session->set_flashdata('error_message', 'Erro ao inserir equipamento.');
            }
            redirect('equipamento/listar');
        }
    }

    public function editar($id = NULL)
    {
        $equipamento = $this->Equipamento_model->get_equipamento($id); // AIDEV-GENERATED: Carrega equipamento do Model

        if ($id === NULL || empty($equipamento)) {
            $data['equipamento'] = NULL;
        } else {
            $data['equipamento'] = $equipamento;
        }

        $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('localizacao', 'Localização', 'required|min_length[3]|max_length[255]');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Editar Equipamento';
            $data['page_title'] = 'Editar Equipamento';
            $data['content'] = $this->load->view('equipamento/editar', $data, TRUE);
            $this->load->view('templates/dashboard_template', $data);
        } else {
            $equipamento_atualizado = [
                'nome' => $this->input->post('nome'),
                'localizacao' => $this->input->post('localizacao')
            ];
            if ($this->Equipamento_model->update_equipamento($id, $equipamento_atualizado)) { // AIDEV-GENERATED: Atualiza no banco de dados
                $this->session->set_flashdata('success_message', 'Equipamento "' . $equipamento_atualizado['nome'] . '" atualizado com sucesso.');
            } else {
                $this->session->set_flashdata('error_message', 'Erro ao atualizar equipamento.');
            }
            redirect('equipamento/listar');
        }
    }

    public function visualizar($id = NULL)
    {
        $equipamento = $this->Equipamento_model->get_equipamento($id); // AIDEV-GENERATED: Carrega equipamento do Model

        if ($id === NULL || empty($equipamento)) {
            $data['equipamento'] = NULL;
        } else {
            $data['equipamento'] = $equipamento;
        }

        $data['title'] = 'Visualizar Equipamento';
        $data['page_title'] = 'Visualizar Equipamento';
        $data['content'] = $this->load->view('equipamento/visualizar', $data, TRUE);
        $this->load->view('templates/dashboard_template', $data);
    }

    public function excluir($id = NULL)
    {
        if ($id === NULL) {
            $this->session->set_flashdata('error_message', 'ID do equipamento não fornecido para exclusão.');
        } else {
            if ($this->Equipamento_model->delete_equipamento($id)) { // AIDEV-GENERATED: Exclui do banco de dados
                $this->session->set_flashdata('success_message', 'Equipamento com ID ' . $id . ' excluído com sucesso.');
            } else {
                $this->session->set_flashdata('error_message', 'Erro ao excluir equipamento.');
            }
        }
        redirect('equipamento/listar');
    }
}
