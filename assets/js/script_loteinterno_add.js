$(function(){	
	// FUNCAO AJAX CARREGA OPTION OPERADOR
	$.ajax({
		type: 'POST',
		url: BASE_URL+'/ajax/buscaOperador'
	}).done(function(result){		
        $('#operador_m').html(result);
        $('#operador_g').html(result);
	}).fail(function(){
		alert('impossivel carregar as informações do operador');
	});
	
	// FUNCAO DE BUSCA MP NO SISTEMA
	$('#add_mp').on('keyup', function(){		
		var datatype = $(this).attr('data-type');
		var f = $(this).val();
		
		if(datatype != ''){								
			$.ajax({
				url: BASE_URL+'/ajax/'+datatype,
				type: 'GET',				
				data: {q:f},
				dataType: 'json'							
			}).done(function(json){		
				alert('deu certo');
				alert(json);
				if ( $('.searchresults').length == 0 ){										
						$('#add_mp').after('<div class="searchresults"></div>');												
					}
					$('.searchresults').css('left', $('#add_mp').offset().left+'px');
					$('.searchresults').css('top', $('#add_mp').offset().top+$('#add_mp').height()+'px');					
					var html = '';
					for(var i in json){
						html += '<div class="si"><a href="javascript:;" Onclick="addMp(this)" data-id="'+json[i].id+'">'+json[i].descricao+' - '+json[i].fornecedor+'</a></div>';
					}

					$('.searchresults').html(html);
					$('.searchresults').show();
			}).fail(function(){
					
			});		
		} 

		
	});



	// FUNÇÃO ADD
	$('#addLoteInt').click(function()
	{
		var valid = true;
		var turno = $('#turno').val();
		var op_m = $('#operador_m').val();
        var op_g = $('#operador_g').val();
        var batidas = $('#batidas').val();
        var composto = $('#composto').val();
        var qtd = $('#quantidade').val();
        var op_g = $('#operador_g').val();

		if(turno == null){
			setTimeout(function(){
        		$('#turno').focus();
        		$('#turno').css("border","1px solid red");
        		$('.errorMsgTurno').text('Escolha o turno.');
        		$('.errorMsgTurno').css("color","red");
    		});
    		setTimeout(function(){
        		$('#turno').focus();
        		$('#turno').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgTurno').text("");
    		},10000); 
    		valida = false;                    
		}

        else if(op_m == null){
	    	setTimeout(function(){
	    		$('#operador_m').focus();
	    		$('#operador_m').css("border","1px solid red");
	    		$('.errorMsgOperadorM').text('Escolha o Operador do Misturador');
	    		$('.errorMsgOperadorM').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#operador_m').focus();
        		$('#operador_m').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgOperadorM').text("");
        	},10000); 
        	valida = false;                     	
        }

        else if(batidas < 1){
	    	setTimeout(function(){
	    		$('#batidas').focus();
	    		$('#batidas').css("border","1px solid red");
	    		$('.errorMsgBatidas').text('Informe o Nº batidas');
	    		$('.errorMsgBatidas').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#batidas').focus();
        		$('#batidas').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgBatidas').text("");
        	},100000); 
        	valida = false;                     	
        }

        else if(composto  == null){
	    	setTimeout(function(){
	    		$('#composto').focus();
	    		$('#composto').css("border","1px solid red");
	    		$('.errorMsgComposto').text('Escolha o Composto');
	    		$('.errorMsgCompostos').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#composto').focus();
        		$('#composto').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgCompostos').text("");
        	},100000); 
        	valida = false;                     	
        }

        else if(op_g  == null){
	    	setTimeout(function(){
	    		$('#operador_g').focus();
	    		$('#operador_g').css("border","1px solid red");
	    		$('.errorMsgOperadorG').text('Escolha o operador da Granuladora');
	    		$('.errorMsgOperadorG').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#operador_g').focus();
        		$('#operador_g').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgOperadorG').text("");
        	},100000); 
        	valida = false;                     	
        }

        else if(qtd < 1){
	    	setTimeout(function(){
	    		$('#quantidade').focus();
	    		$('#quantidade').css("border","1px solid red");
	    		$('.errorMsgQtd').text('Escolha o operador que efetuou a limpeza');
	    		$('.errorMsgQtd').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#quantidade').focus();
        		$('#quantidade').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgQtd').text("");
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