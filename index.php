<?php 
include './kantor/koneksi.php';
$tambaht ='';
if(isset($_GET['cq'])){
	$tambaht = '&cq='.$_GET['cq'];
	
}

//fungsi refferal

function ref($get, $id,$db,$qre){
	
	$tmp_tomb ='';
	if($qre == true){
		$ref_no = substr_replace($qre['email'],'62',0,1);
		$tmp_tomb = '							<a href ="https://api.whatsapp.com/send?phone='.$ref_no.'&text=Assalamualaikum%2C+apakah+saya+bisa+pesan+hewan+qurban+ini+http%3A%2F%2Fshowroomqurban.com%2F%3Fq%3D'.$id.'">
														<button type="submit" class="btn btn-round btn-warning" name="idh" >
														<i class="material-icons">add_shopping_cart</i> Pesan
														</button> </a>
													
		';
		
	}else{
		$tmp_tomb ='
	<form method="POST">
													<div class="form-group label-floating">
														<label class="control-label">No HP/WA</label>
														<input type="text" class="form-control" name="wa">
													</div>
														<button type="submit" class="btn btn-round btn-warning" name="idh" value="'.$id
														.'">
														<i class="material-icons">add_shopping_cart</i> Pesan
														</button>
												</form>		
	';
	}	
	return($tmp_tomb);
}

//fungsi normal
function norm($id_hwn){
	$tmp_tomb ='
	<form method="POST">
													<div class="form-group label-floating">
														<label class="control-label">No HP/WA</label>
														<input type="text" class="form-control" name="wa">
													</div>
														<button type="submit" class="btn btn-round btn-warning" name="idh" value="'.$id_hwn
														.'">
														<i class="material-icons">add_shopping_cart</i> Pesan
														</button>
												</form>		
	';
	return $tmp_tomb;
}
//funsi panel 2 yg bawah
function ref1($get, $id,$db,$qre){
	
	$tmp_tomb ='';
	if($qre == true){
		$ref_no = substr_replace($qre['email'],'62',0,1);
		$tmp_tomb = '		<br/>	<span class="pull-left">	<br/><br/><br/>			<a href ="https://api.whatsapp.com/send?phone='.$ref_no.'&text=Assalamualaikum%2C+apakah+saya+bisa+pesan+hewan+qurban+ini+http%3A%2F%2Fshowroomqurban.com%2F%3Fq%3D'.$id.'">
														<button type="submit" class="btn btn-round btn-info btn-sm" name="idh" >
														<i class="material-icons">add_shopping_cart</i> PESAN 
													</button> </a></span>
													
		';
		
	}else{
		$tmp_tomb ='
	<form method="POST">
		<span class="pull-left">
											<div class="form-group label-floating">
								<label class="control-label">Masukan No HP/WA anda</label>
								<input type="text" class="form-control" name="wa">
							</div>
													<button type="submit" class="btn btn-round btn-info btn-sm" name="idh" value="'.$id.'">
														<i class="material-icons">add_shopping_cart</i> PESAN 
													</button>
											</span>	</form>
		';
	}	
	return($tmp_tomb);
}

//fungsi normal
function norm1($id_hwn){
	
	$tmp_tomb ='
	<form method="POST">
		<span class="pull-left">
											<div class="form-group label-floating">
								<label class="control-label">Masukan No HP/WA anda</label>
								<input type="text" class="form-control" name="wa">
							</div>
													<button type="submit" class="btn btn-round btn-info btn-sm" name="idh" value="'.$id_hwn.'">
														<i class="material-icons">add_shopping_cart</i> PESAN 
													</button>
											</span>	</form>
		';
	return $tmp_tomb;
}


//fungsi terjemah
function kat($kt){
	if ($kt == "DG"){
		$kat1 ='Domba Gemuk';
	}else if($kt == "DT"){
		$kat1 = 'Domba Tanduk';
	}else{
		$kat1 = 'Kambing';
	}
	return $kat1;
}
function kel($kl){
	if ($kl == "LK"){
		$kat1 ='Jantan';
	}else{
		$kat1 = 'Betina';
	}
	return $kat1;
}

//personalisasi halaman
if(isset($_GET['q'])){
	$hx ="single.php";
	$js ='';

//cek ada di db gak
$idny = abs((int)$_GET['q']);
$datak = mysql_fetch_array(mysql_query("SELECT * FROM `$db`.`hewan` WHERE `id_hwn` ='$idny'"));	
	if($datak['foto'] != false){
	$img = $datak['foto'];
	$stal = $datak['lunas'];
	if($stal != NULL){
		$statkm ='[SOLD]';
	}else{
		$statkm ='';
	}
	$jdl = kat($datak['kategori']).' '.$datak['kategori'].'-'.$datak['id_hwn'].' berat awal masuk '.$datak['berat'];

	$jdla = kat($datak['kategori']).' '.$datak['kategori'].'-'.$datak['id_hwn'];
	$bert = 'berat awal masuk '.$datak['berat'].' berjenis kelamin Jantan';
	$rp_k = 'Rp '.number_format($datak['harga_lama'],0).' '.$statkm;
	$alu = 'https://showroomqurban.com/?q='.$idny;
	}else{
	$hx ='home.php';
	$img = 'https://showroomqurban.com/oge.png';
	$jdl = 'Hewan Qurban adalah Kendaraan Akherat';

	$jdla = '';
	$bert = '';
	$rp_k = 'Pilih kendaraan akherat terbaik anda di Showroom Qurban';
	$alu = 'https://showroomqurban.com';
	}	
$oge ='
	<meta property="og:image" content="'.$img.'"/>
	<meta property="og:type" content="website"/>
	<meta property="og:title" content="'.$jdl.'"/>
	<meta property="og:description" content="'.$rp_k.'"/>
	<meta property="og:url" content="'.$alu.'"/>
	
	
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@showroomqurban">
	<meta name="twitter:title" content="'.$jdl.'">
	<meta name="twitter:description" content="'.$rp_k.'">
	<meta name="twitter:image" content="'.$img.'">

';	
	

}else{
$js ='<script type="text/javascript">
		$(document).ready(function(){
		
			'."$('#myModal').modal({
			  backdrop: 'static',
			  keyboard: false
			});
		});
	</script>";	
$hx ='home.php';	
$oge ='
	<meta property="og:image" content="https://showroomqurban.com/oge.png"/>
	<meta property="og:type" content="website"/>
	<meta property="og:title" content="Hewan Qurban adalah Kendaraan Akherat"/>
	<meta property="og:description" content="Pilih kendaraan akherat terbaik anda di Showroom Qurban"/>
	<meta property="og:url" content="https://showroomqurban.com"/>
	
	
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@showroomqurban">
	<meta name="twitter:title" content="Hewan Qurban adalah Kendaraan Akherat">
	<meta name="twitter:description" content="Pilih kendaraan akherat terbaik anda di Showroom Qurban">
	<meta name="twitter:image" content="https://showroomqurban.com/og280x150.jpg">
	<meta name="twitter:image:src" content="https://showroomqurban.com/og.jpg"/>
	<meta name="thumbnail" content="https://showroomqurban.com/og600x315.jpg"/>

';
}



//eksekusi order
$pesan='';
if(isset($_POST['wa'])){
	$idhw = $_POST['idh']; $nop = $_POST['wa'];
	if(strlen($nop) >= 10){
		$qur = mysql_query("SELECT * FROM `$db`.`parameter` WHERE `id_param` = '1'");
		$urut_mar = mysql_fetch_array($qur);
		$urutnya = explode(',',$urut_mar['fungsi1']);
		$max_urut = sizeOf($urutnya)-1;
		$next_urut =$urut_mar['fungsi2']+1;
		if($urut_mar['fungsi2'] >= $max_urut){
			mysql_query("UPDATE `$db`.`parameter` SET `fungsi2` = '0' WHERE `parameter`.`id_param` = '1'");	
			
		}else{
			mysql_query("UPDATE `$db`.`parameter` SET `fungsi2` = '$next_urut' WHERE `parameter`.`id_param` = '1'");
			
		}
		$nour = $urut_mar['fungsi2'];
		$urut_skrg = $urutnya[$nour];
		mysql_query("UPDATE `$db`.`hewan` SET `lunas` = 'keep', `dealer_view` = '$nop', `showroom_view` ='$urut_skrg' WHERE `hewan`.`id_hwn` = '$idhw';");
		$pesan='<div class="alert alert-success">
					<div class="container">
						<div class="alert-icon">
							<i class="material-icons">check</i>
						</div>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true"><i class="material-icons">clear</i></span>
						</button>
						<b>Terima Kasih</b> Anda telah memesan hewan qurban! Kami akan segera menghubungi anda
					</div>
				</div>';
		//kirim email-notif
		$qurm = mysql_query("SELECT * FROM `$db`.`parameter` WHERE `fungsi1` = '$urut_skrg'");
		$dt_mail = mysql_fetch_array($qurm);
		if($dt_mail['fungsi2'] != '0'){
			include 'mail1.php';
			surel($dt_mail['fungsi2'],$nop,$idhw);
		}
	}else{
		$pesan='<div class="alert alert-danger">
					<div class="container">
						<div class="alert-icon">
							<i class="material-icons">error_outline</i>
						</div>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true"><i class="material-icons">clear</i></span>
						</button>
						<b>Mohon Ulangi</b> Anda perlu memasukan no HP/WA yang benar sebelum menekan tombol "pesan"
					</div>
				</div>';
	}	
}



//cari jenis DG
function panelk($kdg, $db,$tambaht){

$dg_gb = $kdg['foto']; 
if($kdg['berat'] == '' OR is_null($kdg['berat'])){
	$berat ='';
}else{
	$berat ='Berat kambing saat awal masuk '.$kdg['berat'].',';
}
if (isset($_GET['cq'])){
	$get = $_GET['cq'];
	$qre = mysql_fetch_array(mysql_query("SELECT * FROM `$db`.`akses` WHERE `username` ='$get' AND `email` IS NOT NULL"));
	$tmb5 = ref($_GET['cq'],$kdg['id_hwn'], $db, $qre);
}else{
	$tmb5 = norm($kdg['id_hwn']);
}
$panel_dg ='
						<div class="col-md-4">

							<div class="card card-product card-plain card-rotate">
								<div class="rotating-card-container">
									<div class="card-image">
										<div class="front">
											<img class="img" src="'.$dg_gb.'"/>
										</div>

										<div class="back back-background">
											<div class="card-content">
												<h5 class="card-title">
													Pesan yang ini..
												</h5>
												<div class="footer text-center">
												'.$tmb5.'
												</div>
												<hr/>
												<p class="card-description">
													Atau anda bisa meminta saran teman-teman sosial anda
												</p>
												<a href="https://showroomqurban.com/?q='.$kdg['id_hwn'].$tambaht.'" class="btn btn-just-icon btn-round btn-white btn-twitter">
													<i class="fa fa-twitter"></i>
												</a>
												<a href="https://showroomqurban.com/?q='.$kdg['id_hwn'].$tambaht.'" class="btn btn-just-icon btn-round btn-white btn-pinterest">
													<i class="fa fa-pinterest"></i>
												</a>
												<a href="https://showroomqurban.com/?q='.$kdg['id_hwn'].$tambaht.'" class="btn btn-just-icon btn-round btn-white btn-facebook">
													<i class="fa fa-facebook"></i>
												</a>
											</div>
										</div>
									</div>
								</div>

								<div class="card-content">
									<h4 class="card-title">
										<a href="https://showroomqurban.com/?q='.$kdg['id_hwn'].$tambaht.'">'.kat($kdg['kategori']).' '.$kdg['kategori'].'-'.$kdg['id_hwn'].'</a>
									</h4>
									<p class="card-description">'.$berat.' berjenis kelamin '.kel($kdg['kelamin']).'. <i class="text-warning">Klik gambar untuk memesan hewan qurban ini</i></p>
									<div class="footer">
										<div class="price-container">
											
                                           	<span class="price price-new"> Rp '.number_format($kdg['harga_lama'],0).'</span>
										</div>
										<div class="stats">
											<button type="button" rel="tooltip" title="" class="btn btn-just-icon btn-simple btn-rose" data-original-title="Saved to Wishlist">
 											   <i class="material-icons">favorite</i>
 										   </button>
										</div>
                                    </div>
								</div>
							</div>
                        </div>

';
return $panel_dg;
}
//fiterisasi
$k =''; $uk=''; $k1=''; $udt=''; $k2 =''; $udg =''; $pgt='';

if(isset($_GET['filter'])){

	$pgt = '&filaw='.$_GET['filaw'].'&filak='.$_GET['filak'].'&filter='; //
								$awl = explode(" ",$_GET['filaw']);
								$akh = explode(" ",$_GET['filak']);
								//echo $awl[1].'-'.$akh[1];
							}

//buat panel bawah
$halaman = 3; //batasan halaman
$page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$query = mysql_query("SELECT * FROM `$db`.`hewan` ORDER BY `hewan`.`no` DESC LIMIT $mulai, $halaman");
$sql = mysql_query("SELECT * FROM `$db`.`hewan` ORDER BY `hewan`.`no` DESC");
$total = mysql_num_rows($sql);
$pages = ceil($total/$halaman); 
$hal =''; $halis ='';
if(isset($_GET['halaman'])){
	$lm =$_GET['halaman'];
}else{
	$lm =1;
}
for ($i=1; $i<=$pages ; $i++){ 
$ak ='';
if($i == $lm){
	$ak ='class="active"';
}
 $ihal ='<li '.$ak.'><a href="?halaman='.$i.$pgt.$tambaht.'">'.$i.'</a></li>';
 $hal = $hal.$ihal;
 } 
 if (isset($_GET['halaman'])){
	 $hlmn =$_GET['halaman'];
	 $pre = $hlmn -1;
	 $nex = $hlmn+1;
	 
 }else{
	$pre = 1; $nex = 2;
 }
//halaman perlu revisi saat filter 
 $pegi = '<ul class="pagination pagination-info">
								<li><a href="./?halaman='.$pre.$pgt.'"> prev</a></li>
								'.$hal.'
								<li><a href="./?halaman='.$nex.$pgt.'">next </a></li>
		                    </ul>';
							
while ($isi = mysql_fetch_array($query)){
	if($isi['berat'] == '' OR is_null($isi['berat'])){
	$berat ='';
	}else{
	$berat ='Berat kambing saat awal masuk '.$isi['berat'].',';
	}
	if(is_null($isi['lunas'])){
		if (isset($_GET['cq'])){
			$get1 = $_GET['cq'];
			$qre1 = mysql_fetch_array(mysql_query("SELECT * FROM `$db`.`akses` WHERE `username` ='$get1' AND `email` IS NOT NULL"));
			$tmb50 = ref1($_GET['cq'],$isi['id_hwn'], $db, $qre1);
		}else{
			$tmb50 = norm1($isi['id_hwn']);
		}
		$tombol = $tmb50;
		
	}else{
	$tombol = '<span class="pull-left"><br><br><br>
	<button class="btn btn-social btn-fill btn-pinterest">
	                			<i class="fa fa-check"></i> SOLD OUT
	                		</button></span>
	';
	}
	$koni ='
	<div class="col-md-4">
	   							 <div class="card card-product card-plain no-shadow" data-colored-shadow="false">
	   								 <div class="card-image">
									 
	   									 <a href="https://showroomqurban.com/?q='.$isi['id_hwn'].$tambaht.'">
	   										 <img src="'.$isi['foto'].'" alt="Showroom qurban"/>
											<div class="card-title">
	    									<i class="material-icons">search</i> klik untuk detail
	    									</div>
	   									 </a>
	   								 </div>
	   								 <div class="card-content">
	   									 <a href="https://showroomqurban.com/?q='.$isi['id_hwn'].$tambaht.'">
	   										 <h4 class="card-title">'.kat($isi['kategori']).' '.$isi['kategori'].'-'.$isi['id_hwn'].'</h4>
	   									 </a>
	   									 <p class="description">
	   										'.$berat.' berjenis kelamin '.kel($isi['kelamin']).'
	   									 </p><div class="price-container">
											 	<span class="price pull-left"> Rp '.number_format($isi['harga_lama'],0).'</span>
											 </div>
	   									 <div class="footer">
											 '.$tombol.'

	   										 
											 
	   									 </div>
	   								 </div>
	   							 </div> <!-- end card -->
	   						  </div>
	   						  ';
	$halis = $halis.$koni;
}	
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="favicon-i.png">
	<link rel="icon" type="image/png" href="favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="theme-color" content="#376cb3" />
	
	<meta name="keywords" content="qurban, kambing, qurban tangerang, tangerang, gharar, qurban gharar, kambing gharar, anti gharar">
	<meta http-equiv="content-language" content="In-Id"/>
	<meta name="geo.placename" content="Indonesia"/>
	<?php 
	echo $oge;
	?>
	<title>Beli Kambing Qurban tanpa Gharar!</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!-- Canonical SEO -->
	<link rel="canonical" href="https://showroomqurban.com/" />
	
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/material-kit.min.css_v=1.1.1.css" rel="stylesheet"/>
	<script>
	!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
	n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
	document,'script','https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '680251928839267'); 
	fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=680251928839267&ev=PageView&noscript=1"
	/></noscript>
	<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-71307004-4', 'auto');
      ga('send', 'pageview');
    
    </script>
</head>

<body class="ecommerce-page">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10&appId=1384555651591415";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<nav class="navbar navbar-info navbar-transparent navbar-fixed-top navbar-color-on-scroll" color-on-scroll="100" id="sectionsNav">
    	<div class="container">
        	<!-- Brand and toggle get grouped for better mobile display -->
        	<div class="navbar-header">
        		<button type="button" class="navbar-toggle" data-toggle="collapse">
            		<span class="sr-only">Menu</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
        		</button>
        		<a class="navbar-brand" href="/?<?php echo "$tambaht";?>">HOME</a>
        	</div>

        	</div>
    </nav>

	<div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('./assets/img/examples/ecommerce-tips21.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="brand">
						<h1 class="title">SHOWROOM QURBAN</h1>
						<h4> Karena hewan <b>qurban</b> adalah tunggangan akherat anda!</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
if(isset($_GET['art'])){
	if($_GET['art'] == 'why'){
		include 'art1.php';
	}else if($_GET['art'] == 'deliver'){
		include 'art2.php';
	}else{
		include 'art3.php';
	}	
}else{
	include $hx;
}
?>
	<footer class="footer footer-black footer-big">
		<div class="container">

			<div class="content">
				<div class="row">
					<div class="col-md-4">
						<h5>About Us</h5>
						<p>Karena hewan qurban adalah kendaraan akherat kita, yuk pilih hewan qurban terbaik di Showroom Qurban. Dapatkan layanan gratis biaya jasa sembelih dan cashback untuk anda yang memenuhi syarat dan ketentuan dari kami.</p>
					</div>

					<div class="col-md-4">
						<h5>Order via WhatsApp</h5>
						<div class="social-feed">
							<div class="feed-line">
							<a href ="https://api.whatsapp.com/send?phone=628567909136&text=Assalamualaikum%2C+apakah+saya+bisa+pesan+hewan+qurban">
								<i class="fa fa-whatsapp"></i>
								<p>NISA | 08567909136</p>
								</a>
							</div>
							<div class="feed-line">
							<a href ="https://api.whatsapp.com/send?phone=6285888777079&text=Assalamualaikum%2C+apakah+saya+bisa+pesan+hewan+qurban">					
								<i class="fa fa-whatsapp"></i>
								<p>NOVI | 085888777079</p></a>
							</div>
							<div class="feed-line">
							<a href ="https://api.whatsapp.com/send?phone=62812851412&text=Assalamualaikum%2C+apakah+saya+bisa+pesan+hewan+qurban">					
								<i class="fa fa-whatsapp"></i>
								<p>MARFUDI | 0812851412</p></a>
							</div>
						</div>
					
						<div class="social-feed">
							<div class="feed-line">
							<a href ="https://api.whatsapp.com/send?phone=6285691549710&text=Assalamualaikum%2C+apakah+saya+bisa+pesan+hewan+qurban">
								<i class="fa fa-whatsapp"></i>
								<p>RAGIL | 085691549710</p>
								</a>
							</div>
							<div class="feed-line">
							<a href ="https://api.whatsapp.com/send?phone=6285654469292&text=Assalamualaikum%2C+apakah+saya+bisa+pesan+hewan+qurban">					
								<i class="fa fa-whatsapp"></i>
								<p>RISNA | 085654469292</p></a>
							</div>
							<div class="feed-line">
							<a href ="https://api.whatsapp.com/send?phone=6285880345289&text=Assalamualaikum%2C+apakah+saya+bisa+pesan+hewan+qurban">					
								<i class="fa fa-whatsapp"></i>
								<p>IMAM | 085880345289</p></a>
							</div>
						</div>
					</div>

					<div class="col-md-4">
					<h5>Alamat Showroom</h5>
						<div class="social-feed">
							<div class="feed-line">
							<a href="https://goo.gl/maps/sqCKrWC2X3R2">
    							<i class="material-icons" style="font-size:48px;">pin_drop</i>
    						
								<p> Jl Diklat Pemda (arah pasar Curug),
                                    Sukabakti RT 02/01 no 26,
                                    Curug - Kab Tangerang
    							</p>
    						</a>
    		        	</div>
					</div>
				</div>
			</div>


			<hr />

			<ul class="pull-left">
				
				<li>
					<a href="./?art=why">
						Kenapa ShowroomQurban?
					</a>
				</li>
				<li>
					<a href="./?art=deliver">
					   Pengantaran
					</a>
				</li>
				<li>
					<a href="./?art=sq">
						Sebar Qurban
					</a>
				</li>
				<li>
					<a href="#">
						Showroom I
					</a>
				</li>
			</ul>

			<div class="copyright pull-right">
				Copyright &copy; <script>document.write(new Date().getFullYear())</script> Tim DTS JKT - All Rights Reserved.
			</div>
		</div>
	</footer>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title"><strong>Sold Out sejak H-2 Idul Adha</strong> </h4>
			</div>
			<div class="modal-body text-center">
				
				<div class="fb-page" data-href="https://www.facebook.com/infoqurban" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-hide_cta="true" ><blockquote cite="https://www.facebook.com/infoqurban" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/infoqurban">Qurban Kendaraan Akherat</a></blockquote></div>
			</div>
			<div class="modal-footer">
				
			</div>
		</div>
	</div>
</div>

</body>

	<!--   Core JS Files   -->
	<script src="./assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="./assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="./assets/js/material.min.js"></script>
	<script src="./assets/js/bootstrap-tagsinput.js"></script>
	<script src="./assets/js/atv-img-animation.js" type="text/javascript"></script> 
	<script src="./assets/js/nouislider.min.js" type="text/javascript"></script>
	
		<script src="./assets/js/material-kit.min.js_v=1.1.1" type="text/javascript"></script>

	<?php echo $js;?>
</html>
