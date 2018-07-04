<?php
class Perpustakaan extends CI_Controller
{
function __construct()
{
parent::__construct();
}
function index()
{
$this->load->view('perpustakaan');
}
function tampil_buku()
{
$kode='all';
$this->load->model('buku');
$data_buku['databuku']=$this->buku->tampil_data_buku($kode);
$this->load->view('tampilbuku',$data_buku);
}
function tambah_buku()
{
$this->load->view('tambahbuku');
}
function simpan_buku()
{
if (isset($_POST['mysubmit'])){
$data = array(
'kode_buku' => $this->input->post('kode_buku'),
'judul_buku' => $this->input->post('judul_buku'),
'penerbit' => $this->input->post('penerbit'),
'isbn' => $this->input->post('isbn'),
'stok_buku' => $this->input->post('stok_buku'),
'mode' => $this->input->post('mode')
);
$this->load->model('buku');
$hasil=$this->buku->simpan_data_buku($data);
if ($hasil){
echo "<h3>Simpan Data Berhasil</h3>";
}else{
echo "<h3>Simpan Data Gagal</h3>";
}
echo anchor('perpustakaan', 'Kembali');
}
}
function koreksi_buku($kd)
{
$this->load->model('buku');
$data_buku['databuku']=$this->buku->tampil_data_buku($kd);
$this->load->view('koreksibuku',$data_buku);
}
function konfirm_hapus_buku($kd)
{
$this->load->model('buku');
$data_buku['databuku']=$this->buku->tampil_data_buku($kd);
$this->load->view('konfirmhapus',$data_buku);
}
function hapus_buku($kd)
{
$this->load->model('buku');
$hasil=$this->buku->hapus_data_buku($kd);
if ($hasil){
echo "<h3>Hapus Data Berhasil</h3>";
}else{
echo "<h3>Hapus Data Gagal</h3>";
}
echo anchor('perpustakaan', 'Kembali');
}
}
?>

Membuat Model
Model mewakili struktur data. Model berisi fungsi-fungsi untuk pengelolaan basis data seperti ambil tambah, koreksi dan hapus data. Karena tulisan ini membahas tentang data buku, maka fungsi-fungsi untuk memanipulasi tabel buku kita buat pada model ‘buku.php’. Berikut langkahnya:

Buat file model dengan nama file ‘buku.php’. Lokasi : htdocs\buku\application\models\buku.php

<?php
class Buku extends CI_Model
{
public function tampil_data_buku($kode)
{
if ($kode=='all'){
$hasil=$this->db->get('tabel_buku');
}else{
$this->db->where('kode_buku',$kode);
$hasil=$this->db->get('tabel_buku');
}
return $hasil->result();
}
public function simpan_data_buku($data)
{
if ($data['mode']=='baru'){
unset($data['mode']);
$hasil=$this->db->insert('tabel_buku', $data);
}else{
unset($data['mode']);
$this->db->where('kode_buku',$data['kode_buku']);
$hasil=$this->db->update('tabel_buku', $data);
}
return $hasil;
}
public function hapus_data_buku($kode)
{
$this->db->where('kode_buku', $kode);
$hasil=$this->db->delete('tabel_buku');
return $hasil;
}
}
?&gt;