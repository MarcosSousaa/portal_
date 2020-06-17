<?php 

class Producao extends Model{
	public function getListProducao($data1,$data2,$ext,$turno){
		try {
			$sql = "SELECT operador.operador, producao.* FROM producao INNER JOIN operador ON producao.operador_fk = operador.id WHERE ";
			$where = array();
			if(!empty($data1) && !empty($data2)){
				$where[] = "producao.data_prod BETWEEN :data1 AND :data2";
			}
			if(!empty($ext)){
				$where[] = "producao.extrusora = :ext";
			}
			if(!empty($turno)){
				$where[] = "producao.turno = :turno";
			}
			$sql .= implode(' AND ', $where);
			$sql .= ' ORDER BY producao.data_prod,producao.hri,producao.hrf';	
			$stmt = $this->db->prepare($sql);
			if(!empty($data1) && !empty($data2)){
				$stmt->bindParam(':data1',$data1);
				$stmt->bindParam(':data2',$data2);
			}
			if(!empty($ext)){
				$stmt->bindParam(':ext',$ext);
			
			}
			if(!empty($turno)){
				$stmt->bindParam(':turno',$turno);
			
			}			
			$stmt->execute();
			if($stmt->rowCount () > 0){
				return $stmt->fetchAll();
			}			
		} catch (Exception $e) {
			echo $e->getMessage();
			exit;
					
		}		
	}

	
	public function getInfoProducao($id){
		try {
			$array = array();
			$sql = "SELECT operador.operador, producao.* FROM producao INNER JOIN operador ON producao.operador_fk = operador.id WHERE producao.id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":id", $id);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$array = $stmt->fetch();
				$array['situacaoini'] = $array['situini'];
				if($array['situacaoini'] == '2'){
			        $array['situacaoini'] = 'Reprovado';
			    }
			    if($array['situacaoini'] == '1'){
			        $array['situacaoini'] = 'Aprovado';
			    }
				$array['situacaofim'] = $array['situfim'];
				if($array['situacaofim'] == '2'){
			        $array['situacaofim'] = 'Reprovado';
			    }
			    if($array['situacaofim'] == '1'){
			        $array['situacaofim'] = 'Aprovado';
			    }
			}
			return $array;	
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}	
	public function addProducao($data_prod,$ext,$turno,$operador,$hrini,$aprovacaoini,$pedido,$ordem,$lote,$rpm,$peso,$qtd,$total,$larg,$esp,$metrag,$hrfim,$data_f,$aprovacaofim,$iduser){
		try {
			$peso = str_replace(",", ".", $peso);
			$total = str_replace(",", ".", $total);
			$apara = str_replace(",", ".", $apara);
			$refile = str_replace(",", ".", $refile);
			$metrag = str_replace(",", ".", $metrag);
			$larg = (isset($larg) && !empty($larg)) ? $larg : '0'; 
			$esp =(isset($esp) && !empty($esp)) ? $esp : '0'; 
			$metrag =(isset($metrag) && !empty($metrag)) ? $metrag : '0';
			$rpm = (isset($rpm) && !empty($rpm)) ? $rpm : '0.00';
			$larg = str_replace(".", "", $larg);
			$larg = str_replace(",", ".", $larg);
			$esp = str_replace(".", "", $esp);
			$esp = str_replace(",", ".", $esp);
			$metrag = str_replace(".", "", $metrag);
			$metrag = str_replace(",", ".", $metrag);			

			$sql = "INSERT INTO producao SET data_prod = :data_prod, extrusora = :extrusora, turno = :turno, operador_fk = :operador, hri = :hrini, situini = :aprovacaoini, pedido = :pedido, ordem = :ordem, lote = :lote, rpm = :rpm, pesobob = :peso, qtdbob = :qtd, totalbob = :total, larg = :larg, esp = :esp, metrag = :metrag, hrf = :hrfim, data_f = :data_f, situfim = :aprovacaofim, TIMESTAMP = NOW(), id_user = :id_user;";
			$iduser = md5($iduser);
			$stmt = $this->db->prepare($sql);			
			$stmt->bindParam(":data_prod",$data_prod);
			$stmt->bindParam(":extrusora",$ext);
			$stmt->bindParam(":turno",$turno);
			$stmt->bindParam(":operador",$operador);
			$stmt->bindParam(":hrini",$hrini);
			$stmt->bindParam(":aprovacaoini",$aprovacaoini);
			$stmt->bindParam(":pedido",$pedido);
			$stmt->bindParam(":ordem",$ordem);
			$stmt->bindParam(":lote",$lote);
			$stmt->bindParam(":rpm",$rpm);
			$stmt->bindParam(":peso",$peso);
			$stmt->bindParam(":qtd",$qtd);
			$stmt->bindParam(":total",$total);
			$stmt->bindParam(":larg",$larg);
			$stmt->bindParam(":esp",$esp);
			$stmt->bindParam(":metrag",$metrag);			
			$stmt->bindParam(":hrfim",$hrfim);
			$stmt->bindParam(":data_f",$data_f);
			$stmt->bindParam(":aprovacaofim",$aprovacaofim);
			$stmt->bindParam(":id_user",$iduser);		
			$stmt->execute();			
		} catch (Exception $e) {
			echo $e->getMessage();			
		}		
	}

	public function updateProducao($data_prod,$hrini,$aprovacaoini,$pedido,$ordem,$lote,$rpm,$peso,$qtd,$total,$larg,$esp,$metrag,$hrfim,$data_f,$aprovacaofim,$sobrabob,$sobrabobkg,$user,$id){
		try {					
			$peso = str_replace(".", ",", $peso);
			$peso = str_replace(",", ".", $peso);			
			$total = str_replace(",", ".", $total);
			$larg = str_replace(".", "", $larg);
			$larg = str_replace(",", ".", $larg);
			$esp = str_replace(".", "", $esp);
			$esp = str_replace(",", ".", $esp);
			$metrag = str_replace(".", "", $metrag);
			$metrag = str_replace(",", ".", $metrag);			
			$sobrabob = (isset($sobrabob) && !empty($sobrabob)) ? $sobrabob : '0'; 
			$sobrabobkg = (isset($sobrabobkg) && !empty($sobrabobkg)) ? $sobrabobkg : '0.000';
			$sobrabobkg = str_replace(",", ".", $sobrabobkg); 
			$sql = "UPDATE producao SET data_prod = :data_prod, hri = :hrini, situini = :aprovacaoini, pedido = :pedido, ordem = :ordem, lote = :lote, rpm = :rpm, pesobob = :peso, qtdbob = :qtd, totalbob = :total,larg = :larg, esp = :esp,metrag = :metrag, perdabob = :perdabob, perdakg = :perdakg, hrf = :hrfim, data_f = :data_f, situfim = :aprovacaofim, TIMESTAMP = NOW(), user_edit = :user WHERE id = :id;";
			$user = md5($user);
			$stmt = $this->db->prepare($sql);			
			$stmt->bindParam(":data_prod", $data_prod);						
			$stmt->bindParam(":hrini", $hrini);			
			$stmt->bindParam(":aprovacaoini", $aprovacaoini);			
			$stmt->bindParam(":pedido", $pedido);			
			$stmt->bindParam(":ordem", $ordem);			
			$stmt->bindParam(":lote", $lote);			
			$stmt->bindParam(":rpm", $rpm);			
			$stmt->bindParam(":peso", $peso);			
			$stmt->bindParam(":qtd", $qtd);			
			$stmt->bindParam(":total", $total);			
			$stmt->bindParam(":larg", $larg);
			$stmt->bindParam(":esp", $esp);
			$stmt->bindParam(":metrag", $metrag);						
			$stmt->bindParam(":hrfim", $hrfim);			
			$stmt->bindParam(":data_f", $data_f);			
			$stmt->bindParam(":aprovacaofim", $aprovacaofim);			
			$stmt->bindParam(":perdabob", $sobrabob);			
			$stmt->bindParam(":perdakg", $sobrabobkg);
			$stmt->bindParam(":user", $user);						
			$stmt->bindParam(":id", $id);							
			$stmt->execute();						
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}


	public function getListPerda($data1,$data2,$departamento,$maq,$turno){
		try {
			$sql = "SELECT perda.* FROM perda WHERE ";
			$where = array();
			if(!empty($data1) && !empty($data2)){
				$where[] = "perda.data_perd BETWEEN :data1 AND :data2";
			}
			if(!empty($departamento)){
				$where[] = "perda.departamento = :dep";
			}
			if(!empty($maq)){
				$where[] = "perda.maquina = :maq";
			}
			if(!empty($turno)){
				$where[] = "perda.turno = :turno";
			}
			$sql .= implode(' AND ', $where);
			$sql .= ' ORDER BY perda.data_perd';	
			$stmt = $this->db->prepare($sql);
			if(!empty($data1) && !empty($data2)){
				$stmt->bindParam(':data1',$data1);
				$stmt->bindParam(':data2',$data2);
			}
			if(!empty($departamento)){
				$stmt->bindParam(':dep',$departamento);
			
			}
			if(!empty($maq)){
				$stmt->bindParam(':maq',$maq);
			
			}
			if(!empty($turno)){
				$stmt->bindParam(':turno',$turno);
			
			}						
			$stmt->execute();

			if($stmt->rowCount () > 0){
				return $stmt->fetchAll();
			}
			else{
				return null;
			}			
		} catch (Exception $e) {
			echo $e->getMessage();
			exit;
					
		}		
	}

	public function getInfoPerda($id){
		try {
			$array = array();
			$sql = "SELECT perda.* FROM perda WHERE perda.id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":id", $id);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$array = $stmt->fetch();
			}
			return $array;	
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}	

	public function addPerda($data_perda,$turno,$departamento,$maquina,$produto,$apara,$refile,$borra,$acabamento,$qtdparada,$tempoparada,$oc,$iduser){
		try {
			$apara = (isset($apara) && !empty($apara)) ? $apara : '0.000'; 
			$refile = (isset($refile) && !empty($refile)) ? $refile : '0.000'; 
			$borra = (isset($borra) && !empty($borra)) ? $borra : '0.000'; 
			$acabamento = (isset($acabamento) && !empty($acabamento)) ? $acabamento : '0.000'; 
			$apara = str_replace(",", ".", $apara);
			$refile = str_replace(",", ".", $refile);
			$borra = str_replace(",", ".", $borra);
			$acabamento = str_replace(",", ".", $acabamento);
			$maquina = (isset($maquina) && !empty($maquina)) ? $maquina : ''; 
			$oc = (isset($oc) && !empty($oc)) ? implode(",", $oc) : '';	
			$qtdparada = (isset($qtdparada) && !empty($qtdparada)) ? $qtdparada : '0';
			$tempoparada = (isset($tempoparada) && !empty($tempoparada)) ? $tempoparada : '';			
			$sql = "INSERT INTO perda SET data_perd = :data_perda, turno = :turno,departamento = :departamento, maquina = :maquina, produto = :produto, apara = :apara, refile = :refile, borra = :borra, acabamento = :acabamento, qtdparada = :qtdparada, tempoparada = :tempoparada,oc = :oc, TIMESTAMP = NOW(), id_user = :id_user;";
			$iduser = md5($iduser);
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":data_perda",$data_perda);			
			$stmt->bindParam(":turno",$turno);
			$stmt->bindParam(":departamento",$departamento);
			$stmt->bindParam(":maquina",$maquina);
			$stmt->bindParam(":produto",$produto);
			$stmt->bindParam(":apara",$apara);
			$stmt->bindParam(":refile",$refile);
			$stmt->bindParam(":borra",$borra);
			$stmt->bindParam(":acabamento",$acabamento);
			$stmt->bindParam(":qtdparada",$qtdparada);
			$stmt->bindParam(":tempoparada",$tempoparada);
			$stmt->bindParam(":oc",$oc);	
			$stmt->bindParam(":id_user",$iduser);						
			$stmt->execute();
		} catch (Exception $e) {
			echo $e->getMessage();			
		}		
	}

	public function updatePerda($apara,$refile,$borra,$acabamento,$qtdparada,$tempoparada,$oc,$id){
		try {			
			$oc = (isset($oc) && !empty($oc)) ? implode(",", $oc) : '';	
			$qtdparada = (isset($qtdparada) && !empty($qtdparada)) ? $qtdparada : '';
			$tempoparada = (isset($tempoparada) && !empty($tempoparada)) ? $tempoparada : '';
			$apara = str_replace(",", ".", $apara);
			$refile = str_replace(",", ".", $refile);
			$borra = str_replace(",", ".", $borra);
			$acabamento = str_replace(",", ".", $acabamento);						
			$sql = "UPDATE perda SET apara = :apara, refile = :refile, borra = :borra, acabamento = :acabamento, qtdparada = :qtdparada, tempoparada = :tempoparada, oc = :oc, TIMESTAMP = NOW() WHERE id = :id;";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":apara", $apara);
			$stmt->bindParam(":refile", $refile);
			$stmt->bindParam(":borra", $borra);
			$stmt->bindParam(":acabamento", $acabamento);	
			$stmt->bindParam(":qtdparada",$qtdparada);
			$stmt->bindParam(":tempoparada",$tempoparada);
			$stmt->bindParam(":oc",$oc);				
			$stmt->bindParam(":id", $id);			
			$stmt->execute();	
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function getReportProducao($data1,$data2,$pedido,$turno,$lote,$ext){
		try {
			$sql = 
				" SELECT
					producao.data_prod,
					producao.extrusora,
				    operador.operador,
				    producao.turno,
				    producao.hri,
				    producao.pedido,
				    producao.ordem,
				    producao.lote,
				    producao.pesobob,
				    producao.qtdbob,
				    producao.totalbob,
				    producao.larg,
				    producao.esp,
				    producao.metrag,
				    producao.data_f,
				    producao.hrf
				FROM producao
				INNER JOIN operador ON producao.operador_fk = operador.id
				WHERE ";
			$where = array();
			if(!empty($data1) && !empty($data2)){
				$where[] = "producao.data_prod BETWEEN :data1 AND :data2";
			}
			if(!empty($pedido)){
				$where[] = "producao.pedido = :pedido ";
			}
			if(!empty($turno)){
				$where[] = "producao.turno = :turno";
			}
			if(!empty($lote)){
				$where[] = "producao.lote = :lote";
			}
			if(!empty($ext)){
				$where[] = "producao.extrusora = :ext";
			}
		 	$sql .= implode(' AND ', $where);
		 	$sql .= ' ORDER BY producao.data_prod,producao.hri';
	 		$stmt = $this->db->prepare($sql);
	 		if(!empty($data1) && !empty($data2)){
				$stmt->bindParam(":data1", $data1);
				$stmt->bindParam(":data2", $data2);	
			}
			if(!empty($pedido)){
				$stmt->bindParam(":pedido", $pedido);		
			}
			if(!empty($turno)){
				$stmt->bindParam(":turno", $turno);
			}
			if(!empty($lote)){
				$stmt->bindParam(":lote", $lote);
			}
			if(!empty($ext)){
				$stmt->bindParam(":ext", $ext);
			}			
			$stmt->execute();
		  	if($stmt->rowCount() > 0){		  		
            	return $stmt->fetchAll();
        	}
        	return null;		 	
			} catch (Exception $e) {
				echo $e->getMessage();	
			}	
	}

	public function getReportPerda($data1,$data2,$turno,$dep,$maq){
		try {
			$sql = 
				" SELECT
					perda.data_perd,
					perda.departamento,				    
				    perda.turno,
				    perda.maquina,
				    perda.produto,
				    perda.apara,
				    perda.refile,
				    perda.borra,
				    perda.acabamento,
				    perda.qtdparada,
				    perda.tempoparada,
				    perda.oc				    
				FROM perda				
				WHERE ";
			$where = array();
			if(!empty($data1) && !empty($data2)){
				$where[] = "perda.data_perd BETWEEN :data1 AND :data2";
			}
			if(!empty($turno)){
				$where[] = "perda.turno = :turno ";
			}	
			if(!empty($dep)){
				$where[] = "perda.departamento = :dep ";
			}
			if(!empty($maq)){
				$where[] = "perda.maquina = :maq ";
			}		
		 	$sql .= implode(' AND ', $where);
		 	$sql .= ' ORDER BY perda.data_perd,perda.turno';	
	 		$stmt = $this->db->prepare($sql);
	 		if(!empty($data1) && !empty($data2)){
				$stmt->bindParam(":data1", $data1);
				$stmt->bindParam(":data2", $data2);	
			}
			if(!empty($turno)){
				$stmt->bindParam(":turno", $turno);		
			}			
			if(!empty($dep)){
				$stmt->bindParam(":dep", $dep);		
			}			
			if(!empty($maq)){
				$stmt->bindParam(":maq", $maq);		
			}			
			$stmt->execute();
		  	if($stmt->rowCount() > 0){		  		
            	return $stmt->fetchAll();
        	}
        	return null;		 	
			} catch (Exception $e) {
				echo $e->getMessage();	
			}	
	}

	/* GRAFICOS */
	public function totalProd($data1,$data2){
		try {
			$array = array();
			$currentDay = $data1;
			while($data2 != $currentDay){
				$array[$currentDay] = 0;
				$currentDay = date('Y-m-d', strtotime('+1 day', strtotime($currentDay)));
			}
			$sql = "SELECT 
						DATE_FORMAT(data_prod, '%Y-%m-%d') as DATA_PROD,
    					SUM(producao.totalbob) AS PRODUCAO
					FROM producao 
					WHERE data_prod BETWEEN :data1 AND :data2
					GROUP BY DATE_FORMAT(data_prod, '%Y-%m-%d')";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":data1", $data1);
			$stmt->bindParam(":data2", $data2);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$rows = $stmt->fetchAll();				
				// preencher o array
				foreach($rows as $prod){
					$array[$prod['DATA_PROD']] = $prod['PRODUCAO'];
				}
			}

			return $array;
		} catch (Exception $e) {
			echo $e->getMessage();	
		}
	}

	public function totalPerda($data1,$data2){
		try {
			$array = array();
			$currentDay = $data1;
			while($data2 != $currentDay){
				$array[$currentDay] = 0;
				$currentDay = date('Y-m-d', strtotime('+1 day', strtotime($currentDay)));
			}
			$sql = "SELECT 
						DATE_FORMAT(data_perd, '%Y-%m-%d') as DATA_PERD,
    					SUM(perda.apara + perda.refile + perda.borra + perda.acabamento) AS PERDA
					FROM perda 
					WHERE data_perd BETWEEN :data1 AND :data2
					GROUP BY DATE_FORMAT(data_perd, '%Y-%m-%d')";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":data1", $data1);
			$stmt->bindParam(":data2", $data2);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$rows = $stmt->fetchAll();
				// preencher o array
				foreach($rows as $perda){
					$array[$perda['DATA_PERD']] = $perda['PERDA'];
				}
			}			
			return $array;
		} catch (Exception $e) {
			echo $e->getMessage();	
		}
	}

	public function totalProdExt($data1,$data2){
		try {
			$array = array();

			$sql = "SELECT 
						producao.extrusora AS EXTRUSORA,
    					SUM(producao.totalbob) AS PRODUCAO
					FROM producao 
					WHERE producao.data_prod BETWEEN :data1 AND :data2
					GROUP BY producao.extrusora";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":data1", $data1);
			$stmt->bindParam(":data2", $data2);			
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$rows = $stmt->fetchAll();
				// preencher o array
				foreach($rows as $prod){
					$array[$prod['EXTRUSORA']] = $prod['PRODUCAO'];
				}
			}		
			return $array;	
		} catch (Exception $e) {
			
		}
	}

	public function totalPerdaExt($data1,$data2){
		try {
			$array = array();

			$sql = "SELECT 
						perda.extrusora AS EXTRUSORA,
    					SUM(perda.apara + perda.refile + perda.borra) AS PERDA
					FROM perda 
					WHERE perda.data_perd BETWEEN :data1 AND :data2
					GROUP BY perda.extrusora";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":data1", $data1);
			$stmt->bindParam(":data2", $data2);			
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$rows = $stmt->fetchAll();
				// preencher o array
				foreach($rows as $prod){
					$array[$prod['EXTRUSORA']] = $prod['PERDA'];
				}
			}		
			return $array;	
		} catch (Exception $e) {
			
		}
	}

	public function totalProdTurno($data1,$data2){
		try {
			$array = array();

			$sql = "SELECT 
						producao.turno AS TURNO,
    					SUM(producao.totalbob) AS PRODUCAO
					FROM producao 
					WHERE producao.data_prod BETWEEN :data1 AND :data2
					GROUP BY producao.turno";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":data1", $data1);
			$stmt->bindParam(":data2", $data2);			
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$rows = $stmt->fetchAll();
				// preencher o array
				foreach($rows as $prod){
					$array[$prod['TURNO']] = $prod['PRODUCAO'];
				}
			}		
			return $array;	
		} catch (Exception $e) {
			
		}
	}

	public function totalPerdaTurno($data1,$data2){
		try {
			$array = array();

			$sql = "SELECT 
						perda.turno AS TURNO,
    					SUM(perda.apara + perda.refile + perda.borra + perda.acabamento) AS PERDA
					FROM perda 
					WHERE perda.data_perd BETWEEN :data1 AND :data2
					GROUP BY perda.turno";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":data1", $data1);
			$stmt->bindParam(":data2", $data2);			
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$rows = $stmt->fetchAll();
				// preencher o array
				foreach($rows as $prod){
					$array[$prod['TURNO']] = $prod['PERDA'];
				}
			}		
			return $array;	
		} catch (Exception $e) {
			
		}
	}

	public function totalProdOperador($data1,$data2){
		try {
			$array = array();

			$sql = "SELECT 
						operador.operador AS OPERADOR,
    					SUM(producao.totalbob) AS PRODUCAO
					FROM producao
					INNER JOIN operador ON producao.operador_fk = operador.id  
					WHERE producao.data_prod BETWEEN :data1 AND :data2
					GROUP BY operador.operador";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":data1", $data1);
			$stmt->bindParam(":data2", $data2);	
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$rows = $stmt->fetchAll();				
				// preencher o array
				foreach($rows as $prod){
					$array[$prod['OPERADOR']] = $prod['PRODUCAO'];
				}
			}					
			return $array;	
		} catch (Exception $e) {
			
		}
	}

	public function totalPerdaApara($data1,$data2){
		try {
			$array = array();
			$currentDay = $data1;
			while($data2 != $currentDay){
				$array[$currentDay] = 0;
				$currentDay = date('Y-m-d', strtotime('+1 day', strtotime($currentDay)));
			}
			$sql = "SELECT 
						DATE_FORMAT(data_perd, '%Y-%m-%d') as DATA_PERD,
    					SUM(perda.apara) AS APARA
					FROM perda 
					WHERE data_perd BETWEEN :data1 AND :data2
					GROUP BY DATE_FORMAT(data_perd, '%Y-%m-%d')";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":data1", $data1);
			$stmt->bindParam(":data2", $data2);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$rows = $stmt->fetchAll();
				// preencher o array
				foreach($rows as $perda){
					$array[$perda['DATA_PERD']] = $perda['APARA'];
				}
			}			
			return $array;
		} catch (Exception $e) {
			echo $e->getMessage();	
		}
	}

	public function totalPerdaRefile($data1,$data2){
		try {
			$array = array();
			$currentDay = $data1;
			while($data2 != $currentDay){
				$array[$currentDay] = 0;
				$currentDay = date('Y-m-d', strtotime('+1 day', strtotime($currentDay)));
			}
			$sql = "SELECT 
						DATE_FORMAT(data_perd, '%Y-%m-%d') as DATA_PERD,
    					SUM(perda.refile) AS REFILE
					FROM perda 
					WHERE data_perd BETWEEN :data1 AND :data2
					GROUP BY DATE_FORMAT(data_perd, '%Y-%m-%d')";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":data1", $data1);
			$stmt->bindParam(":data2", $data2);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$rows = $stmt->fetchAll();
				// preencher o array
				foreach($rows as $perda){
					$array[$perda['DATA_PERD']] = $perda['REFILE'];
				}
			}			
			return $array;
		} catch (Exception $e) {
			echo $e->getMessage();	
		}
	}

	public function totalPerdaBorra($data1,$data2){
		try {
			$array = array();
			$currentDay = $data1;
			while($data2 != $currentDay){
				$array[$currentDay] = 0;
				$currentDay = date('Y-m-d', strtotime('+1 day', strtotime($currentDay)));
			}
			$sql = "SELECT 
						DATE_FORMAT(data_perd, '%Y-%m-%d') as DATA_PERD,
    					SUM(perda.borra) AS BORRA
					FROM perda 
					WHERE data_perd BETWEEN :data1 AND :data2
					GROUP BY DATE_FORMAT(data_perd, '%Y-%m-%d')";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":data1", $data1);
			$stmt->bindParam(":data2", $data2);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$rows = $stmt->fetchAll();
				// preencher o array
				foreach($rows as $perda){
					$array[$perda['DATA_PERD']] = $perda['BORRA'];
				}
			}			
			return $array;
		} catch (Exception $e) {
			echo $e->getMessage();	
		}
	}

	public function totalPerdaAcabamento($data1,$data2){
		try {
			$array = array();
			$currentDay = $data1;
			while($data2 != $currentDay){
				$array[$currentDay] = 0;
				$currentDay = date('Y-m-d', strtotime('+1 day', strtotime($currentDay)));
			}
			$sql = "SELECT 
						DATE_FORMAT(data_perd, '%Y-%m-%d') as DATA_PERD,
    					SUM(perda.acabamento) AS ACABAMENTO
					FROM perda 
					WHERE data_perd BETWEEN :data1 AND :data2
					GROUP BY DATE_FORMAT(data_perd, '%Y-%m-%d')";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":data1", $data1);
			$stmt->bindParam(":data2", $data2);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				$rows = $stmt->fetchAll();
				// preencher o array
				foreach($rows as $perda){
					$array[$perda['DATA_PERD']] = $perda['ACABAMENTO'];
				}
			}			
			return $array;
		} catch (Exception $e) {
			echo $e->getMessage();	
		}
	}
	
}