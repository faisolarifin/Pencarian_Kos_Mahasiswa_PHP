 function readImage(gambar,location){
 	for(i=0;i<gambar.files.length;i++){
	 	if(gambar.files && gambar.files[i]){
	 		var reader = new FileReader();
	 		reader.onload = function(e){
	 			$(location).html($(location).html() + "<img src='"+e.target.result+"' width='115' style='margin:0 10px 0 0;'>");
	 		}
	 		reader.readAsDataURL(gambar.files[i]);
	 	}
	 }
 }
function notifikasi(n){
	$('.notif').text(n).show();
	setTimeout(function(){$('.notif').hide()},5000);
}