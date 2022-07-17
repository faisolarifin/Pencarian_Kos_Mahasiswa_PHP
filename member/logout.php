<div class="notif"></div>
<?php
unset($_SESSION['id']);
unset($_SESSION['akses']);
session_unset();
session_destroy();
echo "<script>$('.notif').text('Anda berhasil keluar, Silahkan tunggu..').show();setTimeout(function(){window.location='../index.php';},3000);</script>";
?>