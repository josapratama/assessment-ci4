<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initialscale=1.0">
<title>Lap. Data Dosen</title>
</head>
<body>
<h2>Data Dosen </h2>
</a>
<table border=1 width=80% cellpadding=2 cellspacing=0 style="margintop: 5px; text-align:center">
<thead>
<tr>
<th>No</th>
<th>NIDN</th>
<th>Nama Dosen</th>
<th>Alamat</th>
</tr>
</thead>
<tbody>
<?php $no = 1;
foreach ($lecturers as $key => $value) { ?>
<tr>
<td><?= $no++; ?></td>
<td align="left"><?= $value['nidn']; ?></td>
<td align="left"><?= $value['name']; ?></td>
<td align="left"><?= $value['home_address']; ?></td>
</tr>
<?php } ?>
</tbody>
</table>
<p></p>
<p>Prabumulih, <?= date('y-m-d-H-i-s'); ?>
<br>Bendahara
</p>
<br><br>
<p>Abdul Haris Nasution, SH</p>
</body>
</html>