<?php
defined('BASEPATH') or exit('No direct script access allowed');
class m_upload extends CI_Model
{
    function upload($data)
    {
        $this->db->insert('file', $data);
    }
}
