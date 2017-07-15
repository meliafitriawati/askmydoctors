<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('martikel');	
        $this->load->model('mdokter');
    }

    public function index($page = 1){
        //hitung total data
        $total = $this->martikel->get_total();
        //ambil data
        $limit  = 5; //menentukan limit/jumlah data yang akan ditampilkan per page
        $result = $this->martikel->get_all($limit, $page);
        //menentukan url pagination
        $url = site_url('artikel/index');
        //load library pagination
        $this->load->library('pagination');
        //config library pagination dengan style twitter bootstrap css
        $config['base_url']         = $url;
        $config['total_rows']       = $total;
        $config['per_page']         = $limit;
        $config['use_page_numbers'] = true;
        $config['num_links']        = 5;
        $config['full_tag_open']    = '<ul class="pagination">';
        $config['full_tag_close']   = '</ul>';
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['first_tag_open']   = '<li>';
        $config['first_tag_close']  = '</li>';
        $config['prev_link']        = '&laquo';
        $config['prev_tag_open']    = '<li class="prev">';
        $config['prev_tag_close']   = '</li>';
        $config['next_link']        = '&raquo';
        $config['next_tag_open']    = '<li>';
        $config['next_tag_close']   = '</li>';
        $config['last_tag_open']    = '<li>';
        $config['last_tag_close']   = '</li>';
        $config['cur_tag_open']     = '<li class="active"><a href="">';
        $config['cur_tag_close']    = '</a></li>';
        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';
        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links();
        //menyiapkan data untuk dikirim ke view
       
        $data['hasil']     = $result;
        $data['pagination'] = $pagination;
		$data['artikel'] = $this->martikel->getArtikel();
		$this->load->view('user/artikel', $data);


    }

 	// public function index()
	// {
	// 	$data['artikel'] = $this->martikel->getArtikel();
	// 	$this->load->view('user/artikel', $data);
	// }

	public function tambah()
	{
		$this->load->view('user/tambah_artikel');
	}

	public function in(){
		$this->load->library('upload');

		$judul = $this->input->post('judul');
		$artikel = $this->input->post('news_detail');
		$tumb = $this->input->post('tumb');
		$waktu = date('Y-m-d H:i:s');
		$publisher = $this->session->userdata('username');
		$kode_publisher = 2;

		$config['upload_path'] = './assets/img/artikel/';
		$config['allowed_types'] = 'gif|jpg|png';

	    $this->upload->initialize($config);

    	if (!$this->upload->do_upload('foto_artikel')) {
			echo "ERROR";
		} else {
      		$img = $this->upload->data();
      		$file_name = $img['file_name'];
      		
      		$data = array('judul' => $judul, 'artikel' => $artikel, 'artikel_tumb' => $tumb,'tgl_publish'=>$waktu, 'publisher'=>$publisher, 'img_tumb'=>$file_name,'kode_publisher'=>$kode_publisher);

			$return = $this->martikel->tambahArtikel($data);
			redirect("".base_url()."artikel/detail/".$return."");
    
		}

		
	}

	public function detail($id)
	{
		$data['id'] = $id;
		$data['artikel'] = $this->martikel->getArtikel();
		$data['detail'] = $this->martikel->getDetailArtikel($id);
		$this->load->view('user/detail_artikel',$data);
	}

	public function edit($id)
	{
		$data['id'] = $id;
		$data['detail'] = $this->martikel->getDetailArtikel($id);
		$this->load->view('user/edit_artikel', $data);
	}

	public function delete($id, $username)
	{
		$data['id'] = $id;
		$return = $this->martikel->deleteArtikel($id);
		if ($return) {
			redirect("".base_url()."dokter/profil/".$username."");
		}

	}

	public function updateArtikel($id)
	{
		$this->load->library('upload');

		$judul = $this->input->post('judul');
		$artikel = $this->input->post('news_detail');
		$tumb = $this->input->post('tumb');
		$waktu = date('Y-m-d H:i:s');
		$publisher = $this->session->userdata('username');
		$kode_publisher = 2;

		$config['upload_path'] = './assets/img/artikel/';
		$config['allowed_types'] = 'gif|jpg|png';

	    $this->upload->initialize($config);

    	if (!$this->upload->do_upload('foto_artikel')) {
    		$data = array('judul' => $judul, 'artikel' => $artikel, 'artikel_tumb' => $tumb,'tgl_publish'=>$waktu, 'publisher'=>$publisher,'kode_publisher'=>$kode_publisher);

			$return = $this->martikel->updateArtikel($data, $id);
			redirect("".base_url()."artikel/detail/".$id."");
		} else {
      		$img = $this->upload->data();
      		$file_name = $img['file_name'];
      		
      		$data = array('judul' => $judul, 'artikel' => $artikel, 'artikel_tumb' => $tumb,'tgl_publish'=>$waktu, 'publisher'=>$publisher, 'img_tumb'=>$file_name,'kode_publisher'=>$kode_publisher);

			$return = $this->martikel->updateArtikel($data, $id);
			redirect("".base_url()."artikel/detail/".$id."");
		}
	}

	public function m($id){
		$data['detail'] = $this->martikel->getDetailArtikel($id);
		$this->load->view('user/m_detail_artikel',$data);
	}

}