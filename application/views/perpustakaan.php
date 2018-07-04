<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Perpustakaan Online</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://localhost/buku/asset/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body style="background-color:#00BFFF">
<h1 align="center">Perpustakaan Mini</h1> <br>
<p align="center"><button class="btn btn-lg btn-default"><?php echo anchor('perpustakaan/tampil_buku', 'Tampil Buku');?></button></p></h3>
<p align="center"><button class="btn btn-lg btn-default"><?php echo anchor('perpustakaan/tambah_buku', 'Tambah Buku');?></button></p></h3>
<script src="http://localhost/buku/asset/jquery.js"></script>
<script src="http://localhost/buku/asset/bootstrap.min.js"></script>
</body>
</html>

File view ‘tampilbuku.php’, sebagai halaman untuk menampilkan daftar buku. Lokasi : htdocs\buku\application\views\tampilbuku.php

<html>
<head>
<title>Tampil Data Buku</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://localhost/buku/asset/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
echo "<h1 align=\"center\">Data Buku</h1> <br>";
echo "<table class=\"table table-striped\">";
echo "<tr><th>Kode Buku</th> <th>Judul Buku</th> <th> Penerbit </th> <th> ISBN </th> <th> Stok Buku </th><th>&nbsp;</th></tr>";
foreach ($databuku as $isi)
{
echo "<tr>";
echo "<td>$isi->kode_buku</td>";
echo "<td>$isi->judul_buku</td>";
echo "<td>$isi->penerbit</td>";
echo "<td>$isi->isbn</td>";
echo "<td>$isi->stok_buku</td>";
echo "<td>";
echo anchor('perpustakaan/koreksi_buku/'.$isi->kode_buku, 'Edit')." | ";
echo anchor('perpustakaan/konfirm_hapus_buku/'.$isi->kode_buku, 'Hapus');
echo "</td>";
echo "</tr>";
}
echo "</table>";
echo "<p>".anchor('perpustakaan', 'Kembali')."</p>";
?>
<script src="http://localhost/buku/asset/jquery.js"></script>
<script src="http://localhost/buku/asset/bootstrap.min.js"></script>
</body>
</html>

File view ‘tambahbuku.php’, sebagai halaman form untuk menambah buku. Lokasi : htdocs\buku\application\views\tambahbuku.php

<?php
echo "<h2>Tambah Data Buku</h2>";
echo form_open('perpustakaan/simpan_buku');
echo "<table align='left' width='100%'>";
$field1=array('name' => 'kode_buku','size'=>'15');
echo "<tr><td width='10%'>Kode Buku</td><td width='1%'> :</td><td>".form_input($field1)."</td></tr>";
$field2=array('name' => 'judul_buku','size'=>'30');
echo "<tr><td>Judul</td><td> :</td><td>".form_input($field2)."</td></tr>";
$field3=array('name' => 'penerbit','size'=>'30');
echo "<tr><td>Penerbit</td><td> :</td><td>".form_input($field3)."</td></tr>";
$field4=array('name' => 'isbn','size'=>'30');
echo "<tr><td>ISBN</td><td> :</td><td>".form_input($field4)."</td></tr>";
$field5=array('name' => 'stok_buku','size'=>'11');
echo "<tr><td>Stock</td><td> :</td><td>".form_input($field5)."</td></tr>";
echo form_hidden('mode', 'baru');
echo "<tr><td>".form_submit('mysubmit','Simpan')."</tr></td>" ;
echo "</table>";
echo form_close();
echo "<p>".anchor('perpustakaan', 'Kembali')."</p>";
?>