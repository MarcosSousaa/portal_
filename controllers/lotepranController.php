<?php
class lotepranController extends Controller {
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
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);    
        if ($this->user->hasPermission('lotepran_view')) { 
            $lp = new LotePran();            
        	$data['tipo'] = array(
                'F' => 'Folha',
                'T' => 'Tubular'
            );
            $data['turno'] = array(
                '001' => 'MANHA',
                '002' => 'TARDE',
                '003' => 'NOITE'
            );           
            $data['lp_list'] = $lp->getList();            
 

            $this->loadTemplate('loteprandi', $data);
        } 
        else {            
            header("Location: " . BASE_URL);
        }
    }

    public function add() {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);     
        if ($this->user->hasPermission('lotepran_add')) { 
            $lp = new LotePran();            
            $data['turno'] = array(
                '001' => 'MANHA',
                '002' => 'TARDE',
                '003' => 'NOITE'
            );   
        	if(isset($_POST['peso']) && !empty($_POST['peso'])){                        		 
                 $n_bob = addslashes($_POST['n_bob']);
                 $data_ini = addslashes($_POST['data_ini']);
                 $hrini = addslashes($_POST['hrini']);
                 $turno = addslashes($_POST['turno']);
                 $maquina = addslashes($_POST['maquina']);
                 $operador = addslashes($_POST['operador']);
                 $data_fim = addslashes($_POST['data_fim']);
                 $hrfim = addslashes($_POST['hrfim']);
                 $especificacao = addslashes($_POST['especificacao']);
                 $espessura = addslashes($_POST['espessura']);
                 $largura = addslashes($_POST['largura']);
                 $metragem = addslashes($_POST['metragem']);
                 $gramatura = addslashes($_POST['gramatura']);
                 $tipo = addslashes($_POST['tipo']);
                 $tela = addslashes($_POST['tela']);
                 $peso = addslashes($_POST['peso']);
                 $obs = addslashes($_POST['obs']);
                 $lote_for = $_POST['lote_for'];
                 $qtd = $_POST['qtd'];
        		 $lp->add($n_bob,$data_ini,$hrini,$turno,$maquina,$operador,$data_fim,$hrfim,$especificacao,$espessura,$largura,$metragem,$gramatura,$tipo,$tela,$peso,$obs,$lote_for,$qtd);

        		 header("Location:". BASE_URL.'/lotepran');
            }            
        	$data['numero_bob'] = $lp->numberOder();
            $this->loadTemplate('loteprandi_add', $data);
        } 
        else {            
            header("Location: " . BASE_URL);
        }
    }

    public function edit($id) {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);     
        if ($this->user->hasPermission('lotepran_edit')) { 
        	$mp = new MatPrima();
        	if(isset($_POST['descricao']) && !empty($_POST['descricao'])){        		
              $descricao = strtoupper(addslashes($_POST['descricao']));	     
              $fornecedor = strtoupper(addslashes($_POST['fornecedor']));
              $status = addslashes($_POST['status']);        
		      $mp->edit($descricao,$fornecedor,$status,$id);
        		 header("Location:". BASE_URL.'/lotepran');
        	}
        	
        	$data['matprima_info'] = $mp->getInfo($id);            
            $this->loadTemplate('lotepran_edit', $data);
        } 
        else {            
            header("Location: " . BASE_URL.'/lotepran');
        }
    }

     public function view($id) {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);     
        if ($this->user->hasPermission('lotepran_view')) { 
            $data['tipo'] = array(
                'F' => 'Folha',
                'T' => 'Tubular'
            );
            $data['turno'] = array(
                '001' => 'MANHA',
                '002' => 'TARDE',
                '003' => 'NOITE'
            );   
            $lp = new LotePran();
            $op = new Operador();           
            $data['lotepran_info'] = $lp->getInfo($id);  
            $data['operador'] = $op->getList();                  
            $this->loadTemplate('loteprandi_view', $data);
        } 
        else {            
            header("Location: " . BASE_URL.'/lotepran');
        }
    }


    public function delete($id) {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);     
        if ($this->user->hasPermission('lotepran_edit')) { 
            $lp = new LotePran();                    
            $lp->delete($id);               
            header("Location: " . BASE_URL.'/lotepran');
        } 
        else {            
            header("Location: " . BASE_URL.'/lotepran');
        }
    }

}