<?php date_default_timezone_set('America/Sao_Paulo'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Indústria Bandeirante de Plásticos></title>
        <link rel="stylesheet" href="<?= BASE_URL ?>/assets/bootstrap/css/bootstrap.min.css">
        <link href="<?= BASE_URL ?>/assets/css/template.css" rel="stylesheet"/>
        <link href="<?= BASE_URL ?>/assets/css/graphic.css" rel="stylesheet"/> 
        <link href="<?= BASE_URL ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand bg-red">
            <a class="navbar-brand" href="index.html">
                <img src="<?= BASE_URL ?>/assets/images/logo_branco.png" height="50" width="50">
            </a>
            <button class="btn btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fa fa-bars"></i></button>
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                   <span style="color: white">User : <?=$viewData['info_template']['nome_usuario'] ?></span>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">                
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>/login/logout" role="button"><i class="fa fa-sign-out"></i></a>
                   
                </li>
            </ul>
        </nav>
                <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-red" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">                            
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <?php 
                                for($i = 0; $i< sizeof($viewData['info_template']['menu_descricao']);$i++){
                                    echo '<a class="nav-link" href="'.BASE_URL.$viewData['info_template']['menu_caminho'][$i].'"><div class="sb-nav-link-icon"><i class="'.$viewData['info_template']['menu_class'][$i].'"></i></div>'.$viewData['info_template']['menu_descricao'][$i].'</a>';
                                }    

                             ?>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <?php $this->loadViewInTemplate($viewName, $viewData) ?>        
                    </div>
                </main>
                
            </div>
        </div>
        <script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
        <script type="text/javascript">
            var BASE_URL = "<?= BASE_URL ?>";
        </script>
        <script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script.js"></script>        
        <script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.mask.js"></script>
        <script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="<?= BASE_URL ?>/assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>