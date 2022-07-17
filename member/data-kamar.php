<a href="index.php?req=tambahkmr"><button class="btn green" style="margin-bottom:15px;"><i class="fa fa-pencil"></i> Tambah Kamar</button></a>
<div class="table-recicle kos-tbl">
	<table>
		<thead>
			<tr>
				<th rowspan="2">No.</th>
				<th rowspan="2">Gambar Kamar</th>
				<th rowspan="2">Nama Kos</th>
				<th rowspan="2">Jumlah</th>
				<th rowspan="2">Luas</th>
				<th colspan="4">Harga Per</th>
				<th rowspan="2">Deskripsi</th>
				<th rowspan="2">Aksi</th>
			</tr>
			<tr class="col-harga">
				<td>hari</td>
				<td>minggu</td>
				<td>bulan</td>
				<td>tahun</td>
			</tr>
		</thead>
		<tbody>
			<tr>
			<?php
			$no = 1;
			$result = $konek->query("SELECT kos.id_kos,kos.nama, kamar.*, harga.* FROM kos, kamar, harga WHERE kos.id_kos=kamar.id_kos AND kamar.id_kamar=harga.id_kamar AND kos.id_akun='".$_SESSION['id']."'");
			while($row=$result->fetch_object()){
			?>
				<td><?= $no; ?></td>
				<?php
					$query = $konek->query("SELECT MIN(nama_gmb) as ng FROM gambar_kamar WHERE id_kamar='".$row->id_kamar."'");
					$img = $query->fetch_object();
				?>
				<td><img src="../gambar/<?= $img->ng; ?>" alt="Kamar" width="170" height="110"></td>
				<td><?= $row->nama; ?></td>
				<td><?= $row->jumlah; ?> Kamar</td>
				<td><?= $row->luas; ?> Meter</td>
				<td><?= $row->harian!='0' ? 'Rp. '.number_format($row->harian) : '-'; ?></td>
		        <td><?= $row->mingguan!='0' ? 'Rp. '.number_format($row->mingguan) : '-'; ?></td>
		        <td><?= $row->bulanan!='0' ? 'Rp. '.number_format($row->bulanan) : '-'; ?></td>
		        <td><?= $row->tahunan!='0' ? 'Rp. '.number_format($row->tahunan) : '-'; ?></td>
				<td><?= $row->deskripsi; ?></td>
				<td>
					<a href="index.php?req=editkmr&id=<?= $row->id_kamar; ?>"><button class="btn green">Koreksi</button></a>
					<a href="index.php?req=hapuskmr&id=<?= $row->id_kamar; ?>"><button class="btn red">Hapus</button></a>
					<br>
					<a href="index.php?req=detailkmr&id=<?= $row->id_kamar; ?>"><button class="btn blue">Detail <i class="fa fa-arrow-right"></i></button></a>
					
				</td>
			</tr>
			<?php
				$no++;
				}
			?>
		</tbody>
	</table>	
</div>
