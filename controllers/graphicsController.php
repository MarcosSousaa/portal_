<?php
date_default_timezone_set('America/Sao_Paulo');
use Mpdf\Mpdf;
require_once './libs/vendor/autoload.php';
class graphicsController extends Controller {
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
        $this->card->setCard($this->user->getIdGroup(),'Graficos');    
    }

    public function index(){
        $data = array();
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);         
        $data['acesso'] = $this->user->getGroupName($this->user->getId());
        if($this->user->hasPermission('graphics_view')){
            $this->loadTemplate('graphics', $data);
        }else {
            header("Location:".BASE_URL);
        }
    }

    public function producao(){
        $data = array();
        // informações para o template
        $data['info_template'] = Utilities::loadTemplateBase($this->user,$this->menu,$this->card);     
        if($this->user->hasPermission('graphics_producao')){
            $this->loadTemplate('graphics_producao', $data);
        }else {
            header("Location: ". BASE_URL.'/graphics');
            exit();
        }       
    }

    public function producao_graphics(){
        $data = array();
   
        if($this->user->hasPermission('graphics_producao')){
            if(isset($_GET['data1']) && isset($_GET['data2'])){
                $p = new Producao();
                $o = new Operador();
                $data['stylesheet'] = '/assets/bootstrap/css/bootstrap.min.css';  
                //$data['stylesheet'] = '/assets/css/graphic.css'; 
                $data1 = addslashes($_GET['data1']);
                $data2 = addslashes($_GET['data2']);                
                $data['data1'] = $data1;
                $data['data2'] = $data2;     
                /* SETA TURNO */
                $data['turno'] = array(
                    '001' => 'MANHA',
                    '002' => 'TARDE',
                    '003' => 'NOITE'
                );
                $data['maquina'] = array(
                    'EXT01' => '01',
                    'EXT02' => '02',
                    'EXT03' => '03',
                    'EXT04' => '04',
                    'EXT05' => '05'
                );                
                /* GERACAO DADOS DO GRAFICO */           
                $data['total_producao'] = $p->totalProd($data1,$data2);
                
                $data['total_perda'] = $p->totalPerda($data1,$data2);
                $data['total_producao_ext'] = $p->totalProdExt($data1,$data2);
                $data['total_perda_ext'] = $p->totalPerdaExt($data1,$data2);
                $data['total_producao_turno'] = $p->totalProdTurno($data1,$data2);
                $data['total_perda_turno'] = $p->totalPerdaTurno($data1,$data2);
                $data['total_producao_op'] = $p->totalProdOperador($data1,$data2);                
                $data['operador'] = $o->buscaOperador($data1,$data2);
                $data['total_perda_apara'] = $p->totalPerdaApara($data1,$data2);                
                $data['total_perda_refile'] = $p->totalPerdaRefile($data1,$data2);                
                $data['total_perda_borra'] = $p->totalPerdaBorra($data1,$data2);                
                $data['total_perda_acabamento'] = $p->totalPerdaAcabamento($data1,$data2);                
                /* VERIFICA A DIFERENCA DE DIAS EM SEGUNDOS*/                
                $timeInicial = strtotime($data1);
                $timeFinal = strtotime($data2);     
                $dif = $timeFinal - $timeInicial; 
                /* TRANSFORMA EM SEGUNDOS EM DIA*/
                $data['dias'] = (int)floor($dif / (60 * 60 * 24));
                /* FORMULA PARA PREENCHER AS D/M*/
                for($q = $data['dias'];$q>0;$q--){
                    $data['days_list'][] = date('d/m', strtotime($data2.'-'.$q.' days'));                    
                }                
                $this->loadView('graphics_producao_',$data);
            }else{
                header("Location: ". BASE_URL.'/graphics');
                exit();    
            }
            
        }   
    }
}