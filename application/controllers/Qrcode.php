<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// AIDEV-GENERATED: Controller para a gestão de QR Codes.
class Qrcode extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Qrcode_model'); // AIDEV-GENERATED: Carrega o Model de QR Codes
        $this->load->model('Equipamento_model'); // AIDEV-GENERATED: Para associar QR Code a Equipamento
        $this->load->model('Video_model'); // AIDEV-GENERATED: Para associar QR Code a Vídeo

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
        $data['qrcodes'] = $this->Qrcode_model->get_qrcodes(); // AIDEV-GENERATED: Carrega QR Codes do Model
        $data['title'] = 'Listagem de QR Codes';
        $data['page_title'] = 'QR Codes';
        $data['content'] = $this->load->view('qrcode/listar', $data, TRUE);
        $this->load->view('templates/dashboard_template', $data);
    }

    public function gerar()
    {
        $this->form_validation->set_rules('codigo_qr', 'Código QR', 'required|is_unique[qrcodes.codigo_qr]');
        $this->form_validation->set_rules('equipamento_id', 'Equipamento', 'integer');
        $this->form_validation->set_rules('video_id', 'Vídeo', 'integer');

        if ($this->form_validation->run() === FALSE) {
            $data['equipamentos'] = $this->Equipamento_model->get_equipamentos();
            $data['videos'] = $this->Video_model->get_videos();
            $data['title'] = 'Gerar QR Code';
            $data['page_title'] = 'Gerar QR Code';
            $data['content'] = $this->load->view('qrcode/gerar', $data, TRUE);
            $this->load->view('templates/dashboard_template', $data);
        } else {
            $novo_qrcode = [
                'codigo_qr' => $this->input->post('codigo_qr'),
                'equipamento_id' => $this->input->post('equipamento_id') ? $this->input->post('equipamento_id') : NULL,
                'video_id' => $this->input->post('video_id') ? $this->input->post('video_id') : NULL,
                'caminho_imagem' => 'public/assets/qrcodes/' . $this->input->post('codigo_qr') . '.png' // AIDEV-TODO: Gerar imagem real do QR Code
            ];

            if ($this->Qrcode_model->insert_qrcode($novo_qrcode)) {
                $this->session->set_flashdata('success_message', 'QR Code "' . $novo_qrcode['codigo_qr'] . '" gerado e salvo com sucesso.');
            } else {
                $this->session->set_flashdata('error_message', 'Erro ao gerar e salvar QR Code.');
            }
            redirect('qrcode/listar');
        }
    }

    public function visualizar($id = NULL)
    {
        $qrcode = $this->Qrcode_model->get_qrcode($id);

        if ($id === NULL || empty($qrcode)) {
            $data['qrcode'] = NULL;
        } else {
            $data['qrcode'] = $qrcode;
            // AIDEV-TODO: Carregar dados do equipamento e vídeo associados
            if ($qrcode['equipamento_id']) {
                $data['equipamento_associado'] = $this->Equipamento_model->get_equipamento($qrcode['equipamento_id']);
            }
            if ($qrcode['video_id']) {
                $data['video_associado'] = $this->Video_model->get_video($qrcode['video_id']);
            }
        }

        $data['title'] = 'Visualizar QR Code';
        $data['page_title'] = 'Visualizar QR Code';
        $data['content'] = $this->load->view('qrcode/visualizar', $data, TRUE);
        $this->load->view('templates/dashboard_template', $data);
    }

    public function excluir($id = NULL)
    {
        if ($id === NULL) {
            $this->session->set_flashdata('error_message', 'ID do QR Code não fornecido para exclusão.');
        } else {
            if ($this->Qrcode_model->delete_qrcode($id)) {
                // AIDEV-TODO: Excluir arquivo de imagem do QR Code se existir
                $this->session->set_flashdata('success_message', 'QR Code com ID ' . $id . ' excluído com sucesso.');
            } else {
                $this->session->set_flashdata('error_message', 'Erro ao excluir QR Code.');
            }
        }
        redirect('qrcode/listar');
    }
}
