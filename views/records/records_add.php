<style type="text/css">
    section {
        display: contents;
    }    

</style>
<h3><center>Registros - Adicionar</center></h3>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?= $error_msg ?></div>
<?php endif; ?>
<h4 id="titulo-registro"></h4>
 <form method="post">
    <div class="row">
        <div class="form-group col-md-4">
            <label for="tipoReg">Tipo Registro</label>
            <select class="form-control" id="tipoReg" name="tipo" class="form-control">
                <option disabled selected>Escolha uma opção</option>
                <option value="0">Retirada - Chaves</option>
                <option value="1">Retira / Recebimento</option>
                <option value="2">Entrada - Veículo</option>
            </select>                   
        </div>
        <section class="padrao">
            <div class="form-group col-md-3 ">
                <label for="">Data</label>
                <input type="date" name="data_er" id="data_er" value="<?php echo date('Y-m-d');?>" class="form-control">           
            </div>                      
            <div class="form-group col-md-3 ">
                <label for="">Horario</label>
                <input type="text" name="hora_er" id="hora_er" class="form-control">       
            </div>
                      
        </section>                 
    </div>    
    
    
        
    <div class="row">       
        <section id="tipoChaves">
            <div class="form-group col-md-3">
                <label for="chaves">Chaves</label>
                <select class="form-control" id="chaves"></select>
                <span class="errorMsgChave"></span>   
            </div>
            <div class="form-group col-md-3">
                <label for="colab_ret">Colaborador Retira</label>
                <input type="text"  id="colab_ret" class="form-control">
                <span class="errorMsgColab"></span>
            </div>          
        </section>
        <section id="tipoServico">
            
            <div class="form-group col-md-2">
                <label for="visitante">Visitante</label>
                <select class="form-control" id="visitante" name="visitante">
                    <option disabled selected>Visitante</option>
                    <option value="1">Sim</option>
                    <option value="0" selected="">Não</option>                
                </select>          
            </div>
            <div class="form-group col-md-3">
                <label for="placa-reg">Placa</label>
                <input type="text" id="placa-reg" placeholder="informe a placa" class="form-control placa" name="">
                <span class="errorMsgPlaca"></span>
                <input type="hidden" id="ukVeiculo">
            </div>
            <div class="form-group col-md-3">
                <label for="nome-reg">Nome Motorista</label>
                <input type="text" id="nome-reg" class="form-control" disabled>
                <span class="errorMsgMot"></span>
            </div> 
            <div class="form-group col-md-2">
                <label for="rg-entrada">RG Motorista</label>
                <input type="text"  id="rg-entrada" name="rg-entrada" disabled class="form-control">
                <span class="errorMsgRG"></span>
            </div>                   
            <div class="form-group col-md-3">
                <label for="empresa-reg">Empresa Motorista</label>
                <input type="text" id="empresa-reg" class="form-control" disabled>
                <span class="errorMsgEmp"></span>
            </div>            
        </section>
        <section id="tipoRecebimento">
            <div class="form-group col-md-7">
                <label for="tipo_vr">Tipo Veículo</label>
                <select class="form-control" id="tipo_vr">
                    <option disabled selected>Escolha uma opção</option>
                    <option value="CAMINHAO">Caminhão</option>
                    <option value="CARRO">Carro</option>
                    <option value="MOTO">Moto</option>
                </select>
                <span class="errorMsgTipo"></span>           
            </div>
            <div class="form-group col-md-2">
                <label for="placa_r">Placa Veículo</label>
                <input type="text"  id="placa_r"  class="form-control placa">
                <span class="errorMsgPlacaReceb"></span>
            </div>      
            
            <div class="form-group col-md-3">
                <label for="nome_reg">Nome Motorista</label>
                <input type="text"  id="nome_reg" class="form-control">
                <span class="errorMsgMotReceb"></span>
            </div>          
            <div class="form-group col-md-3">
                <label for="reg">RG Motorista</label>
                <input type="text"  id="reg"  name="rg" class="form-control">
                <span class="errorMsgRGReceb"></span>
            </div>          
            <div class="form-group col-md-3">
                <label for="empresa_reg">Empresa Motorista</label>
                <input type="text"   id="empresa_reg" class="form-control">
                <span class="errorMsgEmpReceb"></span>
            </div>              
        </section>       
    </div>
    <br><br>
    <div class="form-group col-md-6">
        <label for="obs_reg" id="lbl_reg">Observações</label>
        <textarea  class="form-control" rows="5" name="obs_reg"  id="obs_reg" style="text-align:left;"></textarea>
        <span class="errorMsgObs"></span>
    </div>                          
    <div class="alert alert-danger" id="msg-veiculos" role="alert">
        <a href="#janela1" id="modal" rel="modal">CLIQUE AQUI</a>
    </div>                  
    <input type="button" class="btn btn-primary" value="Adicionar" id="addRegistro" />
    <a class="btn btn-info" href="<?= BASE_URL?>/records">VOLTAR</a>
                            
 </form> 
<div class="window" id="janela1">
    <a href="#" class="close"> X </a>    
        <h5><span class="msgTitle"></span> - CADASTRAR VEICULO</h5>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="tipo">Tipo</label>
                <select name="tipo" id="tipo" class="form-control">
                    <option value="CARRO">Carro</option>
                    <option value="MOTO">Moto</option>            
                </select>
                 <span class="errorMsgTipoCad"></span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="motorista">Motorista</label>
                <input type="text" name="motorista"  id="motorista" placeholder="INFORME O NOME DO MOTORISTA" class="form-control">
                <span class="errorMsgMotCad"></span>   
            </div>
            <div class="form-group col-md-3">
                <label for="placa">Placa</label>
                <input type="text" name="placa_c" id="placa" placeholder="INFORME A PLACA DO VEICULO" class="form-control">
                <span class="errorMsgPlacaCad"></span>
            </div>
            <div class="form-group col-md-6">
                <label for="empresa">Empresa</label>
                <input type="text" name="empresa" id="empresa" placeholder="INFORMA O NOME DA EMPRESA" class="form-control">
                <span class="errorMsgEmpCad"></span>
            </div>
        </div>
        <button class="btn btn-primary" id="adcVeiculo" data-type="cadVeiculos">Adicionar</button>              
</div>    
<div id="mascara"></div>

<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>/assets/js/script_records_add.js"></script>