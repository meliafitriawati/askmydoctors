<?php
class Martikel extends CI_model{


    function tambahArtikel($data){
        $this->db->insert('tb_artikel', $data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }

    function getArtikel(){
        $query = $this->db->query('SELECT * FROM tb_artikel');
        
        if ($query->num_rows() > 0 ){
            return $query->result();
        }
    }

    function getDetailArtikel($id){
        $query = $this->db->query('SELECT * FROM tb_artikel WHERE id_artikel="'.$id.'"');
        if ($query->num_rows() == 1 ){
            return $query->result();
        }
    }

    function tambahView($id){
        $this->db->set('view', 'view+1', FALSE);
        $this->db->where('id_artikel',$id);
        $this->db->update('tb_artikel');

        return TRUE;
    }
}