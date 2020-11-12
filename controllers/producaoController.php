<?php
class producaoController extends Controller {
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
        $data['turno'] = array(
            '001' => 'MANHA',
            '002' => 'TARDE',
            '003' => 'NOITE'
        );   
        if ($this->user->hasPermission('producao_view')){
            $p = new Producao();
            $data['producao_add'] = $this->user->hasPermission('producao_add');
            $data['producao_addacab'] = $this->user->hasPermission('producao_addacab');

            if($_POST['ext'] == '00'){
                unset($_SESSION['ext']);        
                $_POST['ext'] = null;                                                
            }
            if($_POST['turno'] == '000'){
                unset($_SESSION['turno']);        
                $_POST['turno'] = null;          
            }
            if(isset($_POST['data2']) && !empty($_POST['data2'])){
                $_SESSION['data1'] = addslashes($_POST['data1']);
                $_SESSION['data2'] = addslashes($_POST['data2']);
                $_SESSION['ext'] = addslashes($_POST['ext']);
                $_SESSION['turno'] = addslashes($_POST['turno']);                
                $data['producao_list'] = $p->getListProducao($_SESSION['data1'],$_SESSION['data2'],$_SESSION['ext'],$_SESSION['turno']);
            }
            if(isset($_SESSION['data1']) && isset($_SESSION['data2'])){
                $data['producao_list'] = $p->getListProducao($_SESSION['data1'],$_SESSION['data2'],$_SESSION['ext'],$_SESSION['turno']);   
            }
            else{
                $_SESSION['data1'] = date('Y-m-d');
                $_SESSION['data2'] = date('Y-m-d');
                $data['producao_list'] = $p->getListProducao($_SESSION['data1'],$_SESSION['data2'],$_SESSION['ext'],$_SESSION['turno']);
            }                                  
            $data['user_name'] = $this->user->getName();                     
            $this->loadTemplate('producao', $data);
        } else {            
            header("Location: " . BASE_URL);
        }
    }

    public function add_prod() {
        $data = array();
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);      
        if ($this->user->hasPermission('producao_add')) {
            $p = new Producao();
            if (isset($_POST['hrfim']) && !empty($_POST['hrfim'])) {
                $data_prod = addslashes($_POST['data_prod']);
                $ext = addslashes($_POST['extrusora_prod']);
                $turno = addslashes($_POST['turno_prod']);
                $operador = addslashes($_POST['operador']);
                $hrini = addslashes($_POST['hrini']);
                $aprovacaoini = addslashes($_POST['aprovacaoini']);
                $pedido = addslashes($_POST['pedido']);
                $ordem = addslashes($_POST['ordem']);
                $lote = addslashes($_POST['lote']);
                $rpm = addslashes($_POST['rpm']);                
                $peso = addslashes($_POST['peso_bob']);
                $qtd = addslashes($_POST['quantidade']);
                $total = addslashes($_POST['total']);
                $larg = addslashes($_POST['larg']);
                $esp = addslashes($_POST['esp']);
                $metrag = addslashes($_POST['metrag']);
                $data_f = addslashes($_POST['data_f']);
                $hrfim = addslashes($_POST['hrfim']);
                $aprovacaofim = addslashes($_POST['aprovacaofim']);
                $iduser = $this->user->getId();
                $p->addProducao($data_prod,$ext,$turno,$operador,$hrini,$aprovacaoini,$pedido,$ordem,$lote,$rpm,$peso,$qtd,$total,$larg,$esp,$metrag,$hrfim,$data_f,$aprovacaofim,$iduser);
                header("Location: " . BASE_URL . "/producao");
                exit();
            }
            $this->loadTemplate('producao_addprod', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function edit_prod($id) {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);
        $data['turno'] = array(
            '001' => 'MANHA',
            '002' => 'TARDE',
            '003' => 'NOITE'
        );      
        if($this->user->hasPermission('producao_edit')) {
            $p = new Producao();
            $op = new Operador();
            if(isset($_POST['data_prod']) && !empty($_POST['data_prod'])){
                $data_prod = addslashes($_POST['data_prod']);             
                $extrusora = addslashes($_POST['extrusora_prod']);                
                $operador = addslashes($_POST['operador']);   
                $hrini = addslashes($_POST['hrini']);
                $aprovacaoini = addslashes($_POST['aprovacaoini']);
                $pedido = addslashes($_POST['pedido']);
                $ordem = addslashes($_POST['ordem']);
                $lote = addslashes($_POST['lote']);
                $rpm = addslashes($_POST['rpm']);                
                $peso = addslashes($_POST['peso_bob']);
                $qtd = addslashes($_POST['quantidade']);
                $total = addslashes($_POST['total']);
                $larg = addslashes($_POST['larg']);
                $esp = addslashes($_POST['esp']);
                $metrag = addslashes($_POST['metrag']);
                $data_f = addslashes($_POST['data_f']);
                $hrfim = addslashes($_POST['hrfim']);
                $aprovacaofim = addslashes($_POST['aprovacaofim']);                
                $sobrabob = addslashes($_POST['sobrabob']);
                $sobrabobkg = addslashes($_POST['sobrabobkg']); 
                $user = $this->user->getId();               
                $p->updateProducao($data_prod,$extrusora,$operador,$hrini,$aprovacaoini,$pedido,$ordem,$lote,$rpm,$peso,$qtd,$total,$larg,$esp,$metrag,$hrfim,$data_f,$aprovacaofim,$sobrabob,$sobrabobkg,$user,$id);
                header("Location: " . BASE_URL . "/producao");
                exit();
            }            
            $data['producao_info'] = $p->getInfoProducao($id); 
            $data['operador'] = $op->getList();           
            $data['menu_list'] = $this->menu->getList();              
                                    
            $this->loadTemplate('producao_editprod', $data);    
                                
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function view_prod($id) {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);
        $data['turno'] = array(
            '001' => 'MANHA',
            '002' => 'TARDE',
            '003' => 'NOITE'
        );      
        if($this->user->hasPermission('producao_view')) {
            $p = new Producao();
            $data['producao_info'] = $p->getInfoProducao($id);            
            $data['menu_list'] = $this->menu->getList();             
            $this->loadTemplate('producao_viewprod', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function perda(){
        $data = array();        
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card); 
        $data['turno'] = array(
            '001' => 'MANHA',
            '002' => 'TARDE',
            '003' => 'NOITE'
        );   

        $data['departamento']  = array(
            'EXT' => 'Extrusão',
            'ACA' => 'Acabamento',
            'DIS' => 'Disco',
            'PRA' => 'Prandi',
            'MIS' => 'Mistura',
            'IMP' => 'Impressora',
            'TUB' => 'Tubete'            
        ); 
        $data['maquina']  = array(
            'EXT01' => 'Extrusora 01',
            'EXT02' => 'Extrusora 02',
            'EXT03' => 'Extrusora 03',
            'EXT04' => 'Extrusora 04',
            'EXT05' => 'Extrusora 05', 
            'GRA01' => 'Granuladeira 01',
            'GRA02' => 'Granuladeira 02',
            'GRA03' => 'Granuladeira 03',
            'IMP01' => 'Impressora 01',
            'IMP02' => 'Impressora 02',
            'MIS01' => 'Misturador 01',
            'MIS02' => 'Misturador 02', 
            'PRA01' => 'Prandi 01',
            'PRA02' => 'Prandi 02',
            'RAC01' => 'Rachadeira 01',
            'RAC02' => 'Rachadeira 02',
            'REF01' => 'Refiladeira 01',
            'REF02' => 'Refiladeira 02',
            'REF03' => 'Refiladeira 03',
            'REF04' => 'Refiladeira 04',
            'REF05' => 'Refiladeira 05',
            'REB01' => 'Rebobinadeira 01',
            'REB02' => 'Rebobinadeira 02',
            'REB03' => 'Rebobinadeira 03',
            'REB04' => 'Rebobinadeira 04',
            'REB05' => 'Rebobinadeira 05',
            'REB06' => 'Rebobinadeira 06',
            'REB07' => 'Rebobinadeira 07',
            'TUB08' => 'Rebobinadeira 08',
            'TUB09' => 'Rebobinadeira 09',
            'TUB10' => 'Rebobinadeira 10',
            'TUB11' => 'Rebobinadeira 11',
            'TUB12' => 'Rebobinadeira 12',
            'TUB13' => 'Rebobinadeira 13',
            'TUB14' => 'Rebobinadeira 14',
            'TUB15' => 'Rebobinadeira 15',
            'TUB16' => 'Rebobinadeira 16',
            'EST01' => 'Estufa e Seladora',
            'MOI01' => 'Moinho 01',
            'MOI02' => 'Moinho 02',
            'MOI03' => 'Moinho 03',
            'MOI04' => 'Moinho 04'                
        );         

        $data['produto'] = array(
            'BAN' => 'Banstretch',
            'COS' => 'Coex Standard',
            'COP' => 'Coex Plus',
            'ENC' => 'Encolhivel',
            'EST' => 'Esticavel',            
            'SKI' => 'Skin'
        );
        if ($this->user->hasPermission('producao_view')){
            $p = new Producao();
            $data['producao_add'] = $this->user->hasPermission('producao_add');
            $data['producao_addacab'] = $this->user->hasPermission('producao_addacab'); 
            if($_POST['dep'] == '00'){
                unset($_SESSION['dep']);        
                $_POST['dep'] = null;                                                
            }
            if($_POST['maq'] == '00'){
                unset($_SESSION['maq']);        
                $_POST['maq'] = null;                                                
            }
            if($_POST['turno'] == '000'){
                unset($_SESSION['turno']);        
                $_POST['turno'] = null;          
            }          
            if(isset($_POST['data2']) && !empty($_POST['data2'])){
                $_SESSION['data1'] = addslashes($_POST['data1']);
                $_SESSION['data2'] = addslashes($_POST['data2']);
                $_SESSION['dep'] = addslashes($_POST['dep']);
                $_SESSION['maq'] = addslashes($_POST['maq']);
                $_SESSION['turno'] = addslashes($_POST['turno']);           
                $data['perda_list'] = $p->getListPerda($_SESSION['data1'],$_SESSION['data2'],$_SESSION['dep'], $_SESSION['maq'],$_SESSION['turno']);
            }
            if(isset($_SESSION['data1']) && isset($_SESSION['data2'])){
                $data['perda_list'] = $p->getListPerda($_SESSION['data1'],$_SESSION['data2'], $_SESSION['dep'], $_SESSION['maq'],$_SESSION['turno']);        
            }
            else{
                $_SESSION['data1'] = date('Y-m-d');
                $_SESSION['data2'] = date('Y-m-d');
                $data['perda_list'] = $p->getListPerda($_SESSION['data1'],$_SESSION['data2'], $_SESSION['dep'], $_SESSION['maq'],$_SESSION['turno']);
            }                       
           
            $this->loadTemplate('perda', $data);
        } else {            
            header("Location: " . BASE_URL);
        }
    }

    public function add_perda() {
        $data = array();
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);      
        if ($this->user->hasPermission('producao_add')) {
            $p = new Producao();
            if (isset($_POST['data_perda']) && !empty($_POST['data_perda'])) {
                $data_perda = addslashes($_POST['data_perda']);
                $turno = addslashes($_POST['turno_perda']);
                $departamento = addslashes($_POST['dep']);                
                $maquina = addslashes($_POST['maq']);
                $produto = addslashes($_POST['prod']);                
                $apara = addslashes($_POST['apara']);
                $refile = addslashes($_POST['refile']);                
                $borra = addslashes($_POST['borra']);
                $acabamento = addslashes($_POST['acabamento']);
                $qtdparada = addslashes($_POST['qtdparada']);
                $tempoparada = addslashes($_POST['tempoparada']);
                $oc = $_POST['oc'];
                $iduser = $this->user->getId();                
                $p->addPerda($data_perda,$turno,$departamento,$maquina,$produto,$apara,$refile,$borra,$acabamento,$qtdparada,$tempoparada,$oc,$iduser);
                header("Location: " . BASE_URL . "/producao/perda");
                exit();
            }
            $this->loadTemplate('producao_addperda', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

     public function edit_perda($id) {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);
        $data['turno'] = array(
            '001' => 'MANHA',
            '002' => 'TARDE',
            '003' => 'NOITE'
        );   

        $data['departamento']  = array(
            'EXT' => 'Extrusão',
            'ACA' => 'Acabamento',
            'DIS' => 'Disco',
            'PRA' => 'Prandi',
            'MIS' => 'Mistura',
            'IMP' => 'Impressora',
            'TUB' => 'Tubete'            
        ); 
        $data['maquina']  = array(
            'EXT01' => 'Extrusora 01',
            'EXT02' => 'Extrusora 02',
            'EXT03' => 'Extrusora 03',
            'EXT04' => 'Extrusora 04',
            'EXT05' => 'Extrusora 05', 
            'GRA01' => 'Granuladeira 01',
            'GRA02' => 'Granuladeira 02',
            'GRA03' => 'Granuladeira 03',
            'IMP01' => 'Impressora 01',
            'IMP02' => 'Impressora 02',
            'MIS01' => 'Misturador 01',
            'MIS02' => 'Misturador 02', 
            'PRA01' => 'Prandi 01',
            'PRA02' => 'Prandi 02',
            'RAC01' => 'Rachadeira 01',
            'RAC02' => 'Rachadeira 02',
            'REF01' => 'Refiladeira 01',
            'REF02' => 'Refiladeira 02',
            'REF03' => 'Refiladeira 03',
            'REF04' => 'Refiladeira 04',
            'REF05' => 'Refiladeira 05',
            'REB01' => 'Rebobinadeira 01',
            'REB02' => 'Rebobinadeira 02',
            'REB03' => 'Rebobinadeira 03',
            'REB04' => 'Rebobinadeira 04',
            'REB05' => 'Rebobinadeira 05',
            'REB06' => 'Rebobinadeira 06',
            'REB07' => 'Rebobinadeira 07',
            'TUB08' => 'Rebobinadeira 08',
            'TUB09' => 'Rebobinadeira 09',
            'TUB10' => 'Rebobinadeira 10',
            'TUB11' => 'Rebobinadeira 11',
            'TUB12' => 'Rebobinadeira 12',
            'TUB13' => 'Rebobinadeira 13',
            'TUB14' => 'Rebobinadeira 14',
            'TUB15' => 'Rebobinadeira 15',
            'TUB16' => 'Rebobinadeira 16',
            'EST01' => 'Estufa e Seladora',
            'MOI01' => 'Moinho 01',
            'MOI02' => 'Moinho 02',
            'MOI03' => 'Moinho 03',
            'MOI04' => 'Moinho 04'                
        );         

        $data['produto'] = array(
            'BAN' => 'Banstretch',
            'COS' => 'Coex Standard',
            'COP' => 'Coex Plus',
            'ENC' => 'Encolhivel',
            'EST' => 'Esticavel',            
            'SKI' => 'Skin'
        );
        if($this->user->hasPermission('producao_edit')) {
            $p = new Producao();
            if(isset($_POST['acabamento']) && !empty($_POST['acabamento'])){                
                $departamento = addslashes($_POST['dep']);                
                $maquina = addslashes($_POST['maq']);
                $produto = addslashes($_POST['prod']);          
                $apara = addslashes($_POST['apara']);
                $refile = addslashes($_POST['refile']);                
                $borra = addslashes($_POST['borra']);
                $acabamento = addslashes($_POST['acabamento']);
                $qtdparada = addslashes($_POST['qtdparada']);
                $tempoparada = addslashes($_POST['tempoparada']);
                $oc = $_POST['oc'];                
                $p->updatePerda($departamento,$maquina,$produto,$apara,$refile,$borra,$acabamento,$qtdparada,$tempoparada,$oc,$id);                
                header("Location: " . BASE_URL . "/producao/perda");
                exit();
            }

            $data['perda_info'] = $p->getInfoPerda($id);            
            $data['menu_list'] = $this->menu->getList();
            
            $this->loadTemplate('producao_editperda', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function view_perda($id) {
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);
        $data['turno'] = array(
            '001' => 'MANHA',
            '002' => 'TARDE',
            '003' => 'NOITE'
        );   

        $data['departamento']  = array(
            'EXT' => 'Extrusão',
            'ACA' => 'Acabamento',
            'DIS' => 'Disco',
            'PRA' => 'Prandi',
            'MIS' => 'Mistura',
            'IMP' => 'Impressora',
            'TUB' => 'Tubete'            
        ); 
        $data['maquina']  = array(
            'EXT01' => 'Extrusora 01',
            'EXT02' => 'Extrusora 02',
            'EXT03' => 'Extrusora 03',
            'EXT04' => 'Extrusora 04',
            'EXT05' => 'Extrusora 05', 
            'GRA01' => 'Granuladeira 01',
            'GRA02' => 'Granuladeira 02',
            'GRA03' => 'Granuladeira 03',
            'IMP01' => 'Impressora 01',
            'IMP02' => 'Impressora 02',
            'MIS01' => 'Misturador 01',
            'MIS02' => 'Misturador 02', 
            'PRA01' => 'Prandi 01',
            'PRA02' => 'Prandi 02',
            'RAC01' => 'Rachadeira 01',
            'RAC02' => 'Rachadeira 02',
            'REF01' => 'Refiladeira 01',
            'REF02' => 'Refiladeira 02',
            'REF03' => 'Refiladeira 03',
            'REF04' => 'Refiladeira 04',
            'REF05' => 'Refiladeira 05',
            'REB01' => 'Rebobinadeira 01',
            'REB02' => 'Rebobinadeira 02',
            'REB03' => 'Rebobinadeira 03',
            'REB04' => 'Rebobinadeira 04',
            'REB05' => 'Rebobinadeira 05',
            'REB06' => 'Rebobinadeira 06',
            'REB07' => 'Rebobinadeira 07',
            'TUB08' => 'Rebobinadeira 08',
            'TUB09' => 'Rebobinadeira 09',
            'TUB10' => 'Rebobinadeira 10',
            'TUB11' => 'Rebobinadeira 11',
            'TUB12' => 'Rebobinadeira 12',
            'TUB13' => 'Rebobinadeira 13',
            'TUB14' => 'Rebobinadeira 14',
            'TUB15' => 'Rebobinadeira 15',
            'TUB16' => 'Rebobinadeira 16',
            'EST01' => 'Estufa e Seladora',
            'MOI01' => 'Moinho 01',
            'MOI02' => 'Moinho 02',
            'MOI03' => 'Moinho 03',
            'MOI04' => 'Moinho 04'                
        );         

        $data['produto'] = array(
            'BAN' => 'Banstretch',
            'COS' => 'Coex Standard',
            'COP' => 'Coex Plus',
            'ENC' => 'Encolhivel',
            'EST' => 'Esticavel',            
            'SKI' => 'Skin'
        );
        if($this->user->hasPermission('producao_edit')) {
            $p = new Producao();
            $data['perda_info'] = $p->getInfoPerda($id);
            $data['menu_list'] = $this->menu->getList();
            $this->loadTemplate('producao_viewperda', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

}