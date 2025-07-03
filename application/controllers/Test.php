<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// AIDEV-GENERATED: Controller de testes inicial, baseado no GEMINI.md
class Test extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // AIDEV-GENERATED: Carrega o helper de URL para usar site_url()
    }

    public function index() {
        // AIDEV-NOTE: O menu de testes facilita a execução de rotinas de validação.
        $testes = [
            ['label' => 'Conexão com Banco de Dados', 'metodo' => 'conexaoBanco'],
            ['label' => 'Validação de Entrada JSON', 'metodo' => 'validaEntrada'],
            ['label' => 'Geração de XML Simulado', 'metodo' => 'gerarXmlTeste'],
            ['label' => 'Executar Migração do Banco', 'metodo' => 'executarMigracao']
        ];

        // AIDEV-TODO: A view 'test/menu' precisa ser criada.
        $this->load->view('test/menu', ['testes' => $testes]);
    }

    public function conexaoBanco() {
        // AIDEV-NOTE: Este método é um placeholder e precisa de um Model real para funcionar.
        // AIDEV-TODO: Substituir 'NotaFiscal_model' por um Model válido do projeto.
        $this->load->model('NotaFiscal_model');
        $dados = $this->NotaFiscal_model->getNotasRecentes();
        echo '<pre>'; 
        print_r($dados);
        exit;
    }

    public function validaEntrada() {
        // AIDEV-TODO: O arquivo 'exemplo_nfse.json' precisa ser criado em APPPATH . 'data/'.
        if (!file_exists(APPPATH . 'data/exemplo_nfse.json')) {
            echo "Arquivo de teste JSON não encontrado em application/data/exemplo_nfse.json";
            exit;
        }
        $json = file_get_contents(APPPATH . 'data/exemplo_nfse.json');
        $dados = json_decode($json, true);
        echo '<pre>'; 
        print_r($dados);
        exit;
    }

    public function gerarXmlTeste() {
        // AIDEV-TODO: A library 'nfse' precisa ser criada.
        $this->load->library('nfse');
        $xml = $this->nfse->gerarXmlSimulado();
        echo htmlspecialchars($xml);
        exit;
    }

    public function executarMigracao() {
        // AIDEV-TODO: O model 'Migracao_model' precisa ser criado.
        $this->load->model('Migracao_model');
        $resultado = $this->Migracao_model->executar();
        echo '<pre>'; 
        print_r($resultado);
        exit;
    }
}
