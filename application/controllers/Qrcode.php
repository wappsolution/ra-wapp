<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// AIDEV-GENERATED: Controller para a gestão de QR Codes.
class Qrcode extends CI_Controller {

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
        // AIDEV-TODO: Implementar listagem de QR Codes.
        $this->listar();
    }

    public function listar()
    {
        // AIDEV-TODO: Carregar dados dos QR Codes do Model e passar para a view.
        $data['qrcodes'] = []; // Placeholder
        $data['title'] = 'Listagem de QR Codes';
        $data['page_title'] = 'QR Codes';
        $data['content'] = $this->load->view('qrcode/listar', $data, TRUE);
        $this->load->view('templates/dashboard_template', $data);
    }

    public function gerar()
    {
        // AIDEV-TODO: Implementar lógica para gerar novo QR Code.
        $data['title'] = 'Gerar QR Code';
        $data['page_title'] = 'Gerar QR Code';
        $data['content'] = $this->load->view('qrcode/gerar', '', TRUE);
        $this->load->view('templates/dashboard_template', $data);
    }

    public function visualizar($id = NULL)
    {
        // AIDEV-TODO: Implementar lógica para visualizar detalhes do QR Code.
        $data['qrcode'] = []; // Placeholder
        $data['title'] = 'Visualizar QR Code';
        $data['page_title'] = 'Visualizar QR Code';
        $data['content'] = $this->load->view('qrcode/visualizar', $data, TRUE);
        $this->load->view('templates/dashboard_template', $data);
    }
}
