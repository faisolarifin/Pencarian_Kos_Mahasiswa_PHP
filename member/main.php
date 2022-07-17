<div class="welcome">
	<div class="wl-user">
		<i class="fa fa-user"></i>
	</div>
	<p class="wl-p"><?= $_SESSION['nama']; ?></p>
	<h1 class="wl">
		Selamat Datang di Halaman
		<br>Dashboard Member
	</h1>
	<div class="corner rd">
		<i class="fa fa-bed"></i><span><?php $data = $konek->query("SELECT count(id_kos) as ckos FROM kos WHERE id_akun='".$_SESSION['id']."'")->fetch_object(); echo $data->ckos; ?></span>
		<a href="?req=datakost"><h3>Data Kos</h3></a>
	</div>
	<div class="corner gr">
		<i class="fa fa-building"></i></i><span><?php $data = $konek->query("SELECT count(kamar.id_kamar) as x, kamar.id_kos, kos.id_kos from kamar, kos WHERE kamar.id_kos=kos.id_kos and id_akun='".$_SESSION['id']."'")->fetch_object(); echo $data->x; ?></span>
		<a href="?req=datakamar"><h3>Data Kamar</h3></a>
	</div>
</div>