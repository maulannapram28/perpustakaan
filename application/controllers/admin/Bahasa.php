<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahasa extends CI_Controller {

	public function __construct()
	{

		parent::__construct();
		$this->load->model('bahasa_model');
	}


	public function index(){
		$bahasa = $this->bahasa_model->listing();


		$valid = $this->form_validation;

		$valid->set_rules('nama_bahasa','Nama','required',
			array('required' => 'Nama harus di isi'));

	
		$valid->set_rules('kode_bahasa','kode bahasa buku','required|is_unique[bahasa.kode_bahasa]',
			array('required' => 'kode bahasa harus di isi',
					'is_unique'  => 'kode bahasa <strong>'.$this->input->post('kode_bahasa').
									'<strong> sudah ada.Buat kode bahasa buku baru'));

		if($valid->run()=== FALSE) {

		
		$data = array(	'title' => 'kelola Bahasa Buku',
						'bahasa'  => $bahasa,
						'isi'	=> 'admin/bahasa/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i = $this->input;
			$data = array( 	'kode_bahasa'	=> $i->post('kode_bahasa'),
							'nama_bahasa'	=> $i->post('nama_bahasa'),
							'keterangan'	=> $i->post('keterangan'),
							'urutan'		=> $i->post('urutan')
						);
			$this->bahasa_model->tambah($data);
			$this->session->set_flashdata('sukses', 'data telah di tambah');
			redirect(base_url('admin/bahasa'),'refresh');
		}
		
	}

		public function edit($id_bahasa){

		$bahasa = $this->bahasa_model->detail($id_bahasa);

		$valid = $this->form_validation;

		$valid->set_rules('nama_bahasa','Nama','required',
			array('required' => 'Nama harus di isi'));


		if($valid->run()=== FALSE) {

		
		$data = array(	'title' => 'Edit Bahasa: '.$bahasa->nama_bahasa,
						'bahasa'  => $bahasa,
						'isi'	=> 'admin/bahasa/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		}else{
			$i = $this->input;

			$data = array( 		'id_bahasa'		=> $id_bahasa,
							'kode_bahasa'	=> $i->post('kode_bahasa'),
							'nama_bahasa'	=> $i->post('nama_bahasa'),
							'keterangan'	=> $i->post('keterangan'),
							'urutan'		=> $i->post('urutan')
						);
			$this->bahasa_model->edit($data);
			$this->session->set_flashdata('sukses', 'data telah diupdate');
			redirect(base_url('admin/bahasa'),'refresh');
		}

	}

		public function delete($id_bahasa){

			if($this->session->userdata('username') == "" && $this->session->userdata('akses_level')=="") {
				$this->session->set_flashdata('sukses', 'silahkan login dahulu');
				redirect(base_url('login'),'refresh');
			}

			$data = array( 'id_bahasa'	=> $id_bahasa);
			$this->bahasa_model->delete($data);
			$this->session->set_flashdata('sukses', 'data telah dihapus');
			redirect(base_url('admin/bahasa'),'refresh');
	}

}

/* End of file Bahasa.php */
/* Location: ./application/controllers/admin/Bahasa.php */