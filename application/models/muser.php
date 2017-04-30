<?php
class Muser extends CI_model{
	public function getlogin($u, $p, $user){
		if ($user == "dokter") {
			$this->db->where('username',$u);
	        $pw = md5($p);
	        $this->db->where('password',$pw);    
	        $query = $this->db->get('tb_dokter');
	        if($query->num_rows()>0)
	        {
	            foreach ($query->result() as $row) {
	                $sess = array('username' => $row->username, 'nama_dokter' => $row->fullname, 'hak_akses' => $row->hak_akses);
	                $this->session->set_userdata($sess);
	                redirect("".base_url()."home");
	            }
	        }
	        else
	        {
	            $this->session->set_flashdata('info','wrong username and password!');
	            redirect("".base_url()."login/dokter");
	        }
		}elseif ($user == "pasien") {
			$this->db->where('email',$u);
	        $pw = md5($p);
	        $this->db->where('password',$pw);

	        $query = $this->db->get('tb_user');
	        if($query->num_rows()>0)
	        {
	            foreach ($query->result() as $row) {
	                $sess = array('username' => $row->username, 'nama_pengguna' => $row->fullname, 'hak_akses' => $row->hak_akses);
	                $this->session->set_userdata($sess);
	                redirect("".base_url()."home");
	            }
	        }
	        else
	        {
	            $this->session->set_flashdata('info','wrong username and password!');
	            redirect("".base_url()."login");
	        }
		}
        
    }

    public function get_user($email, $password){
        $this->db->from('tb_user');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_dokter($username, $password){
    	$this->db->from('tb_dokter');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get();
        return $query->row_array();
    }
}
