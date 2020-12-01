<?php 

class LotePran extends Model{
	public function getList(){
		try{
			$sql = "SELECT operador.operador as operador,lote_pran.* FROM lote_pran INNER JOIN operador ON lote_pran.id_operador = operador.id";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			if($stmt->rowCount() > 0){
				return $stmt->fetchAll();
			}	
		}catch(Exception $e){
			echo $e->getMessage();
			exit();
		}
	}
	public function numberOder(){
		$lote;		
		$sql = "SELECT n_bob as n_bob FROM lote_pran  ORDER BY n_bob DESC LIMIT 1 ";	
		$stmt = $this->db->prepare($sql);		
		$stmt->execute();						
		if($stmt->rowCount() > 0 ){			
			$row = $stmt->fetch();			
			$lote = $row['n_bob'];
			$lote = $lote + 1;			
			$lote = str_pad($lote,5,"0", STR_PAD_LEFT);			
		}else{			
			$lote = '00001';			
		}		
		return $lote;
	}
	public function getInfo($id){
		try{
	 		$array = array();
        	$sql = "SELECT * FROM lote_pran WHERE id = :id";
        	$stmt = $this->db->prepare($sql);
        	$stmt->bindParam(":id", $id);
        	$stmt->execute();
        	if($stmt->rowCount() > 0){
            	$array['info'] =  $stmt->fetch();
			}
			
			$sql = "SELECT pran_lancamento.lote_fornecedor,pran_lancamento.qtd,matprima.descricao,matprima.fornecedor FROM pran_lancamento INNER JOIN matprima ON pran_lancamento.id_matprima = matprima.id WHERE id_lote_pran = :id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":id", $id);
        	$stmt->execute();
        	if($stmt->rowCount() > 0){
            	$array['lancamento'] =  $stmt->fetchAll();
			}
        	return $array;
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function getName($name){
		try{
	 		$array = array();
        	$sql = "SELECT operador FROM lote_interno WHERE operador = :name";
        	$stmt = $this->db->prepare($sql);
        	$stmt->bindParam(":name", $name);
        	$stmt->execute();
        	if($stmt->rowCount() > 0){
            	$array =  $stmt->fetch();
        	}
        	return $array;
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}


	public function add($n_bob,$data_ini,$hrini,$turno,$maquina,$operador,$data_fim,$hrfim,$especificacao,$espessura,$largura,$metragem,$gramatura,$tipo,$tela,$peso,$obs,$lote_for,$qtd){
		try{

			$peso = str_replace(",", ".", $peso);
			$largura = str_replace(",", ".", $largura);
			$metragem = str_replace(",", ".", $metragem);			
			$espessura = str_replace(",", ".", $espessura);
			$sql = "INSERT INTO lote_pran SET n_bob = :n_bob, data_ini = :data_ini, hr_ini = :hrini, turno =:turno,maquina = :maquina, id_operador = :operador, data_fim = :data_fim, hr_fim = :hrfim, especificacao = :especificacao, espessura = :espessura, largura = :largura, metragem = :metragem, gramatura = :gramatura, tipo = :tipo, peso = :peso, tela = :tela, obs = :obs, TIMESTAMP = NOW()";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":n_bob", $n_bob);
			$stmt->bindParam(":data_ini", $data_ini);
			$stmt->bindParam(":hrini", $hrini);
			$stmt->bindParam(":turno", $turno);
			$stmt->bindParam(":maquina", $maquina);
			$stmt->bindParam(":operador", $operador);
			$stmt->bindParam(":data_fim", $data_fim);
			$stmt->bindParam(":hrfim",$hrfim);
			$stmt->bindParam(":especificacao", $especificacao);
			$stmt->bindParam(":espessura", $espessura);
			$stmt->bindParam(":largura", $largura);
			$stmt->bindParam(":metragem", $metragem);
			$stmt->bindParam(":gramatura", $gramatura);
			$stmt->bindParam(":tipo", $tipo);
			$stmt->bindParam(":peso", $peso);
			$stmt->bindParam(":tela", $tela);
			$stmt->bindParam(":obs", $obs);
			$stmt->execute();
			$id_lote = $this->db->lastInsertId();				
			foreach($qtd as $lo => $idl){
				
				$sqlp = $this->db->prepare("INSERT INTO pran_lancamento SET  id_lote_pran = :lote, lote_fornecedor = :lote_for, qtd = :qtd, id_matprima = :id_matprima");
				$sqlp->bindValue(":lote", $id_lote);
				$sqlp->bindValue(":lote_for", $lote_for[$lo]);				
				$sqlp->bindValue(":qtd", $qtd[$lo]);
				$sqlp->bindValue(":id_matprima", $lo);				
				$sqlp->execute();
			}
		}catch(Exception $e){
			echo $e->getMessage();
			exit();
		}
	}

	public function edit($descricao,$fornecedor,$status,$id){
		try{			
			$sql = "UPDATE lote_interno SET descricao = :descricao, fornecedor = :fornecedor, status = :status, timestamp = NOW() WHERE id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":descricao", $descricao);
			$stmt->bindParam(":fornecedor", $fornecedor);
			$stmt->bindParam(":status", $status);	
			$stmt->bindParam(":id", $id);
			$stmt->execute();
		}catch(Exception $e){
			echo $e->getMessage();
			exit();
		}
	}

	public function delete($id){
		
		$sql = "DELETE FROM pran_lancamento WHERE id_lote_pran = :id_lote";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":id_lote", $id);
		$stmt->execute();
		$sql = "DELETE FROM lote_pran WHERE id = :id_lote";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":id_lote", $id);
		$stmt->execute();
	}

	


	



}