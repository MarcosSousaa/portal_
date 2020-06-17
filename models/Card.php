<?php
class Card extends Model {
    private $group;
    private $card_caminho;
    private $card_img;
    private $card_titulo;

    public function setCard($id, $origem){
        // consultando quais os menus que tem esse grupo
        $this->group = $id;
        $this->card_caminho = array();
        $this->card_img = array();
        $this->menu_titulo = array();

        $sql = "SELECT card_acesso FROM groups WHERE id = :id ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);        
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch();
            if (empty($row['card_acesso'])) {
                $row['card_acesso'] = '0';
            }
            $card = $row['card_acesso'];
            /** consultando esses 'params' para saber quais os nomes
              e no final adicionar cada nome ao array de $this->menu * */   
                
            $this->searchingMenu($card,$origem);
        }
    }

    private function searchingMenu($card,$origem) {               
        $sql = "SELECT link,img,titulo FROM card WHERE id IN ($card) AND origem = :origem";
        $stmt = $this->db->prepare($sql);        
        $stmt->bindParam(":origem", $origem);
        $stmt->execute();        
        if ($stmt->rowCount() > 0) {            
            $p = $stmt->fetchAll();            
            foreach ($p as $item) {
                $this->card_caminho[] = $item['link'];
                $this->card_img[] = $item['img'];
                $this->card_titulo[] = $item['titulo'];
            }     

        }        
    }
    public function hasPermission($name) {        
        if (in_array($name, $this->permissions)) {
            return true;
        }
        return false;
    }

    public function getList($origem) {
        $array = array();
        $stmt = $this->db->prepare("SELECT * FROM card where origem = :origem");        
        $stmt->bindValue(":origem",$origem);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $array = $stmt->fetchAll();
        }
        return $array;
    }

     public function getImg(){
        return $this->card_img;
    }
    public function getCaminho(){
        return $this->card_caminho;
    }
    public function getTitulo(){
        return $this->card_titulo;
    }
    
}