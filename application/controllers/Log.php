<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// AIDEV-GENERATED: Controller para a gestão de Logs.
class Log extends CI_Controller {

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
        // AIDEV-TODO: Implementar listagem de logs.
        $this->listar();
    }

    public function listar()
    {
        // AIDEV-TODO: Carregar dados dos logs do Model e passar para a view.
        $data['logs'] = []; // Placeholder
        $data['title'] = 'Listagem de Logs';
        $data['page_title'] = 'Logs de Acesso';
        $data['content'] = $this->load->view('log/listar', $data, TRUE);
        $this->load->view('templates/dashboard_template', $data);
    }
}
