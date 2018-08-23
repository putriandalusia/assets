<?php
if(isset($_GET['act'])){
	if($_GET['act'] == "logout"){
		session_destroy();
		header('location: ./login.php?error=sesiexp');
	}
}
if(isset($_SESSION["otoritas"])){
	$passw1 = $_SESSION['otoritas'];
	$q_det1 = mysql_query(" SELECT * FROM `$db`.`akses` WHERE `password` LIKE '$passw1'");
	$ck = mysql_fetch_array($q_det1);
	if($ck){
		$nm_user = $ck['nama'];
		$_SESSION["nama"] = $nm_user;
		$ak_user = $ck['akses'];
		$_SESSION["akses"] = $ak_user;
		if($nm_user == ''){
			header('location: ./login.php?error=no_user');
		}
	}else{
		header('location: ./login.php?error=database');
	}	
}else{
	header('location: ./login.php?error=sesiexp');
}
?>