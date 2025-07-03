<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// AIDEV-GENERATED: Controller para a área administrativa, incluindo login.
class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session'); // AIDEV-GENERATED: Carrega a biblioteca de sessão
    }

    public function login()
    {
        $data['username'] = '';
        $data['password'] = '';
        $data['submitted_data'] = NULL;

        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // AIDEV-NOTE: Simulação de autenticação. Em produção, usar verificação de banco de dados.
            if ($username === 'admin' && $password === 'password') {
                $this->session->set_userdata('logged_in', TRUE);
                $this->session->set_userdata('username', $username);
                redirect('admin/dashboard');
            } else {
                $data['error_message'] = 'Usuário ou senha inválidos.';
            }
            $data['submitted_data'] = $this->input->post();
        }

        $this->load->view('admin/login', $data);
    }

    public function dashboard()
    {
        // AIDEV-GENERATED: Verifica se o usuário está logado.
        if (!$this->session->userdata('logged_in')) {
            redirect('admin/login');
        }
        $data['title'] = 'Dashboard - AR Conector';
        $data['page_title'] = 'Dashboard';
        $data['content'] = $this->load->view('admin/dashboard', '', TRUE);
        $this->load->view('templates/dashboard_template', $data);
    }

    public function logout()
    {
        // AIDEV-GENERATED: Destrói a sessão e redireciona para a tela de login.
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}
