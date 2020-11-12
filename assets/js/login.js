$(document).ready(function(){
	// FUNCAO AJAX CARREGA OPTION USUARIO			
	$('#btn_teste').click(function(event){			
		$.ajax({
			type: 'POST',
			url: BASE_URL+'/ajax/buscaUserLogin'
			}).done(function(result){
				alert(result);
				$('#user').html(result);
			}).fail(function(){
				alert('impossivel carregar as informações do operador');
			});
	});	
});