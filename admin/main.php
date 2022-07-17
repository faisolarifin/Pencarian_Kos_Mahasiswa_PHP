<div class="welcome">
	<div class="wl-user">
		<i class="fa fa-user"></i>
	</div>
	<p class="wl-p"><?= $_SESSION['nama']; ?></p>
	<h1 class="wl">
		Selamat Datang di Halaman
		<br>Dashboard Admin
	</h1>
	<div class="corner rd">
		<i class="fa fa-bed"></i><span><?php $data = $konek->query("SELECT count(id_kos) as ckos FROM kos")->fetch_object(); echo $data->ckos; ?></span>
		<a href="?req=datakost"><h3>Data Kos</h3></a>
	</div>
	<div class="corner gr">
		<i class="fa fa-building"></i></i><span><?php $data = $konek->query("SELECT count(id_kamar) as x from kamar")->fetch_object(); echo $data->x; ?></span>
		<a href="?req=datakamar"><h3>Data Kamar</h3></a>
	</div>
	<div class="corner yl">
		<i class="fa fa-building"></i></i><span><?php $data = $konek->query("SELECT count(id_akun) as x from akun where id_akses='2'")->fetch_object(); echo $data->x; ?></span>
		<a href="?req=lsakun&ct=member"><h3>Data Data</h3></a>
	</div>
</div>