<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// AIDEV-GENERATED: Model para a tabela 'qrcodes'.
class Qrcode_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_qrcodes()
    {
        $query = $this->db->get('qrcodes');
        return $query->result_array();
    }

    public function get_qrcode($id)
    {
        $query = $this->db->get_where('qrcodes', array('id' => $id));
        return $query->row_array();
    }

    public function insert_qrcode($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $this->db->insert('qrcodes', $data);
    }

    public function update_qrcode($id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        return $this->db->update('qrcodes', $data);
    }

    public function delete_qrcode($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('qrcodes');
    }
}
