<?php
class Mchat extends CI_model{

	function getChatbyPengirim($username){
        $query = $this->db->query('SELECT * FROM tb_chat_masuk WHERE pengirim="'.$username.'"');
        
        if ($query->num_rows() > 0 ){
            return $query->result();
        }
    }

    function getChatbyPenerima($username){
        $query = $this->db->query('SELECT * FROM tb_chat_masuk WHERE penerima="'.$username.'"');
        
        if ($query->num_rows() > 0 ){
            return $query->result();
        }
    }

    function cekUser($data){
    	$this->db->select('*');
		$this->db->from('tb_chat_masuk');
		$this->db->where('pengirim',$data['pengirim']);
		$this->db->where('penerima',$data['penerima']);
		$query = $this->db->get();

		if ($query->num_rows() == 1 ){
			return FALSE;
        }else{
        	$this->db->insert('tb_chat_masuk', $data);
	        $insert_id = $this->db->insert_id();

	        return TRUE;
        }

    }

}