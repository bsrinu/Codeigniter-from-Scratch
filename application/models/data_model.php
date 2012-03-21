<?php
/**
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 * @property CI_Config $config
 * @property CI_Loader $load
 * @property CI_Session $session
 *
 * Add addtional libraries you wish
 * to use in your models here.
 * 
 */
class Data_model extends CI_Model {
    
    /*  function getAll()
    {
        $q = $this->db->get('data');
        if ($q->num_rows() > 0) {
            foreach($q->result() as $row) {
                $data[] = $row;
            }
            
            return $data;
        }
    } */
    
    /*function getAll() {
        $this->db->select('title, contents');
        $q = $this->db->get('data');
        if ($q->num_rows() > 0) {
            foreach($q->result() as $row) {
                $data[] = $row;
            }
            
            return $data;
        }
    }*/

    /*function getAll() {
        $sql = "SELECT title, author, contents FROM data WHERE author = ?";
        $q = $this->db->query($sql, "Amitava Das Gupta");

        if ($q->num_rows() > 0) {
            foreach($q->result() as $row) {
                $data[] = $row;
            }
            
            return $data;
        }
    }*/

    function getAll() {
        $this->db->select('title, author, contents');
        $this->db->from('data');
        $this->db->where('id', 4);

        $q = $this->db->get();

        if ($q->num_rows() > 0) {
            foreach($q->result() as $row) {
                $data[] = $row;
            }
            
            return $data;
        }
    }
}