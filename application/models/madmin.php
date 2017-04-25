<?php
class Madmin extends CI_model{

    function tambahSpesialisasi($data){
        $this->db->insert('tb_spesialisasi', $data);
        return TRUE;
    }

    function tambahDokter($data){
        $this->db->insert('tb_dokter', $data);
        return TRUE;
    }

    function getAllSpesialisasi(){
    	$query = $this->db->query('SELECT * FROM tb_spesialisasi');
        
        if ($query->num_rows() > 0 ){
            return $query->result();
        }
    }

    function getAllDokter(){
        $query = $this->db->query('SELECT * FROM tb_dokter');
        
        if ($query->num_rows() > 0 ){
            return $query->result();
        }
    }


    public function getlogin($u, $p){
        $this->db->where('username',$u);
        $pw = md5($p);
        $this->db->where('password',$pw);    
        $query = $this->db->get('tb_admin');
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row) {
                $sess = array('username' => $row->username, 'nama_admin' => $row->nama);
                $this->session->set_userdata($sess);
                redirect("".base_url()."admin");
            }
        }
        else
        {
            $this->session->set_flashdata('info','wrong username and password!');
            redirect("".base_url()."admin/login");
        }
    }
}