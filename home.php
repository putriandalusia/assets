
    <div class="main main-raised">
        <div class="section">
               <div class="container">
			   <?php 	echo $pesan;	   
			   ?>
                   <h2 class="section-title">Pilih Hewan Qurban</h2>
                   <div class="row">
				   
                        <?php
						$qdg = mysql_query("SELECT * FROM `$db`.`hewan` WHERE `lunas` IS NULL AND `kategori` = 'DG' ORDER BY `hewan`.`no` ASC");
						$kdg = mysql_fetch_array($qdg);
						echo panelk($kdg, $db, $tambaht); ?>
                        
						<?php 
						$qdg1 = mysql_query("SELECT * FROM `$db`.`hewan` WHERE `lunas` IS NULL AND `kategori` = 'DT' ORDER BY `hewan`.`no` ASC");
						$kdg1 = mysql_fetch_array($qdg1);
						echo panelk($kdg1, $db, $tambaht); ?>
                        
						<?php 
						$qdg2 = mysql_query("SELECT * FROM `$db`.`hewan` WHERE `lunas` IS NULL AND `kategori` = 'K' ORDER BY `hewan`.`no` ASC");
						$kdg2 = mysql_fetch_array($qdg2);
						echo panelk($kdg2, $db,$tambaht); ?>
                      
                   </div>
               </div>
        </div><!-- section -->

        <div class="section">
            <div class="container">
				<h2 class="section-title">Pilih Hewan Terbaik Anda</h2>
				<div class="row">
				
					<div class="col-md-9">
	   					<div class="row">
						<?php echo $halis ;?>
	   					
						<div class="col-md-8 col-md-offset-2">
	   							   <?php echo $pegi;?>
	   						  </div>
	   					</div>
	   				</div>
	<?php 
	$listhe = '';
	$sqll = mysql_query("SELECT `harga_lama`,`id_hwn`,`berat`,`kategori` FROM `$db`.`hewan` WHERE `lunas` IS NULL ORDER BY `hewan`.`no` ASC");
	while($listh = mysql_fetch_array($sqll)){
		$katl = $listh['kategori'].'-'.$listh['id_hwn'];
		$berll= $listh['berat']; 
		
		$listn ='
										<tr>
											<td class="text-info">Rp '.number_format($listh['harga_lama'],0).'</td>
											<td>'.$berll.'</td>
											<td class="td-actions"><a href="https://showroomqurban.com/?q='.$listh['id_hwn'].$tambaht.'" rel="tooltip" class="btn btn-info">
		                                            <i class="material-icons">camera_alt</i>
		                                        </a> '.$katl.' 
												</td>
										</tr>
		';
		$listhe = $listhe.$listn;
		
	}
	?>				
					<div class="col-md-3">
						<h6>PROMO HARI INI</h6>
						<div class="alert alert-info">
	            <div class="container">
					<div class="alert-icon">
						<i class="material-icons">info_outline</i>
					</div>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true"><i class="material-icons">clear</i></span>
					</button>

	            	<b>Berat</b> adalah kg awal masuk
	            </div>
	        </div>
						
		                        <div class="table-responsive">
		                        <table class="table table-striped">
		                            <thead>
		                                <tr>
		                                    <th class="text-center">HARGA</th>
		                                    <th>KG*</th>
		                                    <th>HEWAN</th>
		                                    
		                                </tr>
		                            </thead>
		                            <tbody>
		                                <?php echo $listhe;?>
									</tbody>
								</table>	
									</div>	
					</div>

				</div>
	</div>
        </div><!-- section -->

	</div> <!-- end-main-raised -->
