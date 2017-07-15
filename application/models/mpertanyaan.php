<?php
class Mpertanyaan extends CI_model{
	var $tb_diskusi = 'view_pertanyaan';
    
    function getPengirim($id_diskusi){
        $this->db->where('id_diskusi', $id_diskusi);
        // here we select every column of the table
        $q = $this->db->get('tb_diskusi');
        $data = $q->result_array();

        return $data[0]['pengirim'];
    }

    function getIdPertanyaan($id_notif){
        $this->db->where('id_notif', $id_notif);
        // here we select every column of the table
        $q = $this->db->get('tb_notif_diskusi');
        $data = $q->result_array();

        return $data[0]['id_pertanyaan'];
    }

    function tambahNotif($notif){
        $this->db->insert('tb_notif_diskusi', $notif);
        return TRUE;
    }

    function readNotif($id_notif){
        $this->db->set('status', 'DONE');
        $this->db->where('id_notif', $id_notif);
        $this->db->update('tb_notif_diskusi');
        return TRUE;
    }

    function getPertanyaan($id){
    	 $query = $this->db->query('SELECT * FROM view_pertanyaan WHERE id_spesialis="'.$id.'"');
        
        if ($query->num_rows() > 0 ){
            return $query->result();
        }
    }

    function getPertanyaanNew(){
        $query = $this->db->query('SELECT * FROM view_pertanyaan WHERE privasi="1" ORDER BY waktu_kirim DESC');
        
        if ($query->num_rows() > 0 ){
            return $query->result();
        }
    }

    function getPertanyaanMost(){
        $query = $this->db->query('SELECT * FROM view_pertanyaan WHERE privasi="1" ORDER BY views DESC ');
        
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

        return $insert_id;
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

    function tambahKomentarMobile($data){
        $id = $data['id_diskusi'];

        $this->db->insert('tb_komentar', $data);

        $this->db->select('*');
        $this->db->from('tb_komentar');
        $this->db->where('id_diskusi',$id);
        $query = $this->db->get();
        return $query->result_array();
    }
}