<?php
class loteintController extends Controller {
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
        if ($this->user->hasPermission('loteint_view')) { 
            $li = new LoteInt();
            $op = new Operador();
        	$data['status'] = array(
                '0' => 'Inativo',
                '1' => 'Ativo'
            );
            $data['turno'] = array(
                '001' => 'MANHA',
                '002' => 'TARDE',
                '003' => 'NOITE'
            );   
            $data['produto'] = array(
                'BAN' => 'Banstretch',
                'COS' => 'Coex Standard',
                'COP' => 'Coex Plus',
                'ENC' => 'Encolhivel',
                'EST' => 'Esticavel',            
                'SKI' => 'Skin'
            );
            $data['operador'] = $op->getList();
            $data['li_list'] = $li->getList();            
 

            $this->loadTemplate('loteint', $data);
        } 
        else {            
            header("Location: " . BASE_URL);
        }
    }

    public function add() {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);     
        if ($this->user->hasPermission('loteint_add')) { 
            $li = new LoteInt();            
            $data['turno'] = array(
                '001' => 'MANHA',
                '002' => 'TARDE',
                '003' => 'NOITE'
            );   
            $data['produto'] = array(
                'BAN' => 'Banstretch',
                'COS' => 'Coex Standard',
                'COP' => 'Coex Plus',
                'ENC' => 'Encolhivel',
                'EST' => 'Esticavel',            
                'SKI' => 'Skin'
            );
        	if(isset($_POST['quantidade']) && !empty($_POST['quantidade'])){                        		 
                 $lote = addslashes($_POST['lote']);
                 $data = addslashes($_POST['data']);
                 $turno = addslashes($_POST['turno']);
                 $operador_m = addslashes($_POST['operador_m']);
                 $batidas = addslashes($_POST['batidas']);
                 $composto = addslashes($_POST['composto']);
                 $operador_g = addslashes($_POST['operador_g']);
                 $quantidade = addslashes($_POST['quantidade']);
                 $situacao = addslashes($_POST['situacao']);
                 $obs = addslashes($_POST['obs']);
                 $lote_for = $_POST['lote_for'];
                 $qtd = $_POST['qtd'];
                 $tipo = $_POST['tipo'];                 
        		 $li->add($lote,$data,$turno,$operador_m,$batidas,$composto,$operador_g,$quantidade,$situacao,$obs,$lote_for,$qtd,$tipo);
        		 header("Location:". BASE_URL.'/loteint');
            }            
        	$data['numero_lote'] = $li->numberOder();
            $this->loadTemplate('loteint_add', $data);
        } 
        else {            
            header("Location: " . BASE_URL);
        }
    }

    public function edit($id) {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);     
        if ($this->user->hasPermission('matprima_edit')) { 
        	$mp = new MatPrima();
        	if(isset($_POST['descricao']) && !empty($_POST['descricao'])){        		
              $descricao = strtoupper(addslashes($_POST['descricao']));	     
              $fornecedor = strtoupper(addslashes($_POST['fornecedor']));
              $status = addslashes($_POST['status']);        
		      $mp->edit($descricao,$fornecedor,$status,$id);
        		 header("Location:". BASE_URL.'/matprima');
        	}
        	
        	$data['matprima_info'] = $mp->getInfo($id);            
            $this->loadTemplate('matprima_edit', $data);
        } 
        else {            
            header("Location: " . BASE_URL.'/matprima');
        }
    }

     public function view($id) {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);     
        if ($this->user->hasPermission('loteint_view')) { 
            $li = new LoteInt();
            $op = new Operador();
            $data['tipo'] = array(
                '0001' => '%',
                '0002' => 'KG'

            );
            $data['loteint_info'] = $li->getInfo($id);  
            $data['operador'] = $op->getList();          
            $this->loadTemplate('loteint_view', $data);
        } 
        else {            
            header("Location: " . BASE_URL.'/loteint');
        }
    }


    public function delete($id) {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);     
        if ($this->user->hasPermission('loteint_edit')) { 
            $li = new LoteInt();
            $op = new Operador();
            $data['tipo'] = array(
                '0001' => '%',
                '0002' => 'KG'

            );
            $li->delete($id);               
            header("Location: " . BASE_URL.'/loteint');
        } 
        else {            
            header("Location: " . BASE_URL.'/loteint');
        }
    }

}