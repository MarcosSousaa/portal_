<?php
class painelController extends Controller {
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
    public function index() {
        $data = array();        
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);              
        if ($this->user->hasPermission('painel_view')){
            $data['menu_list'] = $this->menu->getList();                        
            $this->loadTemplate('painel', $data);
        } else {            
            header("Location: " . BASE_URL);
        }
    }


}