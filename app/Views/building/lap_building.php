<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initialscale=1.0">
<title>Lap. Data Gedung</title>
</head>
<body>
<h2>Data Gedung </h2>
</a>
<table border=1 width=80% cellpadding=2 cellspacing=0 style="margintop: 5px; text-align:center">
<thead>
<tr>
<th scope="col">No</th>
<th scope="col">Kode Gedung</th>
<th scope="col">Nama Gedung</th>
<th scope="col">Total Lantai</th>
<th scope="col">Total Ruangan</th>
</tr>
</thead>
<tbody>
<?php $no = 1;
foreach ($buildings as $key => $value) { ?>
<tr>
<td><?= $no++; ?></td>
<td align="left"><?= $value['building_code']; ?></td>
<td align="left"><?= $value['building_name']; ?></td>
<td align="left"><?= $value['total_floor']; ?></td>
<td align="left"><?= $value['total_room']; ?></td>
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