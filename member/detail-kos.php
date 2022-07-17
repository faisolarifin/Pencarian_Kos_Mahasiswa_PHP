<?php
$id = $konek->real_escape_string($_GET['id']);
$qry = $konek->query("SELECT kos.*, kategori.* FROM kos, kategori WHERE kos.id_kat=kategori.id_kat AND id_kos='$id' AND kos.id_akun='".$_SESSION['id']."'");
$row = $qry->fetch_object();
?>
<h1 class="detail">Info Bangunan</h1>
<div class="content-pack">
  <div class="judul-detail"><?= $row->nama; ?></div>
  <?php
    $harga = $konek->query("SELECT bulanan FROM harga WHERE id_kamar IN (SELECT MIN(id_kamar) FROM kamar WHERE id_kos='".$row->id_kos."')")->fetch_object();
  ?>
  <div class="harga-detail" style="text-align:center;"><?= empty($harga->bulanan) ? '-'  : 'Rp. '.number_format($harga->bulanan).'/Bulan'; ?></div>
  <div class="clear-fix"></div>
  <div class="slider slider<?= $row->id_kos;?>">
    <div class="slide_viewer">
      <div class="slide_group slide_group<?= $row->id_kos;?>">
        <?php
          $q = $konek->query("SELECT * FROM gambar_kos WHERE id_kos='".$row->id_kos."'");
          while($img= $q->fetch_object()){
        ?>
        <div class="slide slide<?= $row->id_kos;?>">
          <img src="../gambar/<?= $img->nama_gambar; ?>">
        </div>
        <?php
          }
        ?>
      </div>
    </div>
  </div><!-- End // .slider -->

  <div class="slide_buttons slide_buttons<?= $row->id_kos;?>"></div>

  <div class="directional_nav">
    <div class="previous_btn previous_btn<?= $row->id_kos;?>" title="Previous">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="65px" height="65px" viewBox="-11 -11.5 65 66">
        <g>
          <g>
            <path fill="#474544" d="M-10.5,22.118C-10.5,4.132,4.133-10.5,22.118-10.5S54.736,4.132,54.736,22.118
        c0,17.985-14.633,32.618-32.618,32.618S-10.5,40.103-10.5,22.118z M-8.288,22.118c0,16.766,13.639,30.406,30.406,30.406 c16.765,0,30.405-13.641,30.405-30.406c0-16.766-13.641-30.406-30.405-30.406C5.35-8.288-8.288,5.352-8.288,22.118z"/>
            <path fill="#474544" d="M25.43,33.243L14.628,22.429c-0.433-0.432-0.433-1.132,0-1.564L25.43,10.051c0.432-0.432,1.132-0.432,1.563,0 c0.431,0.431,0.431,1.132,0,1.564L16.972,21.647l10.021,10.035c0.432,0.433,0.432,1.134,0,1.564  c-0.215,0.218-0.498,0.323-0.78,0.323C25.929,33.569,25.646,33.464,25.43,33.243z"/>
          </g>
        </g>
      </svg>
    </div>
    <div class="next_btn next_btn<?= $row->id_kos;?>" title="Next">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="65px" height="65px" viewBox="-11 -11.5 65 66">
        <g>
          <g>
            <path fill="#474544" d="M22.118,54.736C4.132,54.736-10.5,40.103-10.5,22.118C-10.5,4.132,4.132-10.5,22.118-10.5  c17.985,0,32.618,14.632,32.618,32.618C54.736,40.103,40.103,54.736,22.118,54.736z M22.118-8.288  c-16.765,0-30.406,13.64-30.406,30.406c0,16.766,13.641,30.406,30.406,30.406c16.768,0,30.406-13.641,30.406-30.406 C52.524,5.352,38.885-8.288,22.118-8.288z"/>
            <path fill="#474544" d="M18.022,33.569c 0.282,0-0.566-0.105-0.781-0.323c-0.432-0.431-0.432-1.132,0-1.564l10.022-10.035      L17.241,11.615c 0.431-0.432-0.431-1.133,0-1.564c0.432-0.432,1.132-0.432,1.564,0l10.803,10.814c0.433,0.432,0.433,1.132,0,1.564 L18.805,33.243C18.59,33.464,18.306,33.569,18.022,33.569z"/>
          </g>
        </g>
      </svg>
    </div>
  </div><!-- End // .directional_nav -->
  <script>
    slider('.slider<?= $row->id_kos;?>','.slide_group<?= $row->id_kos;?>','.slide<?= $row->id_kos;?>','.previous_btn<?= $row->id_kos;?>','.next_btn<?= $row->id_kos;?>','.slide_buttons<?= $row->id_kos;?>');
  </script>

  <div class="deskripsi"><?= $row->deskripsi; ?></div>
  <table class="info-detail">
    <tr>
      <th>Pemilik</th>
      <th>Kategori</th>
      <th>Umur Bangunan</th>
      <th>Jam Tamu</th>
      <th>Pelihara Binatang</th>
      <th>Alamat</th>
    </tr>
    <tr>
      <td>Adudu</td>
      <td><?= $row->nama_kat; ?></td>
      <td><?= $row->umur_kos; ?> Tahun</td>
      <td><?= $row->jam_tamu; ?></td>
      <td><?= $row->pelihara_bnt; ?></td>
      <td><?= $row->alamat; ?></td>
    </tr>
  </table>  

</div>

<?php
$no=1;
$result = $konek->query("SELECT kamar.*, harga.* FROM kamar, harga WHERE kamar.id_kamar=harga.id_kamar AND kamar.id_kos='$id'");
while($r=$result->fetch_object()){

?>
<h1 class="detail">Info Kamar</h1>
<div class="content-pack">
  <table class="much-detail">
    <tr>
      <td><?= $r->harian!='0' ? 'Rp. '.number_format($r->harian).'/Hari' : '-'; ?></td>
      <td><?= $r->mingguan!='0' ? 'Rp. '.number_format($r->mingguan).'/Minggu' : '-'; ?></td>
      <td><?= $r->bulanan!='0' ? 'Rp. '.number_format($r->bulanan).'/Bulan' : '-'; ?></td>
      <td><?= $r->tahunan!='0' ? 'Rp. '.number_format($r->tahunan).'/Tahun' : '-'; ?></td>
    </tr>
  </table>

  <div class="slider slider<?= $no; ?>">
    <div class="slide_viewer">
      <div class="slide_group slide_group<?= $no; ?>">
        <?php
          $q = $konek->query("SELECT * FROM gambar_kamar WHERE id_kamar='".$r->id_kamar."'");
          while($gmb= $q->fetch_object()){
        ?>
        <div class="slide slide<?= $no;?>">
          <img src="../gambar/<?= $gmb->nama_gmb; ?>">
        </div>
        <?php
          }
        ?>
      </div>
    </div>
  </div><!-- End // .slider -->

  <div class="slide_buttons slide_buttons<?= $no; ?>"></div>

  <div class="directional_nav">
    <div class="previous_btn previous_btn<?= $no; ?>" title="Previous">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="65px" height="65px" viewBox="-11 -11.5 65 66">
        <g>
          <g>
            <path fill="#474544" d="M-10.5,22.118C-10.5,4.132,4.133-10.5,22.118-10.5S54.736,4.132,54.736,22.118
        c0,17.985-14.633,32.618-32.618,32.618S-10.5,40.103-10.5,22.118z M-8.288,22.118c0,16.766,13.639,30.406,30.406,30.406 c16.765,0,30.405-13.641,30.405-30.406c0-16.766-13.641-30.406-30.405-30.406C5.35-8.288-8.288,5.352-8.288,22.118z"/>
            <path fill="#474544" d="M25.43,33.243L14.628,22.429c-0.433-0.432-0.433-1.132,0-1.564L25.43,10.051c0.432-0.432,1.132-0.432,1.563,0 c0.431,0.431,0.431,1.132,0,1.564L16.972,21.647l10.021,10.035c0.432,0.433,0.432,1.134,0,1.564  c-0.215,0.218-0.498,0.323-0.78,0.323C25.929,33.569,25.646,33.464,25.43,33.243z"/>
          </g>
        </g>
      </svg>
    </div>
    <div class="next_btn next_btn<?= $no; ?>" title="Next">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="65px" height="65px" viewBox="-11 -11.5 65 66">
        <g>
          <g>
            <path fill="#474544" d="M22.118,54.736C4.132,54.736-10.5,40.103-10.5,22.118C-10.5,4.132,4.132-10.5,22.118-10.5  c17.985,0,32.618,14.632,32.618,32.618C54.736,40.103,40.103,54.736,22.118,54.736z M22.118-8.288  c-16.765,0-30.406,13.64-30.406,30.406c0,16.766,13.641,30.406,30.406,30.406c16.768,0,30.406-13.641,30.406-30.406 C52.524,5.352,38.885-8.288,22.118-8.288z"/>
            <path fill="#474544" d="M18.022,33.569c 0.282,0-0.566-0.105-0.781-0.323c-0.432-0.431-0.432-1.132,0-1.564l10.022-10.035      L17.241,11.615c 0.431-0.432-0.431-1.133,0-1.564c0.432-0.432,1.132-0.432,1.564,0l10.803,10.814c0.433,0.432,0.433,1.132,0,1.564 L18.805,33.243C18.59,33.464,18.306,33.569,18.022,33.569z"/>
          </g>
        </g>
      </svg>
    </div>
  </div><!-- End // .directional_nav -->
  <script>
    slider('.slider<?= $no; ?>','.slide_group<?= $no; ?>','.slide<?= $no; ?>','.previous_btn<?= $no; ?>','.next_btn<?= $no; ?>','.slide_buttons<?= $no; ?>');
  </script>

  <div class="deskripsi"><?= $r->deskripsi; ?></div>
  <table class="info-detail">
    <tr>
      <th>Jumlah</th>
      <th>Luas</th>
    </tr>
    <tr>
      <td><?= $r->jumlah; ?> Kamar</td>
      <td><?= $r->luas; ?> Meter</td>
    </tr>
  </table>
  <h3>Fasilitas Kamar</h3>
  <table class="info-detail">
    <tr>
      <?php
        $n = 1;
        $que = $konek->query("SELECT * FROM fasilitas WHERE id_fas IN (SELECT id_fas FROM fasilitas_kamar WHERE id_kamar='".$r->id_kamar."')");
        while($fas=$que->fetch_object()){
      ?>
        <td><i class="fa <?= $fas->awesome; ?>"></i> <?= $fas->nama_fas; ?></td>
      <?php
        if($n%4==0){
          echo "</tr><tr>";
        }
        $n++;
      }
      ?>
    </tr>
  </table>
</div>
<?php
  $no++;
}

?>