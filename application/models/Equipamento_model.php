<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// AIDEV-GENERATED: Model para a tabela 'equipamentos'.
class Equipamento_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_equipamentos()
    {
        $query = $this->db->get('equipamentos');
        return $query->result_array();
    }

    public function get_equipamento($id)
    {
        $query = $this->db->get_where('equipamentos', array('id' => $id));
        return $query->row_array();
    }

    public function insert_equipamento($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $this->db->insert('equipamentos', $data);
    }

    public function update_equipamento($id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        return $this->db->update('equipamentos', $data);
    }

    public function delete_equipamento($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('equipamentos');
    }
}
