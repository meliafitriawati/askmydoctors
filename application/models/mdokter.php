<?php
class Mdokter extends CI_model{

    function getAllDokter(){
    	$query = $this->db->query('SELECT * FROM view_dokter');
        
        if ($query->num_rows() > 0 ){
            return $query->result();
        }
    }

    function getDetailDokter($username){
    	$query = $this->db->query('SELECT * FROM view_dokter WHERE username="'.$username.'"');
    	if ($query->num_rows() == 1 ){
            return $query->result();
        }
    }
}