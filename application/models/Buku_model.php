<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing() {
		$this->db->select('buku.*,
							jenis.nama_jenis,
							jenis.kode_jenis,
							bahasa.nama_bahasa,
							bahasa.kode_bahasa,
							user.nama');
		$this->db->from('buku');

		$this->db->join('jenis','jenis.id_jenis = buku.id_jenis','LEFT');
		$this->db->join('bahasa','bahasa.id_bahasa = buku.id_bahasa','LEFT');
		$this->db->join('user','user.id_user = buku.id_user','LEFT');

		$this->db->order_by('id_buku','DESC');
		$query = $this->db->get();
		return $query->result();

	}

	public function buku() {
		$this->db->select('buku.*,
							jenis.nama_jenis,
							jenis.kode_jenis,
							bahasa.nama_bahasa,
							bahasa.kode_bahasa,
							user.nama');
		$this->db->from('buku');

		$this->db->join('jenis','jenis.id_jenis = buku.id_jenis','LEFT');
		$this->db->join('bahasa','bahasa.id_bahasa = buku.id_bahasa','LEFT');
		$this->db->join('user','user.id_user = buku.id_user','LEFT');

		$this->db->where('buku.status_buku','Publis');
		$this->db->order_by('id_buku','DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();

	}


	public function detail($id_buku) {
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->where('id_buku',$id_buku);
		$this->db->order_by('id_buku','DESC');
		$query = $this->db->get();
		return $query->row();

	}

		public function login($bukuname, $password) {
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->where(array('bukuname' => $bukuname,
								'password' => sha1($password)));
		$this->db->order_by('id_buku','DESC');
		$query = $this->db->get();
		return $query->row();

	}


	public function tambah($data){
		$this->db->insert('buku',$data);
	}

	public function edit($data){
		$this->db->where('id_buku',$data['id_buku']);
		$this->db->update('buku',$data);

	}
	public function delete($data){
		$this->db->where('id_buku',$data['id_buku']);
		$this->db->delete('buku',$data);

	}
}

/* End of file buku_model.php */
/* Location: ./application/models/buku_model.php */