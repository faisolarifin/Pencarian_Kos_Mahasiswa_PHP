<?php
  $ct = $konek->real_escape_string($_GET['ct']);
  $q = $konek->query("SELECT * FROM level");
  while($r=$q->fetch_object()){
    $akses[] = $r->akses_user;
  }
  if(in_array($ct, $akses)){
    if($ct==$akses[0]){
      $ct = "1";
    }elseif ($ct==$akses[1]){
      $ct = "2";
    }elseif ($ct==$akses[2]){
      $ct = "3";
    }
  }else{
    $ct = "0";
  }
?>
<h1>Daftar <?= @$akses[(int)$ct - 1] != null ? $akses[(int)$ct - 1] : 'Akun'; ?></h1> 
  <table class="info-detail" style="text-align:center;">
    <tr>
      <td colspan="8" style="text-align:left;">
        <form method="post" style="display:inline;">
          <input class="input-text" type="text" name="kata" placeholder="Apa yang anda cari.. ?">
          <input type="submit" name="cari" value="Cari" class="btn green" >
        </form>  
        <a href="index.php?req=setakun"><button class="btn blue"><i class="fa fa-pencil"></i> Tambah</button></a>
      </td>
    </tr>
    <tr>
      <th>No.</th>
      <th>Nama</th>
      <th>email</th>
      <th>Jenis Kelamin</th>
      <th>Tempat Lahir</th>
      <th>Password</th>
      <th>Alamat</th>
      <th>Aksi</th>
    </tr>
    <?php
      $no=1;
      $cari = @$konek->real_escape_string($_POST['kata']); 
      if(@$konek->real_escape_string($_POST['cari']) && $cari != ''){
        $query = $konek->query("SELECT * FROM akun WHERE (nama LIKE '%$cari%' OR email LIKE '%$cari%'OR tempat_lahir LIKE '%$cari%'OR tanggal_lahir LIKE '%$cari%' OR telp LIKE '%$cari%' OR alamat LIKE '%$cari%') AND id_akses='$ct'");
      }else{
        $query = $konek->query("SELECT * FROM akun WHERE id_akses='$ct'");
      }      
      if($query->num_rows < 1){
        echo "<tr><td colspan='8'><center>Data tidak ditemukan<center></td></tr>";
      }else{
        while($row=$query->fetch_object()){
      ?>
      <tr>
        <td><?= $no; ?></td>
        <td><?= $row->nama; ?></td>
        <td><?= $row->email; ?></td>
        <td><?= $row->jenis_kelamin; ?></td>
        <td><?= $row->tempat_lahir; ?></td>
        <td><?= $row->telp; ?></td>
        <td><?= $row->alamat; ?></td>
        <td>
          <a href="index.php?req=editakun&id=<?= $row->id_akun; ?>"><button class="btn green">Koreksi</button></a>
          <a href="index.php?req=blokir&id=<?= $row->id_akun; ?>"><button class="btn yellow">Blokir</button></a>
          <a href="index.php?req=hapusakun&id=<?= $row->id_akun; ?>"><button class="btn red">Hapus</button></a>
        </td>
      </tr>
      <?php
        $no++;
        }
      }
    ?>
  </table>
 