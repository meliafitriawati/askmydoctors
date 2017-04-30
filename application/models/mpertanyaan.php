<?php
class Mpertanyaan extends CI_model{
	var $tb_diskusi = 'view_pertanyaan';
    
    function getPertanyaan($id){
    	 $query = $this->db->query('SELECT * FROM view_pertanyaan WHERE id_spesialis="'.$id.'"');
        
        if ($query->num_rows() > 0 ){
            return $query->result();
        }
    }

    function getDetailPertanyaan($id){
    	$query = $this->db->query('SELECT * FROM view_pertanyaan WHERE id_diskusi="'.$id.'"');
    	if ($query->num_rows() == 1 ){
            return $query->result();
        }
    }

    function getKomentar($id){
        $this->db->select('*');
        $this->db->from('tb_komentar');
        $this->db->where('id_diskusi',$id);
        return $this->db->get(); 
    }

    function getKomentarP($id){
        $this->db->select('*');
        $this->db->from('tb_komentar');
        $this->db->where('id_diskusi',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function tambahPertanyaan($data){
        $this->db->insert('tb_diskusi', $data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }

    function tambahKomentar($data){
        $this->db->insert('tb_komentar', $data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }

    function tambahView($id){
        $this->db->set('views', 'views+1', FALSE);
        $this->db->where('id_diskusi',$id);
        $this->db->update('tb_diskusi');

        return TRUE;
    }

    function deleteKomentar($id){
        $this->db->where('id_komentar', $id);
        $this->db->delete('tb_komentar');
    }
}