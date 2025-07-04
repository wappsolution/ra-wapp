<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_qrcodes_table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'equipamento_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'null' => TRUE,
            ),
            'video_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'null' => TRUE,
            ),
            'codigo_qr' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'unique' => TRUE,
            ),
            'caminho_imagem' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('qrcodes');

        // AIDEV-TODO: Adicionar foreign keys após a criação das tabelas de equipamentos e vídeos
        // $this->dbforge->add_foreign_key('equipamento_id', 'equipamentos', 'id', 'CASCADE', 'CASCADE');
        // $this->dbforge->add_foreign_key('video_id', 'videos', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dbforge->drop_table('qrcodes');
    }
}
