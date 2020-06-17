<?php

class homeController extends Controller{	
	private $user;
	private $menu;
	private $card;	
	public function __construct(){

		parent::__construct();
	   	$this->user = new Users();
	   	$this->menu = new Menu();	
	   	$this->card = new Card();		   	
		if(!$this->user->isLogged()){
			header("Location:" . BASE_URL . "/login");
		}

		$this->user->setLoggedUser();
		$this->menu->setMenu($this->user->getIdGroup());	
		$this->card->setCard($this->user->getIdGroup(),'Home');	
		
	}

	public function index(){
		$data = array();		
		// informações para o template		
		$data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);

		$this->loadTemplate('home', $data);
		
	}
}