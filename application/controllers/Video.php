<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// AIDEV-GENERATED: Controller para a gestão de Vídeos.
class Video extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Carrega o helper de URL
        $this->load->helper('form'); // Carrega o helper de formulário
        $this->load->library('form_validation'); // Carrega a biblioteca de validação de formulários
        $this->load->library('session'); // Carrega a biblioteca de sessão

        // AIDEV-NOTE: Verifica se o usuário está logado antes de acessar qualquer método.
        if (!$this->session->userdata('logged_in')) {
            redirect('admin/login');
        }
    }

    public function index()
    {
        // AIDEV-TODO: Implementar listagem de vídeos.
        $this->listar();
    }

    public function listar()
    {
        // AIDEV-TODO: Carregar dados dos vídeos do Model e passar para a view.
        $data['videos'] = []; // Placeholder
        $data['title'] = 'Listagem de Vídeos';
        $data['page_title'] = 'Vídeos';
        $data['content'] = $this->load->view('video/listar', $data, TRUE);
        $this->load->view('templates/dashboard_template', $data);
    }

    public function inserir()
    {
        // AIDEV-TODO: Implementar lógica para inserir novo vídeo (upload local e link externo).
        $data['title'] = 'Inserir Vídeo';
        $data['page_title'] = 'Inserir Vídeo';
        $data['content'] = $this->load->view('video/inserir', '', TRUE);
        $this->load->view('templates/dashboard_template', $data);
    }

    public function editar($id = NULL)
    {
        // AIDEV-TODO: Implementar lógica para editar vídeo existente.
        $data['video'] = []; // Placeholder
        $data['title'] = 'Editar Vídeo';
        $data['page_title'] = 'Editar Vídeo';
        $data['content'] = $this->load->view('video/editar', $data, TRUE);
        $this->load->view('templates/dashboard_template', $data);
    }

    public function visualizar($id = NULL)
    {
        // AIDEV-TODO: Implementar lógica para visualizar detalhes do vídeo.
        $data['video'] = []; // Placeholder
        $data['title'] = 'Visualizar Vídeo';
        $data['page_title'] = 'Visualizar Vídeo';
        $data['content'] = $this->load->view('video/visualizar', $data, TRUE);
        $this->load->view('templates/dashboard_template', $data);
    }

    public function excluir($id = NULL)
    {
        // AIDEV-TODO: Implementar lógica para excluir vídeo.
        // Após exclusão, redirecionar para a listagem.
        redirect('video/listar');
    }
}
