<a href="index.php?req=tambahkos"><button class="btn green" style="margin-bottom:15px;"><i class="fa fa-pencil"></i> Tambah Kos</button></a>
<div class="table-recicle kos-tbl">
	<table>
		<thead>
			<tr>
				<th>No.</th>
				<th>Gambar</th>
				<th>Nama Kos</th>
				<th>Kategori</th>
				<th>Alamat</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<tr>
			<?php
			$no = 1;
			$result = $konek->query("SELECT kos.*, kategori.* FROM kos, kategori WHERE kos.id_kat=kategori.id_kat AND kos.id_akun='".$_SESSION['id']."'");
			while($row=$result->fetch_object()){
			?>
				<td><?= $no; ?></td>
				<?php
					$query = $konek->query("SELECT MIN(nama_gambar) as ng FROM gambar_kos WHERE id_kos='".$row->id_kos."'");
					$img = $query->fetch_object();
				?>
				<td><img src="../gambar/<?= $img->ng; ?>" alt="Kos" width="170" height="110"></td>
				<td><?= $row->nama; ?></td>
				<td><?= $row->nama_kat; ?></td>
				<td><?= $row->alamat; ?></td>
				<td>
					<a href="index.php?req=editkos&id=<?= $row->id_kos; ?>"><button class="btn green">Koreksi</button></a>
					<a href="index.php?req=hapuskos&id=<?= $row->id_kos; ?>"><button class="btn red">Hapus</button></a>
					<br>
					<a href="index.php?req=detail&id=<?= $row->id_kos; ?>"><button class="btn blue">Detail <i class="fa fa-arrow-right"></i></button></a>
					
				</td>
			</tr>
			<?php
				$no++;
				}
			?>
		</tbody>
	</table>	
</div>
