<style type="text/css">
	.home > a {
		color: #000;
	}
</style>
<h3><center>Graficos</center></h3>
<div class="row">
	<?php 
       for($i = 0; $i< sizeof($info_template['card_titulo']);$i++){
       		echo 
       			'<div class="home col-xl-3 col-md-6 mb-4">
	       			<a href="'.BASE_URL.$info_template['card_caminho'][$i].'">
	       				<div class="card h-100">
	       					<div class="card-body">
	   							<div class="row no-gutters align-items-center">
	   								<div class="col-auto">
	   									<img src="'.BASE_URL.$info_template['card_img'][$i].'" class="img-responsive" height="60" width="60">
	   									<span>'.$info_template['card_titulo'][$i].'</span>
	   								</div>
								</div>
							</div>
						</div>
					</a>
				</div>';
        	
        }    

                             
 	?>
</div>
