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