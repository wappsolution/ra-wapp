<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// AIDEV-GENERATED: Controller para a gestão de Equipamentos.
class Equipamento extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Carrega o helper de URL
        $this->load->helper('form'); // Carrega o helper de formulário
        $this->load->library('form_validation'); // Carrega a biblioteca de validação de formulários
        $this->load->library('session'); // Carrega a biblioteca de sessão

        // AIDEV-NOTE: Verifica se o usuário está logado antes de acessar qualquer método, exceto se for uma rota pública.
        if (!$this->session->userdata('logged_in')) {
            redirect('admin/login');
        }
    }

    public function index()
    {
        // AIDEV-TODO: Implementar listagem de equipamentos.
        $this->listar();
    }

    public function listar()
    {
        // AIDEV-TODO: Carregar dados dos equipamentos do Model e passar para a view.
        $data['equipamentos'] = []; // Placeholder
        $data['title'] = 'Listagem de Equipamentos';
        $data['page_title'] = 'Equipamentos';
        $data['content'] = $this->load->view('equipamento/listar', $data, TRUE);
        $this->load->view('templates/dashboard_template', $data);
    }

    public function inserir()
    {
        // AIDEV-TODO: Implementar lógica para inserir novo equipamento.
        $this->load->view('equipamento/inserir');
    }

    public function editar($id = NULL)
    {
        // AIDEV-TODO: Implementar lógica para editar equipamento existente.
        $data['equipamento'] = []; // Placeholder
        $this->load->view('equipamento/editar', $data);
    }

    public function visualizar($id = NULL)
    {
        // AIDEV-TODO: Implementar lógica para visualizar detalhes do equipamento.
        $data['equipamento'] = []; // Placeholder
        $this->load->view('equipamento/visualizar', $data);
    }

    public function excluir($id = NULL)
    {
        // AIDEV-TODO: Implementar lógica para excluir equipamento.
        // Após exclusão, redirecionar para a listagem.
        redirect('equipamento/listar');
    }
}
