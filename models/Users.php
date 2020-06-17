<?php

class Users extends Model{
	private $userInfo;
	private $permissions;

	public function isLogged(){
		if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])){
			return true;
		}

		return false;
	}

	public function doLogin($user,$pass){
        try{            

            $sql = "SELECT * FROM users WHERE user = :user";                   
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":user",$user);             
            $stmt->execute();           
            
            if($stmt->rowCount() > 0){                
                $row = $stmt->fetch();
                if($row && password_verify($pass, $row['pass']) ){

                    $_SESSION['ccUser'] = $row['id'];
                    return true;
                }                
                else {
                    return false;
                }
               
            }

            return false;    
        } catch(Exception $e){
            echo "ERRO AO BUSCAR INFO NO BD ".$e->getMessage();
        }
		
	}
    public function consultaUser($user){
        try{            

            $sql = "SELECT pass FROM users WHERE user = :user";                   
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":user",$user);             
            $stmt->execute();           
            
            if($stmt->rowCount() > 0){                               
                $valid = $stmt->fetch();
                if(isset($valid['pass']) && !empty($valid['pass'])){
                    return true;    
                }
            }                
            else {
                return false;
            }
            return false;      
                 
        } catch(Exception $e){
            echo "ERRO AO BUSCAR INFO NO BD ".$e->getMessage();
        }
            
    }
    public function updatePass($novaSenha,$user){
        try {
            $hash = password_hash($novaSenha, PASSWORD_DEFAULT);
            $sql = "UPDATE users set pass = :pass where user = :user";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":pass",$hash);
            $stmt->bindValue(":user",$user);
            $stmt->execute();


        } catch (Exception $e) {
                     
        }         
    }

	public function setLoggedUser(){
		if($this->isLogged()){
			$id = $_SESSION['ccUser'];            
			$sql = "SELECT * FROM users WHERE id = :id";            
			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(":id", $id);
			$stmt->execute();            
			if($stmt->rowCount() > 0){
				$this->userInfo = $stmt->fetch();
				$this->permissions = new Permissions();
                // ao settar info's do usuario, vou settar o grupo que o mesmo pertence                
                $this->permissions->setGroup($this->userInfo['id_group']);


			}
		}
	}

	public function logout(){
		unset($_SESSION['ccUser']);
	}

	public function hasPermission($name){
        return $this->permissions->hasPermission($name);

	}

	public function getName() {
        return $this->userInfo['name'];
    }
    
    public function getId() {
        return $this->userInfo['id'];
    }
    public function getUser() {
        return $this->userInfo['user'];
    }
    public function getIdGroup(){
        return $this->userInfo['id_group'];
    }
    public function getGroupName($id){
        return $this->permissions->grupoPorUsuario($id);
    }

    public function getInfo($id){        
        $array = array();
        $sql = "SELECT * FROM users WHERE id = :id";                
        $stmt = $this->db->prepare($sql);        
        $stmt->bindParam(':id', $id);        
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $array = $stmt->fetch();                        

        }
        return $array;
    }
    public function findUsersInGroup($id) {
        $sql = "SELECT COUNT(*) as c FROM users WHERE id_group = :group";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":group", $id);
        $stmt->execute();
        $row = $stmt->fetch();
        if ($row['c'] == '0') {
            return false;
        }
        return true;
    }
    public function getList() {
        $array = array();
        $sql = "SELECT u.id,u.user, u.name, pg.name as group_name 
                FROM users u
                INNER JOIN groups pg
                ON u.id_group = pg.id
                ORDER BY u.name";
        $stmt = $this->db->prepare($sql);        
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $array = $stmt->fetchAll();
        }
        return $array;
    }

    public function add($name, $user,$group) {
        try {
            $name = strtoupper($name);
            $stmt = $this->db->prepare("SELECT COUNT(*) as c FROM users where user = :user");
            $stmt->bindParam(":user",$user);
            $stmt->execute();
            $row = $stmt->fetch();        
            
            if($row['c'] == '0'){             
                $sql = $this->db->prepare("INSERT INTO users SET id = UUID(), name = :name, user = :user, id_group = :group");               
                $sql->bindValue(":name", $name);
                $sql->bindValue(":user", $user);                
                $sql->bindValue(":group", $group);                
                $sql->execute();    
            return '1';
        }
        else {
            return '0';
        }
        } catch (Exception $e) {
            
        }

        
    }
    public function edit($name , $group, $id) {
        $sql = "UPDATE users SET name = :name, id_group = :id_group WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":name", $name);        
        $stmt->bindParam(":id_group", $group);
        $stmt->bindParam(":id", $id);        
        $stmt->execute();
    }
    public function delete($id) {
        $sql = "DELETE FROM users WHERE id = :id";        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);        
        $stmt->execute();
    }

    public function reset($id) {
        $sql = "UPDATE users SET pass = '' WHERE id = :id";
        $stmt = $this->db->prepare($sql);        
        $stmt->bindParam(":id", $id);        
        $stmt->execute();
    }
   
}