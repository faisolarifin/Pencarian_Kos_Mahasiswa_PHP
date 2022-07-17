<h1>Daftar Fasilitas</h1>
<div class="content-pack">
  <a href="index.php?req=tambahfas"><button class="btn green" style="margin-top:13px;"><i class="fa fa-pencil"></i> Tambah Fasilitas</button></a>
  <table class="info-detail" style="text-align:center;">
    <tr>
      <th>No.</th>
      <th>Nama Fasilitas</th>
      <!-- <th>Icon</th> -->
      <th>Aksi</th>
    </tr>
    <?php
      $no = 1;
      $query = $konek->query("SELECT * FROM fasilitas");
      while($row=$query->fetch_object()){
    ?>
    <tr>
      <td><?= $no; ?></td>
      <td><?= $row->nama_fas; ?></td>
      <!-- <td><i class="fa <?= $row->awesome; ?>"></i></td> -->
      <td>
        <a href="index.php?req=editfas&id=<?= $row->id_fas; ?>"><button class="btn blue">Koreksi</button></a>
        <a href="index.php?req=hapusfas&id=<?= $row->id_fas; ?>"><button class="btn red">Hapus</button></a>
      </td>
    </tr>
    <?php
    $no++;
    }
    ?>
  </table>
</div>
  
 