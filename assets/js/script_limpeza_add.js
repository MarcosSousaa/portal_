$(document).ready(function(){
	$('input[name="prod"]').val('Pano - Limpador Desengraxante e Alcool');
	// MASCARA	
	$('#hrlimp').mask("00:00");
	// FUNCAO AJAX CARREGA OPTION OPERADOR
	$.ajax({
		type: 'POST',
		url: BASE_URL+'/ajax/buscaOperador'
	}).done(function(result){		
		$('#operador').html(result);
	}).fail(function(){
		alert('impossivel carregar as informações do operador');
	});
	/* FUNCAO PARA SELECIONAR OPTION DE ACORDO COM A ESCOLHA*/
	var maquinas = {
		EXT : ['EXT01','EXT02','EXT03','EXT04','EXT05'],
		DIS : ['REF01','REF02','REF03','REF04','REF05'],
		ACA : ['REB01','REB02','REB03','REB04','REB05','REB06','REB07','RAC01','RAC02'],
		MIS : ['GRA01','GRA02','GRA03','MIS01','MIS02','MOI01','MOI02','MOI03','MOI04'],
		PRA : ['PRA01','PRA02'],
		IMP : ['IMP01','IMP02'],
		TUB : ['TUB08','TUB09','TUB10','TUB11','TUB12','TUB13','TUB14','TUB15','TUB16','EST01']
	}

	$maquina = $('#maq option');
	$('#dep').on('change', function(event){
		var dep = this.value;
		$maquina.each(function(index,el){
	 		// Verifica se a maquina atual existe na relação
      		// de maquians para o departamento selecionado
      		if(maquinas[dep].indexOf(el.value) == -1) // Não existe
      			$(el).prop('disabled', true); // Desabilita a acomodação
      		else // Existe
        		$(el).prop('disabled', false); // Habilita a acomodação
		});
	}).change();

	// FUNÇÃO ADD
	$('#addLimp').click(function()
	{
		var valid = true;
		var hrlimp = $('#hrlimp').val();
		var ext = $('#extrusora_limp').val();
		var op = $('#operador').val();

		if(hrlimp.length < 1){
			setTimeout(function(){
        		$('#hrlimp').focus();
        		$('#hrlimp').css("border","1px solid red");
        		$('.errorMsgHor').text('informe o horario da limpeza da maquina.');
        		$('.errorMsgHor').css("color","red");
    		});
    		setTimeout(function(){
        		$('#hrlimp').focus();
        		$('#hrlimp').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgHor').text("");
    		},10000); 
    		valida = false;                    
		}

        else if(ext = null){
	    	setTimeout(function(){
	    		$('#extrusora_limp').focus();
	    		$('#extrusora_limp').css("border","1px solid red");
	    		$('.errorMsgColab').text('Escolha a extrusora que foi feito a limpeza');
	    		$('.errorMsgColab').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#extrusora_limp').focus();
        		$('#extrusora_limp').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgColab').text("");
        	},10000); 
        	valida = false;                     	
        }

        else if(op = null){
	    	setTimeout(function(){
	    		$('#operador').focus();
	    		$('#operador').css("border","1px solid red");
	    		$('.errorMsgColab').text('Escolha o operador que efetuou a limpeza');
	    		$('.errorMsgColab').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#operador').focus();
        		$('#operador').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgColab').text("");
        	},100000); 
        	valida = false;                     	
        }

        else {        	
        	valida = true;
        	if(valida){
        		$('form').submit();
        	}
        }
	});

	$('#upLimp').click(function(){
		var valid = true;				
		if(!$("input[type='radio'][name='quali']").is(':checked')){				
			setTimeout(function(){
	    		$('input[name="quali"]').focus();
	    		$('input[name="quali"]').css("border","1px solid red");
	    		$('.errorMsgSitu').text('Escolha uma situação de aprovação');
	    		$('.errorMsgSitu').css("color","red");
	    	});
        	setTimeout(function(){
        		$('input[name="quali"]').focus();
        		$('input[name="quali"]').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgSitu').text("");
        	},10000); 
        	valida = false;                   	
		}
		else {			
			valida = true;
        	if(valida){
        		$('form').submit();
        	}	
		}
	});

});