<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {

	public function __construct()
	{

		parent::__construct();
		$this->load->model('jenis_model');
	}


	public function index(){
		$jenis = $this->jenis_model->listing();


		$valid = $this->form_validation;

		$valid->set_rules('nama_jenis','Nama','required',
			array('required' => 'Nama harus di isi'));

	
		$valid->set_rules('kode_jenis','kode jenis buku','required|is_unique[jenis.kode_jenis]',
			array('required' => 'kode jenis harus di isi',
					'is_unique'  => 'kode jenis <strong>'.$this->input->post('kode_jenis').
									'<strong> sudah ada.Buat kode jenis buku baru'));

		if($valid->run()=== FALSE) {

		
		$data = array(	'title' => 'kelola Jenis Buku',
						'jenis'  => $jenis,
						'isi'	=> 'admin/jenis/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i = $this->input;
			$data = array( 	'kode_jenis'	=> $i->post('kode_jenis'),
							'nama_jenis'	=> $i->post('nama_jenis'),
							'keterangan'	=> $i->post('keterangan'),
							'urutan'		=> $i->post('urutan')
						);
			$this->jenis_model->tambah($data);
			$this->session->set_flashdata('sukses', 'data telah di tambah');
			redirect(base_url('admin/jenis'),'refresh');
		}
		
	}

		public function edit($id_jenis){

		$jenis = $this->jenis_model->detail($id_jenis);

		$valid = $this->form_validation;

		$valid->set_rules('nama_jenis','Nama','required',
			array('required' => 'Nama harus di isi'));


		if($valid->run()=== FALSE) {

		
		$data = array(	'title' => 'Edit Jenis: '.$jenis->nama_jenis,
						'jenis'  => $jenis,
						'isi'	=> 'admin/jenis/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		}else{
			$i = $this->input;

			$data = array( 		'id_jenis'		=> $id_jenis,
							'kode_jenis'	=> $i->post('kode_jenis'),
							'nama_jenis'	=> $i->post('nama_jenis'),
							'keterangan'	=> $i->post('keterangan'),
							'urutan'		=> $i->post('urutan')
						);
			$this->jenis_model->edit($data);
			$this->session->set_flashdata('sukses', 'data telah diupdate');
			redirect(base_url('admin/jenis'),'refresh');
		}

	}

		public function delete($id_jenis){

			if($this->session->userdata('username') == "" && $this->session->userdata('akses_level')=="") {
				$this->session->set_flashdata('sukses', 'silahkan login dahulu');
				redirect(base_url('login'),'refresh');
			}

			$data = array( 'id_jenis'	=> $id_jenis);
			$this->jenis_model->delete($data);
			$this->session->set_flashdata('sukses', 'data telah dihapus');
			redirect(base_url('admin/jenis'),'refresh');
	}

}

/* End of file Jenis.php */
/* Location: ./application/controllers/admin/Jenis.php */