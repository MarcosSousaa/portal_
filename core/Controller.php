<?php 

class Controller{
	public function __construct(){

	}

	public function loadView($viewName, $viewData = array()){
		/** extract transformar as chaves do array em variaveis para acessar na view
         *  $viewData = array('nome' => 'Teste', 'idade' => 20);
         *  $nome = teste;
         *  $idade = 20;
         */
		extract($viewData);
        if(file_exists('./views/card/'. $viewName . '.php')){
            include './views/card/'. $viewName . '.php';    
        }
        if(file_exists('./views/chaves/'. $viewName . '.php')){
            include './views/chaves/'. $viewName . '.php';    
        }
        if(file_exists('./views/graficos/'. $viewName . '.php')){
            include './views/graficos/'. $viewName . '.php';    
        }
        if(file_exists('./views/home/'. $viewName . '.php')){
            include './views/home/'. $viewName . '.php';    
        }
        if(file_exists('./views/limpeza/'. $viewName . '.php')){
            include './views/limpeza/'. $viewName . '.php';    
        }
        if(file_exists('./views/login/'. $viewName . '.php')){
            include './views/login/'. $viewName . '.php';    
        }
        if(file_exists('./views/operador/'. $viewName . '.php')){
            include './views/operador/'. $viewName . '.php';    
        }
        if(file_exists('./views/painel/'. $viewName . '.php')){
            include './views/painel/'. $viewName . '.php';    
        }
        if(file_exists('./views/permissions/'. $viewName . '.php')){
            include './views/permissions/'. $viewName . '.php';    
        }
        if(file_exists('./views/producao/'. $viewName . '.php')){
            include './views/producao/'. $viewName . '.php';    
        }
         if(file_exists('./views/records/'. $viewName . '.php')){
            include './views/records/'. $viewName . '.php';    
        }
        if(file_exists('./views/reports/'. $viewName . '.php')){
            include './views/reports/'. $viewName . '.php';    
        }
        if(file_exists('./views/users/'. $viewName . '.php')){
            include './views/users/'. $viewName . '.php';    
        }
        if(file_exists('./views/veiculos/'. $viewName . '.php')){
            include './views/veiculos/'. $viewName . '.php';    
        }
        if(file_exists('./views/matprima/'. $viewName . '.php')){
            include './views/matprima/'. $viewName . '.php';    
        }
        if(file_exists('./views/loteint/'. $viewName . '.php')){
            include './views/loteint/'. $viewName . '.php';    
        }
        if(file_exists('./views/loteprandi/'. $viewName . '.php')){
            include './views/loteprandi/'. $viewName . '.php';    
        }
		
	}

	public function loadTemplate($viewName, $viewData = array()) {
        include './views/template.php';
    }
    
    public function loadViewInTemplate($viewName, $viewData = array()) {
        extract($viewData);
        if(file_exists('./views/card/'. $viewName . '.php')){
            include './views/card/'. $viewName . '.php';    
        }
          if(file_exists('./views/chaves/'. $viewName . '.php')){
            include './views/chaves/'. $viewName . '.php';    
        }
        if(file_exists('./views/graficos/'. $viewName . '.php')){
            include './views/graficos/'. $viewName . '.php';    
        }
        if(file_exists('./views/home/'. $viewName . '.php')){
            include './views/home/'. $viewName . '.php';    
        }
        if(file_exists('./views/limpeza/'. $viewName . '.php')){
            include './views/limpeza/'. $viewName . '.php';    
        }
        if(file_exists('./views/login/'. $viewName . '.php')){
            include './views/login/'. $viewName . '.php';    
        }
        if(file_exists('./views/operador/'. $viewName . '.php')){
            include './views/operador/'. $viewName . '.php';    
        }
        if(file_exists('./views/painel/'. $viewName . '.php')){
            include './views/painel/'. $viewName . '.php';    
        }
        if(file_exists('./views/permissions/'. $viewName . '.php')){
            include './views/permissions/'. $viewName . '.php';    
        }
        if(file_exists('./views/producao/'. $viewName . '.php')){
            include './views/producao/'. $viewName . '.php';    
        }
         if(file_exists('./views/records/'. $viewName . '.php')){
            include './views/records/'. $viewName . '.php';    
        }
        if(file_exists('./views/reports/'. $viewName . '.php')){
            include './views/reports/'. $viewName . '.php';    
        }
        if(file_exists('./views/users/'. $viewName . '.php')){
            include './views/users/'. $viewName . '.php';    
        }
        if(file_exists('./views/veiculos/'. $viewName . '.php')){
            include './views/veiculos/'. $viewName . '.php';    
        }
        if(file_exists('./views/matprima/'. $viewName . '.php')){
            include './views/matprima/'. $viewName . '.php';    
        }
        if(file_exists('./views/loteint/'. $viewName . '.php')){
            include './views/loteint/'. $viewName . '.php';    
        }
        if(file_exists('./views/loteprandi/'. $viewName . '.php')){
            include './views/loteprandi/'. $viewName . '.php';    
        }
    }

}