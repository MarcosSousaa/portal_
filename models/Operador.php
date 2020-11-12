<?php 

class Operador extends Model{
	public function getList(){
		try{
			$sql = "SELECT * FROM operador ";
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
        	$sql = "SELECT * FROM operador WHERE id = :id";
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

	public function getCount(){
		try{
	 		$sql = "SELECT COUNT(*) as c FROM operador";
    		$stmt = $this->db->prepare($sql);        
        	$stmt->execute();
        	$row = $stmt->fetch();
        	return $row['c'];
		}catch(Exception $e){
			echo $e->getMessage();
			exit();
		}
	}

	public function add($operador){
		try{			
			$sql = "INSERT INTO operador SET operador = :operador, status = '1', timestamp = NOW()";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":operador", $operador);
			$stmt->execute();
		}catch(Exception $e){
			echo $e->getMessage();
			exit();
		}
	}

	public function edit($operador,$status,$id){
		try{			
			$sql = "UPDATE operador SET operador = :operador, status = :status, timestamp = NOW() WHERE id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":operador", $operador);
			$stmt->bindParam(":status", $status);	
			$stmt->bindParam(":id", $id);
			$stmt->execute();
		}catch(Exception $e){
			echo $e->getMessage();
			exit();
		}
	}

	public function delete($id){
		try{			
			$sql = "DELETE FROM operador WHERE id = :id";
			$stmt = $this->db->prepare($sql);			
			$stmt->bindParam(":id", $id);
			$stmt->execute();
		}catch(Exception $e){
			echo $e->getMessage();
			exit();
		}
	}

	public function getOperador(){
		$data = "";
		$sql = "SELECT id,operador FROM operador WHERE status = '1' order by operador";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			$result = $stmt->fetchAll();
			$data = "<option value='0' disabled selected >Escolha um operador</option>";

			foreach($result as $row){
				$data .= "<option value='".$row['id']."'>".$row['operador']."</option>";
			}			
		}
		return $data;
	}

	public function buscaOperador($data1,$data2){
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
					$array[$prod['PRODUCAO']] = $prod['OPERADOR'];
				}
			}					
			return $array;	
		} catch (Exception $e) {
			
		}
	}

}