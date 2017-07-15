<?php
class Mkategori extends CI_model{

    function getAllKategori(){
    	$query = $this->db->query('SELECT * FROM tb_spesialisasi ORDER BY nama_spesialisasi');
        
        if ($query->num_rows() > 0 ){
            return $query->result();
        }
    }
}