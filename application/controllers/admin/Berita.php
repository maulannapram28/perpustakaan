<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct()
	{

		parent::__construct();
		$this->load->model('berita_model');
	}

	public function index()
	{
		$berita = $this->berita_model->listing();

		$data = array(	'title' 	=> 'Data Berita ('.count($berita).')',
						'berita'  	=> $berita,
						'isi'		=> 'admin/berita/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	

		//tambahan
		public function tambah()
	{

		$valid = $this->form_validation;

		$valid->set_rules('judul_berita','Judul Berita','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('isi','Isi Berita','required',
			array('required' => '%s harus diisi'));

		if($valid->run()) {

			$config['upload_path']   = './assets/upload/image/';
			$config['allowed_types'] = 'jpg|jpeg|gif|png';
			$config['max_size']      = '12000'; // KB  
			$this->upload->initialize($config);
			if(! $this->upload->do_upload('gambar')) {

		$data = array(	'title' 	=> 'Tambah Berita',
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/berita/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
			}else{

			$upload_data        		= array('uploads' =>$this->upload->data());

						// Image Editor
			$config['image_library']  	= 'gd2';
			$config['source_image']   	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
			$config['new_image']     	= './assets/upload/image/thumbs/';
			$config['create_thumb']   	= TRUE;
			$config['quality']       	= "100%";
			$config['maintain_ratio']   = TRUE;
			$config['width']       		= 360; // Pixel
			$config['height']       	= 360; // Pixel
			$config['x_axis']       	= 0;
			$config['y_axis']       	= 0;
			$config['thumb_marker']   	= '';
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			// Image Editor
			
			$i 				= $this->input;
			$slug_berita 	= url_title($this->input->post('judul_berita'), 'dash', TRUE);
			$data = array(	'id_user'			=> $this->session->userdata('id_user'),
							'slug_berita'		=> $slug_berita,
							'judul_berita'		=> $i->post('judul_berita'),
							'isi'				=> $i->post('isi'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'status_berita'		=> $i->post('status_berita'),
							'jenis_berita'		=> $i->post('jenis_berita')
						);
			$this->berita_model->tambah($data);
			$this->session->set_flashdata('sukses', 'data telah di tambah');
			redirect(base_url('admin/berita'),'refresh');
		}}
		$data = array(	'title' 	=> 'Tambah Berita',
						'isi'		=> 'admin/berita/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

		// edit file berita
		public function edit($id_berita)
		{

		$berita  = $this->berita_model->detail($id_berita);
		$id_berita 	= $berita->id_berita;
		$berita 		= $this->berita_model->detail($id_berita);

		$valid = $this->form_validation;

		$valid->set_rules('judul_berita','Judul Berita','required',
			array('required' => '%s harus diisi'));

				$valid->set_rules('isi','Isi Berita','required',
			array('required' => '%s harus diisi'));

		if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path']   = './assets/upload/image/';
			$config['allowed_types'] = 'jpg|jpeg|gif|png';
			$config['max_size']      = '12000'; // KB  
			$this->upload->initialize($config);
			if(! $this->upload->do_upload('gambar')) {

		$data = array(	'title' 	=> 'Edit Berita: '.$berita->judul_berita,
						'berita' 	=> $berita,
						'error'		=> $this->opload->display_errors(),
						'isi'		=> 'admin/berita/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
			}else{

			$upload_data        		= array('uploads' =>$this->upload->data());
			
			// Image Editor
							// Image Editor
			$config['image_library']  	= 'gd2';
			$config['source_image']   	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
			$config['new_image']     	= './assets/upload/image/thumbs/';
			$config['create_thumb']   	= TRUE;
			$config['quality']       	= "100%";
			$config['maintain_ratio']   = TRUE;
			$config['width']       		= 360; // Pixel
			$config['height']       	= 360; // Pixel
			$config['x_axis']       	= 0;
			$config['y_axis']       	= 0;
			$config['thumb_marker']   	= '';
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			// Image Editor
			
			if($berita->gambar != ""){
				unlink('./assets/upload/image/' .$berita->gambar);
				unlink('./assets/upload/image/thumbs/' .$berita->gamabr);
			}

			$i 				= $this->input;
			$slug_berita 	= url_title($this->input->post('judul_berita'), 'dash', TRUE);
			$data = array(	'id_berita'         => $id_berita,
							'id_user'			=> $this->session->userdata('id_user'),
							'slug_berita'		=> $slug_berita,
							'judul_berita'		=> $i->post('judul_berita'),
							'isi'				=> $i->post('isi'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'status_berita'		=> $i->post('status_berita'),
							'jenis_berita'		=> $i->post('jenis_berita')
						);
			$this->berita_model->edit($data);
			$this->session->set_flashdata('sukses', 'data telah di tambah');
			redirect(base_url('admin/berita'),'refresh');

		}}else{
				
			$i 				= $this->input;
			$slug_berita 	= url_title($this->input->post('judul_berita'), 'dash', TRUE);
			$data = array(	'id_berita'         => $id_berita,
							'id_user'			=> $this->session->userdata('id_user'),
							'slug_berita'		=> $slug_berita,
							'judul_berita'		=> $i->post('judul_berita'),
							'isi'				=> $i->post('isi'),
							'status_berita'		=> $i->post('status_berita'),
							'jenis_berita'		=> $i->post('jenis_berita')
						);
			$this->berita_model->edit($data);
			$this->session->set_flashdata('sukses', 'data telah di edit');
			redirect(base_url('admin/berita'),'refresh');
		}}
		// masuk database
		$data = array(	'title' 	=> 'Edit Berita: '.$berita->judul_berita,
						'berita' 	=> $berita,
						'isi'		=> 'admin/berita/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


		public function delete($id_berita){

			if($this->session->userdata('username') == "" && $this->session->userdata('akses_level')=="") {
				$this->session->set_flashdata('sukses', 'silahkan login dahulu');
				redirect(base_url('login'),'refresh');
			}

			$berita = $this->berita_model->detail($id_berita);

			if($berita = $this->gamabr != "") {
				unlink('./assets/upload/image/' .$berita->gambar);
				unlink('./assets/upload/image/thumbs/' .$berita->gamabr);
			}

			$data = array( 'id_berita'	=> $id_berita);
			$this->berita_model->delete($data);
			$this->session->set_flashdata('sukses', 'data telah dihapus');
			redirect(base_url('admin/berita'),'refresh');
	}

}

/* End of berita Berita.php */
/* Location: ./application/controllers/admin/Berita.php */