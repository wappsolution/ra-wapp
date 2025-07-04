<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// AIDEV-GENERATED: Controller para a gestão de Vídeos.
class Video extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Video_model'); // AIDEV-GENERATED: Carrega o Model de Vídeos

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
        $data['videos'] = $this->Video_model->get_videos(); // AIDEV-GENERATED: Carrega vídeos do Model
        $data['title'] = 'Listagem de Vídeos';
        $data['page_title'] = 'Vídeos';
        $data['content'] = $this->load->view('video/listar', $data, TRUE);
        $this->load->view('templates/dashboard_template', $data);
    }

    public function inserir()
    {
        $this->form_validation->set_rules('titulo', 'Título', 'required|min_length[3]|max_length[255]');
        $this->form_validation->set_rules('url', 'URL', 'valid_url');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Inserir Vídeo';
            $data['page_title'] = 'Inserir Vídeo';
            $data['content'] = $this->load->view('video/inserir', '', TRUE);
            $this->load->view('templates/dashboard_template', $data);
        } else {
            $novo_video = [
                'titulo' => $this->input->post('titulo'),
                'url' => $this->input->post('url'),
                'caminho_local' => NULL // AIDEV-TODO: Implementar upload de arquivo
            ];
            if ($this->Video_model->insert_video($novo_video)) {
                $this->session->set_flashdata('success_message', 'Vídeo "' . $novo_video['titulo'] . '" inserido com sucesso.');
            } else {
                $this->session->set_flashdata('error_message', 'Erro ao inserir vídeo.');
            }
            redirect('video/listar');
        }
    }

    public function editar($id = NULL)
    {
        $video = $this->Video_model->get_video($id);

        if ($id === NULL || empty($video)) {
            $data['video'] = NULL;
        } else {
            $data['video'] = $video;
        }

        $this->form_validation->set_rules('titulo', 'Título', 'required|min_length[3]|max_length[255]');
        $this->form_validation->set_rules('url', 'URL', 'valid_url');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Editar Vídeo';
            $data['page_title'] = 'Editar Vídeo';
            $data['content'] = $this->load->view('video/editar', $data, TRUE);
            $this->load->view('templates/dashboard_template', $data);
        } else {
            $video_atualizado = [
                'titulo' => $this->input->post('titulo'),
                'url' => $this->input->post('url'),
                'caminho_local' => NULL // AIDEV-TODO: Implementar upload de arquivo
            ];
            if ($this->Video_model->update_video($id, $video_atualizado)) {
                $this->session->set_flashdata('success_message', 'Vídeo "' . $video_atualizado['titulo'] . '" atualizado com sucesso.');
            } else {
                $this->session->set_flashdata('error_message', 'Erro ao atualizar vídeo.');
            }
            redirect('video/listar');
        }
    }

    public function visualizar($id = NULL)
    {
        $video = $this->Video_model->get_video($id);

        if ($id === NULL || empty($video)) {
            $data['video'] = NULL;
        } else {
            $data['video'] = $video;
        }

        $data['title'] = 'Visualizar Vídeo';
        $data['page_title'] = 'Visualizar Vídeo';
        $data['content'] = $this->load->view('video/visualizar', $data, TRUE);
        $this->load->view('templates/dashboard_template', $data);
    }

    public function excluir($id = NULL)
    {
        if ($id === NULL) {
            $this->session->set_flashdata('error_message', 'ID do vídeo não fornecido para exclusão.');
        } else {
            if ($this->Video_model->delete_video($id)) {
                $this->session->set_flashdata('success_message', 'Vídeo com ID ' . $id . ' excluído com sucesso.');
            } else {
                $this->session->set_flashdata('error_message', 'Erro ao excluir vídeo.');
            }
        }
        redirect('video/listar');
    }
}
