<?php
$id = $konek->real_escape_string($_GET['id']);
$no=1;
$result = $konek->query("SELECT akun.id_akun, akun.nama as x,kos.id_kos, kos.nama, kos.id_akun, kamar.*, harga.* FROM akun, kos, kamar, harga WHERE akun.id_akun=kos.id_akun AND kos.id_kos=kamar.id_kos AND kamar.id_kamar=harga.id_kamar AND kamar.id_kamar='$id'");
while($r=$result->fetch_object()){

?>
<div class="judul-detail"><?= $r->nama; ?></div>
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
      <td colspan="2"><b>Pemilik :</b> <?= $r->x; ?></td>
    </tr>
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
        $que = $konek->query("SELECT * FROM `fasilitas` WHERE id_fas IN (SELECT id_fas FROM fasilitas_kamar WHERE id_kamar='".$r->id_kamar."')");
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