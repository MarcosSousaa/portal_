$(document).ready(function () {
    $('#btn-filtro').show();
    $('.filtro-data').hide();
    /*
     * Pagina de Registros [escolha a tabela]
     */
    //quando iniciar esconde todas as tabelas  
    $('#btn-filtro').click(function(){
        $('#btn-filtro').hide();
        $('.filtro-data').show();

        $('#p_registro').on('change', function(){
            var tipoReg = $('#p_registro').val();
            $('form').submit();    
        });
    });
  
    /*
    $('#p_registro').on('change', function () {
            //$('.filtro-data').show();
            var item = $('#p_registro').val();
            $('.tabBodyRegistros').hide();                
            $('.tabBodyRegistros').eq(item).show();
    });
    */
     
});