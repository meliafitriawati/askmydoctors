<?php
class Martikel extends CI_model{
    protected $table       = 'tb_artikel'; 
    protected $primary_key = 'id';

    function tambahArtikel($data){
        $this->db->insert('tb_artikel', $data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }

    public function get_all($limit, $page)
    {       
        $offset = ($page - 1) * $limit;
        $query  = $this->db->limit($limit, $offset)->get($this->table);
        return $query->result();
    }
    public function get_total()
    {
        return $this->db->count_all($this->table);
    }

    function getArtikel(){
        $query = $this->db->query('SELECT * FROM tb_artikel');
        
        if ($query->num_rows() > 0 ){
            return $query->result();
        }
    }

    function getArtikelbyUname($username){
        $query = $this->db->query('SELECT * FROM tb_artikel WHERE publisher="'.$username.'"');
        
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

    function updateArtikel($data, $id){
        $this->db->where('id_artikel', $id);
        $this->db->update('tb_artikel', $data);
        return true;
    }

    function deleteArtikel($id){
        $sql = "DELETE FROM tb_artikel WHERE id_artikel='$id'";
        $query = $this->db->query($sql);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function getNotifUser(){
        $query = $this->db->query('SELECT * FROM tb_artikel WHERE status="TERJAWAB"');
        if ($query->num_rows() == 1 ){
            return $query->result();
        }
    }

    
}