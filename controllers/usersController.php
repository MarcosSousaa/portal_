<?php
class UsersController extends Controller {
    private $user;
    private $menu;
    private $card;
    public function __construct() {
        parent::__construct();
        $this->user = new Users();
        $this->menu = new Menu();
        $this->card = new Card();   
        if (!$this->user->isLogged()) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }       
        $this->user->setLoggedUser();        
        $this->menu->setMenu($this->user->getIdGroup());            
    }
    public function index(){
        $data = array();        
        // informações para o template        
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card); 
        $data['status'] = array(
            '0' => 'Inativo',
            '1' => 'Ativo'

        );     
        $data['usuario_edit'] = $this->user->hasPermission('usuario_edit');    
        if ($this->user->hasPermission('usuario_view')) {            
            $data['users_list'] = $this->user->getList();
            $this->loadTemplate('users', $data);
        } else {            
            header("Location: " . BASE_URL);
        }
    }
    public function add() {
        $data = array();
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);        
        if ($this->user->hasPermission('usuario_view')) {
            $p = new Permissions();
            $data['group_list'] = $p->getGroupList();
            if (isset($_POST['user']) && !empty($_POST['user'])) {                
                $user = addslashes(filter_input(INPUT_POST, 'user'));
                $name = addslashes(filter_input(INPUT_POST, 'name'));                
                $group = addslashes(filter_input(INPUT_POST, 'group'));                
                $retorno = $this->user->add($name, $user, $group);
                if ($retorno) {
                    header("Location: " . BASE_URL . "/users");
                    exit();
                } else {
                    $data['error_msg'] = "Usuário já existe!";
                }
            }
            $this->loadTemplate('users_add', $data);
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }
    public function edit($id) {
        $dara = array();
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);       
        if ($this->user->hasPermission('usuario_view')) {
            $p = new Permissions();            
            $data['user_info'] = $this->user->getInfo($id);
            $data['group_list'] = $p->getGroupList();
            if (isset($_POST['group']) && !empty($_POST['group'])) {
                $name = addslashes(filter_input(INPUT_POST, 'name'));  
                $status = addslashes(filter_input(INPUT_POST, 'status'));              
                $group = addslashes(filter_input(INPUT_POST, 'group'));                
                $this->user->edit($name, $group, $status, $id);
                header("Location: " . BASE_URL . "/users");
                exit();
            }
            $this->loadTemplate('users_edit', $data);
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }
    public function delete($id) {
        $data = array();
       // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);     
        if ($this->user->hasPermission('usuario_view')) {
            $p = new Permissions();
            $this->user->delete($id);
            header("Location: " . BASE_URL . "/users");
            exit();
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }

     public function reset($id) {
        $data = array();
       // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);     
        if ($this->user->hasPermission('usuario_view')) {
            $p = new Permissions();
            $this->user->reset($id);
            header("Location: " . BASE_URL . "/users");
            exit();
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }
}