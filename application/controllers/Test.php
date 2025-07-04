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
        $this->load->database();

        if ($this->db->conn_id) {
            echo '<pre>';
            echo "Conexão com o banco de dados estabelecida com sucesso!";
            echo '</pre>';
        } else {
            echo '<pre>';
            echo "Falha na conexão com o banco de dados. Verifique as configurações em application/config/database.php.";
            echo '</pre>';
        }
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
        $this->load->library('migration');
        $this->load->database();
        $this->load->dbforge();

        echo '<pre>';
        echo "Iniciando migração...\n";

        // AIDEV-NOTE: Com migration_auto_latest = TRUE, a migração ocorre ao carregar a biblioteca.
        // Apenas verifica o status das tabelas.

        if ($this->db->table_exists('equipamentos')) {
            echo "Tabela 'equipamentos' encontrada no banco de dados.\n";
        } else {
            echo "Tabela 'equipamentos' NÃO encontrada no banco de dados após a migração.\n";
        }
        if ($this->db->table_exists('videos')) {
            echo "Tabela 'videos' encontrada no banco de dados.\n";
        } else {
            echo "Tabela 'videos' NÃO encontrada no banco de dados após a migração.\n";
        }
        echo '</pre>';
        exit;
    }
}
