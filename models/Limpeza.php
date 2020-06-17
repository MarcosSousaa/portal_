<?php 

class Limpeza extends Model{
	public function getList($data1,$data2){
		try{
			$sql = "SELECT limpeza.*,operador.operador FROM limpeza INNER JOIN operador ON limpeza.operador_fk = operador.id WHERE limpeza.data_limp BETWEEN :data1 AND :data2 ORDER BY limpeza.data_limp";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":data1",$data1);
			$stmt->bindParam(":data2",$data2);
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
        	$sql = "SELECT limpeza.*,operador.operador FROM limpeza INNER JOIN operador ON limpeza.operador_fk = operador.id WHERE limpeza.id = :id";
        	$stmt = $this->db->prepare($sql);
        	$stmt->bindParam(":id", $id);
        	$stmt->execute();
        	if($stmt->rowCount() > 0){
            	$array =  $stmt->fetch();
            	$array['aprovacao'] = $array['valid'];        	   	
			    if($array['aprovacao'] != '1' && $array['aprovacao'] != '2'){
			       $array['aprovacao'] = 'Em Analíse Pelo Dep. Qualidade';
			    }
			    if($array['aprovacao'] == '2'){
			        $array['aprovacao'] = 'Reprovado Pelo Dep. Qualidade';
			    }
			    if($array['aprovacao'] == '1'){
			        $array['aprovacao'] = 'Aprovado Pelo Dep. Qualidade';
			    }
        	}
        	return $array;
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function add($data_limp,$hora_limp,$dep,$maq,$operador,$est,$prot,$pain,$chao,$prod,$iduser){
		try{			
			$sql = "INSERT INTO limpeza SET data_limp = :data_limp, hrlimp = :hrlimp,departamento = :departamento, maquina = :maquina, operador_fk = :operador, estrutura = :estrutura, protecao = :protecao, painel = :painel, chao = :chao, prod = :prod, id_user = :id_user";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(":data_limp", $data_limp);
			$stmt->bindParam(":hrlimp", $hora_limp);
			$stmt->bindParam(":departamento", $dep);
			$stmt->bindParam(":maquina", $maq);
			$stmt->bindParam(":operador", $operador);
			$stmt->bindParam(":estrutura", $est);
			$stmt->bindParam(":protecao", $prot);
			$stmt->bindParam(":painel", $pain);
			$stmt->bindParam(":chao", $chao);
			$stmt->bindParam(":prod", $prod);
			$stmt->bindParam(":id_user", $iduser);
			$stmt->execute();
		}catch(Exception $e){
			echo $e->getMessage();
			exit();
		}
	}

	public function edit($data_limp,$hora_limp,$dep,$maq,$operador,$est,$prot,$pain,$chao,$prod,$quali,$obs,$id){
		try{			
			$sql = "UPDATE limpeza SET data_limp = :data_limp,hrlimp = :hrlimp, departamento = :departamento, maquina = :maquina, operador_fk = :operador, estrutura = :estrutura, protecao = :protecao, painel = :painel, chao = :chao, prod = :prod, obs = :obs, valid = :valid  WHERE id = :id";
			$stmt = $this->db->prepare($sql);			
			$stmt->bindParam(":data_limp", $data_limp);
			$stmt->bindParam(":hrlimp", $hora_limp);
			$stmt->bindParam(":departamento", $dep);
			$stmt->bindParam(":maquina", $maq);
			$stmt->bindParam(":operador", $operador);
			$stmt->bindParam(":estrutura", $est);
			$stmt->bindParam(":protecao", $prot);
			$stmt->bindParam(":painel", $pain);
			$stmt->bindParam(":chao", $chao);
			$stmt->bindParam(":prod", $prod);
			$stmt->bindParam(":valid", $quali);
			$stmt->bindParam(":obs", $obs);
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

	public function getReportLimpeza($data1,$data2,$dep,$maq,$operador){
		try {			
			$sql = 
				" SELECT
					limpeza.*,					
				    operador.operador				    
				FROM limpeza
				INNER JOIN operador ON limpeza.operador_fk = operador.id
				WHERE ";
			$where = array();
			if(!empty($data1) && !empty($data2)){
				$where[] = "limpeza.data_limp BETWEEN :data1 AND :data2";
			}
			if(!empty($dep)){
				$where[] = "limpeza.departamento = :departamento ";
			}
			if(!empty($maq)){
				$where[] = "limpeza.maquina = :maquina";
			}
			if(!empty($operador)){
				$where[] = "operador.operador LIKE '%".$operador."%'";
			}
		 	$sql .= implode(' AND ', $where);
	 		$stmt = $this->db->prepare($sql);
	 		if(!empty($data1) && !empty($data2)){
				$stmt->bindParam(":data1", $data1);
				$stmt->bindParam(":data2", $data2);	
			}
			if(!empty($dep)){
				$stmt->bindParam(":departamento", $dep);		
			}
			if(!empty($maq)){
				$stmt->bindParam(":maquina", $maq);
			}
			$stmt->execute();
		  	if($stmt->rowCount() > 0){
		  		return  $stmt->fetchAll();		  		
        	}
        	return null;		 	
		} catch (Exception $e) {
				echo $e->getMessage();	
		}	
	}
}