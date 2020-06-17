<?php
class Menu extends Model {
    private $group;
    private $menu_caminho;
    private $menu_class;
    private $menu_descricao;

    public function setMenu($id){
        // consultando quais os menus que tem esse grupo
        $this->group = $id;
        $this->menu_caminho = array();
        $this->menu_class = array();
        $this->menu_descricao = array();

        $sql = "SELECT menu_acesso FROM groups WHERE id = :id ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);        
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch();
            if (empty($row['menu_acesso'])) {
                $row['menu_acesso'] = '0';
            }
            $menu = $row['menu_acesso'];
            /** consultando esses 'params' para saber quais os nomes
              e no final adicionar cada nome ao array de $this->menu * */   
                
            $this->searchingMenu($menu);
        }
    }

    private function searchingMenu($menu) {        
        $sql = "SELECT descricao,caminho,className FROM menu WHERE id IN ($menu)";
        $stmt = $this->db->prepare($sql);        
        $stmt->execute();        
        if ($stmt->rowCount() > 0) {
            $p = $stmt->fetchAll();            
            foreach ($p as $item) {
                $this->menu_caminho[] = $item['caminho'];
                $this->menu_class[] = $item['className'];
                $this->menu_descricao[] = $item['descricao'];
            }                        
        }        
    }
    public function hasPermission($name) {        
        if (in_array($name, $this->permissions)) {
            return true;
        }
        return false;
    }

    public function getList() {
        $array = array();
        $stmt = $this->db->prepare("SELECT * FROM menu");        
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $array = $stmt->fetchAll();
        }
        return $array;
    }

     public function getClass(){
        return $this->menu_class;
    }
    public function getCaminho(){
        return $this->menu_caminho;
    }
    public function getDescricao(){
        return $this->menu_descricao;
    }
    
}