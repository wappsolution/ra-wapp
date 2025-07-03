<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// AIDEV-GENERATED: Controller para a funcionalidade de Realidade Aumentada (AR.js)
class Ar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Carrega o helper de URL para usar site_url()
    }

    public function index()
    {
        // AIDEV-TODO: Carregar a view principal da cena AR.js
        $this->load->view('ar/index');
    }

    // AIDEV-TODO: Adicionar métodos para lidar com marcadores e vídeos dinamicamente
}
