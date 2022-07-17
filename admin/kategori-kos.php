<h1>Kategori Kos</h1>
<div class="content-pack">
  <a href="index.php?req=tambahkat"><button class="btn green" style="margin-top:13px;"><i class="fa fa-pencil"></i> Tambah Kategori</button></a>
  <table class="info-detail" style="text-align:center;">
    <tr>
      <th>No.</th>
      <th>Nama Kategori</th>
      <th>Aksi</th>
    </tr>
    <?php
      $no = 1;
      $query = $konek->query("SELECT * FROM kategori");
      while($row=$query->fetch_object()){
    ?>
    <tr>
      <td><?= $no; ?></td>
      <td><?= $row->nama_kat; ?></td>
      <td>
        <a href="index.php?req=editkat&id=<?= $row->id_kat; ?>"><button class="btn blue">Koreksi</button></a>
        <a href="index.php?req=hapuskat&id=<?= $row->id_kat; ?>"><button class="btn red">Hapus</button></a>
      </td>
    </tr>
    <?php
    $no++;
    }
    ?>
  </table>
</div>

 