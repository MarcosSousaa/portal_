<?php 

class LoteInt extends Model{
	public function getList(){
		try{
			$sql = "SELECT operador.operador as misturador, op.operador as granulador,lote_interno.* FROM lote_interno INNER JOIN operador ON lote_interno.id_operador_m = operador.id INNER JOIN operador op ON lote_interno.id_operador_g = op.id ";
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
		$sql = "SELECT lote as lote FROM lote_interno  ORDER BY lote DESC LIMIT 1 ";	
		$stmt = $this->db->prepare($sql);		
		$stmt->execute();						
		if($stmt->rowCount() > 0 ){			
			$row = $stmt->fetch();			
			$lote = $row['lote'];
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
        	$sql = "SELECT * FROM lote_interno WHERE id = :id";
        	$stmt = $this->db->prepare($sql);
        	$stmt->bindParam(":id", $id);
        	$stmt->execute();
        	if($stmt->rowCount() > 0){
            	$array['info'] =  $stmt->fetch();
			}
			
			$sql = "SELECT lote_lancamento.lote_fornecedor,lote_lancamento.tipo,lote_lancamento.qtd,matprima.descricao,matprima.fornecedor FROM lote_lancamento INNER JOIN matprima ON lote_lancamento.id_matprima = matprima.id WHERE id_lote = :id";
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


	public function add($lote,$data,$turno,$operador_m,$batidas,$composto,$operador_g,$quantidade,$situacao,$obs,$lote_for,$qtd,$tipo){
		try{	
			
			$sql = "INSERT INTO lote_interno SET lote = :lote, data = :data, turno =:turno,id_operador_m = :operador_m, batidas = :batidas, produto = :composto, id_operador_g = :operador_g, qtd = :quantidade, situacao = :situacao, obs = :obs, TIMESTAMP = NOW()";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":lote", $lote);
			$stmt->bindParam(":data", $data);
			$stmt->bindParam(":turno", $turno);
			$stmt->bindParam(":operador_m", $operador_m);
			$stmt->bindParam(":batidas", $batidas);
			$stmt->bindParam(":composto", $composto);
			$stmt->bindParam(":operador_g", $operador_g);
			$stmt->bindParam(":quantidade",$quantidade);
			$stmt->bindParam(":situacao", $situacao);
			$stmt->bindParam(":obs", $obs);
			$stmt->execute();
			$id_lote = $this->db->lastInsertId();				
			foreach($qtd as $lo => $idl){
				
				$sqlp = $this->db->prepare("INSERT INTO lote_lancamento SET  id_lote = :lote, lote_fornecedor = :lote_for, tipo = :tipo, qtd = :qtd, id_matprima = :id_matprima");
				$sqlp->bindValue(":lote", $id_lote);
				$sqlp->bindValue(":lote_for", $lote_for[$lo]);
				$sqlp->bindValue(":tipo", $tipo[$lo]);
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
		
		$sql = "DELETE FROM lote_lancamento WHERE id_lote = :id_lote";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":id_lote", $id);
		$stmt->execute();
		$sql = "DELETE FROM lote_interno WHERE id = :id_lote";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":id_lote", $id);
		$stmt->execute();
	}

	


	



}