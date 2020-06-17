$(document).ready(function () {    
    /*
     * Pagina de Permissões [troca de abas]
     */
    $('.tabbody').hide();
    $('.tabbody').eq(0).show();

    $('.nav-item').on('click', function(){
        $('.active').removeClass('active');
        $(this).find('a').addClass('active');
        var item = $(this).index();     
        $('.tabbody').hide();       
        $('.tabbody').eq(item).show();
    });

});