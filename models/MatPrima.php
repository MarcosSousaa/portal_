<?php 

class MatPrima extends Model{
	public function getList(){
		try{
			$sql = "SELECT * FROM matprima ";
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

	public function getInfo($id){
		try{
	 		$array = array();
        	$sql = "SELECT * FROM matprima WHERE id = :id";
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
        	$sql = "SELECT operador FROM operador WHERE operador = :name";
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
			$sql = "INSERT INTO matprima SET id = UUID(), descricao = :descricao, fornecedor = :fornecedor, status = '1', timestamp = NOW()";
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
			$sql = "UPDATE matprima SET descricao = :descricao, fornecedor = :fornecedor, status = :status, timestamp = NOW() WHERE id = :id";
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

	public function searchMatPrimaByName($name){
		$array = array();
		$sql = $this->db->prepare("SELECT descricao, fornecedor, id FROM matprima WHERE descricao LIKE :name LIMIT 10");
		$n = "%".$name."%";
		$sql->bindValue(":name",$n);	
		echo 'ta aqui';
		exit;			
		$sql->execute();		
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}

	


	



}