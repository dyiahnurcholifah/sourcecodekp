<!DOCTYPE html>
<head>
	<title>CETAK DATA</title>
<head>
<body>
	<center>DATA KEMATIAN IBU</center>
	<?php
	include 'koneksi.php'
	?>
	<table border="1" style="width:100%">
		<tr>
			<th width="1%">No</th>
			<th>NIK</th>
			<th>Nama Ibu</th>
			<th>Usia</th>
			<th>Tanggal Kematain</th>
			<th>Penyebab Kematian</th>
			<th>Penolong Persalinan</th>
			<th>Saat Kematian</th>
		</tr>
		<?php
		$no = 1;
		$sql = mysqli_query($conn,"select * from kematianibu");
		while($data = mysqli_fetch_array($sql)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['nik'];?></td>
				<td><?php echo $data['nama_ibu'];?></td>
				<td><?php echo $data['usia'];?></td>
				<td><?php echo $data['tanggal_kematian'];?></td>
				<td><?php echo $data['penyebab_kematian_sementara'];?></td>
				<td><?php echo $data['penolong_persalinan'];?></td>
				<td><?php echo $data['saat_kematian'];?></td>
			</tr>
		
		<?php
		}	
		?>
	</table>
	<script>
		window.print()
	</script>
</body>
</html>