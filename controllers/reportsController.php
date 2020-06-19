<?php
date_default_timezone_set('America/Sao_Paulo');
use Mpdf\Mpdf;
require_once './libs/vendor/autoload.php';

class ReportsController extends Controller {
	private $user;
    private $menu;
    private $card;
    
	public function __construct(){
		$this->user = new Users();
        $this->menu = new Menu();  
        $this->card = new Card();    
		if(!$this->user->isLogged()){
			header("Location:".BASE_URL."login");
			exit();
		}
		$this->user->setLoggedUser();
        $this->menu->setMenu($this->user->getIdGroup());    
        $this->card->setCard($this->user->getIdGroup(),'Reports'); 
	}

	public function index(){
		$data = array();
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);    	
        $data['acesso'] = $this->user->getGroupName($this->user->getId());
		if($this->user->hasPermission('report_view')){
			$this->loadTemplate('report', $data);
		}else {
			header("Location:".BASE_URL);
		}
	}

	public function chaves(){
		$data = array();
	    // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);    
        if($this->user->hasPermission('report_chaves')){
        	$this->loadTemplate('report_chaves', $data);
        }else {
        	header("Location: ". BASE_URL);
        	exit();
        }		
	}

    public function chaves_report(){
        if($this->user->hasPermission('report_chaves')){
            $chave_name = addslashes($_GET['chave_name']);
            $local_name = addslashes($_GET['local_name']);            
            $chave = new Chaves();
            $data['stylesheet'] = '/assets/bootstrap/css/bootstrap.min.css';   
            $data['chave_list'] = $chave->getChaveFiltrada($chave_name,$local_name);
            $data['filters'] = $_GET;            
            $this->loadView('report_chaves_pdf', $data);                        

        }else {
            header("Location:" . BASE_URL);
            exit;
        }
    }

	public function veiculos(){
		$data = array();
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);   
        if($this->user->hasPermission('report_veiculos')){
        	$this->loadTemplate('report_veiculos', $data);
        }else {
        	header("Location: ". BASE_URL);
        	exit();
        }		
	}

    public function veiculos_report(){
        if($this->user->hasPermission('report_veiculos')){
            $motorista = addslashes($_GET['veiculo_motorista']);
            $placa = addslashes($_GET['veiculo_placa']);            
            $empresa = addslashes($_GET['veiculo_empresa']);  
            $tipo = addslashes($_GET['tipo']);          
            $status = addslashes($_GET['status']);          
            $veiculo = new Veiculos();
            $data['stylesheet'] = '/assets/bootstrap/css/bootstrap.min.css';  
            $data['veiculo_list'] = $veiculo->getVeiculoFiltrado($motorista,$placa,$empresa,$tipo,$status);
            $data['filters'] = $_GET;                        
            $this->loadView('report_veiculos_pdf', $data);            
        }else {
            header("Location:" . BASE_URL);
            exit;
        }
    }

    public function entradaSaidaVeiculos(){
        $data = array();
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);   
        if($this->user->hasPermission('report_entsaiveiculos')){
            $this->loadTemplate('report_entsaiveiculos', $data);
        }else {
            header("Location: ". BASE_URL);
            exit();
        }       
    }

    public function entsaiveiculos_report(){
        if($this->user->hasPermission('report_entsaiveiculos')){                
            $data1 = addslashes($_GET['ent_sai_data_inicial']);            
            $data2 = addslashes($_GET['ent_sai_data_final']);            
            $placa = addslashes(strtoupper($_GET['ent_sai_placa']));  
            $motorista = addslashes(strtoupper($_GET['ent_sai_motorista']));          
            $empresa = addslashes(strtoupper($_GET['ent_sai_empresa']));          
            $tipo = '2';
            $records = new Records(); 
            $data['records_list'] = $records->getEntradaSaida($data1,$data2,$placa,$motorista,$empresa,$tipo);                                    
            $data['filters'] = $_GET;
            $data['stylesheet'] = '/assets/bootstrap/css/bootstrap.min.css';
            $this->loadView('report_entsaiveiculos_pdf', $data);            

        }else {
            header("Location:" . BASE_URL);
            exit;
        }
    }

    public function recebimentoColeta(){
        $data = array();
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);   
        if($this->user->hasPermission('report_recebcoleta')){
            $this->loadTemplate('report_recebcoleta', $data);
        }else {
            header("Location: ". BASE_URL);
            exit();
        }       
    }

     public function recebimentoColeta_report(){
        if($this->user->hasPermission('report_recebcoleta')){           
            $data1 = addslashes($_GET['receb_colet_data_inicial']);            
            $data2 = addslashes($_GET['receb_colet_data_final']);            
            $placa = addslashes(strtoupper($_GET['receb_colet_placa']));  
            $motorista = addslashes(strtoupper($_GET['receb_colet_motorista']));          
            $empresa = addslashes(strtoupper($_GET['receb_colet_empresa']));          
            $tipo = '1';
            $records = new Records(); 
            $data['stylesheet'] = '/assets/bootstrap/css/bootstrap.min.css';
            $data['records_list'] = $records->getRecebColet($data1,$data2,$placa,$motorista,$empresa,$tipo);                                    
            $data['filters'] = $_GET;                       
            $this->loadView('report_recebcoleta_pdf', $data);            

        }else {
            header("Location:" . BASE_URL);
            exit;
        }
    }

    public function controleChaves(){
        $data = array();
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);   
        if($this->user->hasPermission('report_controlechaves')){
            $this->loadTemplate('report_controleChaves', $data);
        }else {
            header("Location: ". BASE_URL);
            exit();
        }       
    }

     public function controleChaves_report(){
        if($this->user->hasPermission('report_controlechaves')){           
            $data1 = addslashes($_GET['control_chaves_data_inicial']);            
            $data2 = addslashes($_GET['control_chaves_data_final']);            
            $local = addslashes(strtoupper($_GET['control_chaves_local']));            
            $tipo = '0';
            $records = new Records(); 
            $data['stylesheet'] = '/assets/bootstrap/css/bootstrap.min.css';   
            $data['records_list'] = $records->getControleChaves($data1,$data2,$local,$tipo);
            $data['filters'] = $_GET;                      
            $this->loadView('report_controleChaves_pdf', $data);            

        }else {
            header("Location:" . BASE_URL);
            exit;
        }
    }

    public function producao(){
        $data = array();
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);   
        if($this->user->hasPermission('report_producao')){
            $this->loadTemplate('report_producao', $data);
        }else {
            header("Location: ". BASE_URL);
            exit();
        }       
    }

    public function producao_report(){
        if($this->user->hasPermission('report_producao')){           
            $data1 = addslashes($_GET['producao_data_inicial']);
            $data2 = addslashes($_GET['producao_data_final']);
            $pedido = addslashes($_GET['pedido']);
            $turno = addslashes($_GET['turno']);
            $lote = addslashes($_GET['lote']);
            $ext = addslashes($_GET['ext']);            
            $p = new Producao();
            $data['stylesheet'] = '/assets/bootstrap/css/bootstrap.min.css';   
            $data['producao_list'] = $p->getReportProducao($data1,$data2,$pedido,$turno,$lote,$ext); 

            $data['filters'] = $_GET;       
            $data['turno'] = array(
                '001' => 'MANHA',
                '002' => 'TARDE',
                '003' => 'NOITE'
            );   
            $this->loadView('report_producao_pdf', $data);            
        }else {
            header("Location:" . BASE_URL);
            exit;
        }
    }


    public function perda(){
        $data = array();
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);    
        if($this->user->hasPermission('report_perda')){
            $this->loadTemplate('report_perda', $data);
        }else {
            header("Location: ". BASE_URL);
            exit();
        }       
    }
        public function perda_report(){
        if($this->user->hasPermission('report_producao')){           
            $data1 = addslashes($_GET['perda_data_inicial']);
            $data2 = addslashes($_GET['perda_data_final']);
            $turno = addslashes($_GET['turno']); 
            $dep = addslashes($_GET['dep']); 
            $maq = addslashes($_GET['maq']);            
            $p = new Producao(); 
            $data['stylesheet'] = '/assets/bootstrap/css/bootstrap.min.css';  
            $data['perda_list'] = $p->getReportperda($data1,$data2,$turno,$dep,$maq);        
            $data['filters'] = $_GET;       
            $data['turno'] = array(
                '001' => 'MANHA',
                '002' => 'TARDE',
                '003' => 'NOITE'
            );  

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

        $data['produto'] = array(
            'BAN' => 'Banstretch',
            'COS' => 'Coex Standard',
            'COP' => 'Coex Plus',
            'ENC' => 'Encolhivel',
            'EST' => 'Esticavel',            
            'SKI' => 'Skin'
        ); 
        $this->loadView('report_perda_pdf', $data);

        }else {
            header("Location:" . BASE_URL);
            exit;
        }
    }

    public function limpeza(){
        $data = array();
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);    
        if($this->user->hasPermission('report_limpeza')){
            $this->loadTemplate('report_limpeza', $data);
        }else {
            header("Location: ". BASE_URL);
            exit();
        }       
    }

    public function limpeza_report(){
        if($this->user->hasPermission('report_limpeza')){           
            $data1 = addslashes($_GET['limpeza_data_inicial']);
            $data2 = addslashes($_GET['limpeza_data_final']);
            $dep = addslashes($_GET['dep']);
            $maq = addslashes($_GET['maq']); 
            $operador = addslashes($_GET['operador']);            
            $l = new Limpeza(); 
            $data['stylesheet'] = '/assets/bootstrap/css/bootstrap.min.css';  
            $data['limpeza_list'] = $l->getReportLimpeza($data1,$data2,$dep,$maq,$operador);        
            $data['filters'] = $_GET;                   
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
            $this->loadView('report_limpeza_pdf', $data);
        }else {
            header("Location:" . BASE_URL);
            exit;
        }
    }

}