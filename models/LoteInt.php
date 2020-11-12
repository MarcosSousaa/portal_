<?php 

class LoteInt extends Model{
	public function getList(){
		try{
			$sql = "SELECT * FROM lote_interno ";
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
			$row = $sql->fetch();
			$lote = $row['lote'];
			$lote = $lote + 1;
			$lote = str_pad($lote,6,"0", STR_PAD_LEFT);			
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
            	$array =  $stmt->fetch();
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


	public function add($descricao,$fornecedor){
		try{			
			$sql = "INSERT INTO lote_interno SET id = UUID(), descricao = :descricao, fornecedor = :fornecedor, status = '1', timestamp = NOW()";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":descricao", $descricao);
			$stmt->bindParam(":fornecedor", $fornecedor);
			$stmt->execute();
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

	


	



}