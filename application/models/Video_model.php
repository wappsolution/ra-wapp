<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// AIDEV-GENERATED: Model para a tabela 'videos'.
class Video_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_videos()
    {
        $query = $this->db->get('videos');
        return $query->result_array();
    }

    public function get_video($id)
    {
        $query = $this->db->get_where('videos', array('id' => $id));
        return $query->row_array();
    }

    public function insert_video($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $this->db->insert('videos', $data);
    }

    public function update_video($id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        return $this->db->update('videos', $data);
    }

    public function delete_video($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('videos');
    }
}
