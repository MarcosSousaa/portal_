<?php
class limpezaController extends Controller {
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
        $data['departamento']  = array(
            'EXT' => 'Extrusão',
            'ACA' => 'Acabamento',
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
        if($this->user->hasPermission('limpeza_view')){            
            
            $l = new Limpeza(); 
            if(isset($_POST['data2']) && !empty($_POST['data2'])){
                $_SESSION['data1'] = addslashes($_POST['data1']);
                $_SESSION['data2'] = addslashes($_POST['data2']);
                $data['limpeza_list'] = $l->getList($_SESSION['data1'],$_SESSION['data2']);
            }
            if(isset($_SESSION['data1']) && isset($_SESSION['data2'])){
                $data['limpeza_list'] = $l->getList($_SESSION['data1'],$_SESSION['data2']);
            }
            else{
                $_SESSION['data1'] = date('Y-m-d');
                $_SESSION['data2'] = date('Y-m-d');
                $data['limpeza_list'] = $l->getList($_SESSION['data1'],$_SESSION['data2']);
            }                                   

            $this->loadTemplate('limpeza', $data);
        } else {            
            header("Location: " . BASE_URL.'/limpeza');
        }
    }

    public function add() {
        $data = array();
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);   
        if ($this->user->hasPermission('limpeza_add')) {
            $l = new Limpeza();
            if (isset($_POST['operador']) && !empty($_POST['operador'])){
                $data_limp = addslashes($_POST['data_limp']);
                $hora_limp = addslashes($_POST['hrlimp']);
                $dep = addslashes($_POST['dep']);
                $maq = addslashes($_POST['maq']);
                $operador = addslashes($_POST['operador']);
                $est = addslashes($_POST['est']);
                $prot = addslashes($_POST['prot']);
                $pain = addslashes($_POST['pain']);
                $chao = addslashes($_POST['chao']);
                $prod = addslashes($_POST['prod']);
                $iduser = $this->user->getId();
                $l->add($data_limp,$hora_limp,$dep,$maq,$operador,$est,$prot,$pain,$chao,$prod,$iduser);
                header("Location: " . BASE_URL . "/limpeza");
                exit();
            }
            
            $this->loadTemplate('limpeza_add', $data);
        } else {
            header("Location: " . BASE_URL.'/limpeza');
        }
    }

    public function edit($id){
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);   
        if ($this->user->hasPermission('limpeza_edit')){ 
            $l = new Limpeza();
            $op = new Operador();
            if(isset($_POST['quali']) && !empty($_POST['quali'])){
                $data_limp = addslashes($_POST['data_limp']);
                $hora_limp = addslashes($_POST['hrlimp']);
                $dep = addslashes($_POST['dep']);
                $maq = addslashes($_POST['maq']);
                $operador = addslashes($_POST['operador_edit']);
                $est = addslashes($_POST['est']);
                $prot = addslashes($_POST['prot']);
                $pain = addslashes($_POST['pain']);
                $chao = addslashes($_POST['chao']);
                $quali = addslashes($_POST['quali']);
                $obs = addslashes($_POST['obs']);   
                $prod = addslashes($_POST['prod']);                
                $l->edit($data_limp,$hora_limp,$dep,$maq,$operador,$est,$prot,$pain,$chao,$prod,$quali,$obs,$id);

                 header("Location:". BASE_URL.'/limpeza');
                 exit();
            }
    
            $data['limpeza_info'] = $l->getInfo($id);
            $data['operador'] = $op->getList();
            $this->loadTemplate('limpeza_edit', $data);
        } 
        else {            
            header("Location: " . BASE_URL.'/limpeza');
        }
    }

       public function view($id){
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);   
        $data['departamento']  = array(
            'EXT' => 'Extrusão',
            'ACA' => 'Acabamento',
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
        if ($this->user->hasPermission('limpeza_edit')){ 
            $l = new Limpeza();            
            $data['limpeza_info'] = $l->getInfo($id);             
            $this->loadTemplate('limpeza_view', $data);
        } 
        else {            
            header("Location: " . BASE_URL.'/limpeza');
        }
    }


}