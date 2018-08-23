<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit/Batal Order </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
	<?php	
	//aksi ubah
	if(isset($_POST['ubah'])){
		$idh = $_POST['ubah']; 
		$pml = $_POST['pml'];
		$almt = $_POST['alm'];
		mysql_query("UPDATE `$db`.`hewan` SET `pemilik` = '$pml', `alamat` = '$almt' WHERE `hewan`.`id_hwn` = '$idh';");
	}
		//aksi batal
	if(isset($_POST['batal'])){
		$idh = $_POST['batal']; 
		$pml = $_POST['pml'];
		$almt = $_POST['alm'];
		mysql_query("UPDATE `$db`.`hewan` SET `pemilik` = NULL, `alamat` = NULL, `lunas`= NULL WHERE `hewan`.`id_hwn` = '$idh';");
	}
	
	//query cari
	$panel ='';
	if(isset($_GET['lihat'])){
		$order = $_GET['lihat'];
		//klo ada di db
		$qc = mysql_query("SELECT * FROM `$db`.`hewan` WHERE `id_hwn` = '$order' AND `lunas` IS NOT NULL");
		$dc = mysql_fetch_array($qc);
		$tbd ='';
		if(is_null($dc['dealer_view'])){
			$tb = ' disabled ';
		}
		if($dc['id_hwn']){
			if($dc['showroom_view'] == $nm_us){ //cocokin pemillik
				
			$panel ='
					<div class="col-lg-4">
						<div class="panel panel-info">
							<div class="panel-heading">
								'.$dc['kategori'].'-'.$dc['id_hwn'].' 
								
						   </div>
							<div class="panel-body">
								<dl class="dl-horizontal">
								<h6>
									<dt>'.$dc['dealer_view'].'</dt>
									<dd><p class="text-success">Kontak</p></dd>
								</h6>    
								</dl>
								<form method="POST" action="?act=kensel" >
								<input type="hidden" name="kensel" value="'.$dc['id_hwn'].'"/>
								<input type="hidden" name="act" value="kensel"/>
								<div class="form-group has-success">
								
									<label class="control-label" for="inputSuccess">Nama Pemilik</label>
									<input type="text" class="form-control" id="ktk" name="pml" value="'.$dc['pemilik'].'"'.$tbd.'>
											</div>
								<div class="form-group">
												<label>Alamat Kirim</label>
												<textarea class="form-control" rows="3" id="ktk1" name="alm" value="'.$dc['alamat'].'">'.$dc['alamat'].'</textarea>
											</div>			
							</div>
							<div class="panel-footer">
								<button type="submit" class="btn btn-outline btn-success" id="ktk2" name="ubah" value="'.$dc['id_hwn'].'">Edit</button> 
								
								<button type="submit" class="btn btn-outline btn-danger pull-right" id="ktk4" name="batal" value="'.$dc['id_hwn'].'">Batal Order</button>
							</div>
							</form>
							<img class="img-responsive" src="http://192.168.1.152/qurban2/assets/img/examples/kamb4.jpg" alt="showroom qurban">
						</div>
				</div>	';	
			}
			
		}else{
			$panel =''; //jika record g ada
		}
	}
		
				
		$cari ='		
				<div class="col-lg-8">
                    <div class="panel panel-info">
                        
                        <div class="panel-body">
						<form method="GET" >
						<input type="hidden" name="act" value="kensel"/>
                            <div class="form-group input-group">
                                            <input type="text" class="form-control" name="lihat">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>			
                        </div>
                        <div class="panel-footer">
                            Lihat Hewan Qurban
                        </div>
                    </div>
                </div>';
	echo $panel.$cari;			
	?>			
			</div>