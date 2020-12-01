function addMp(obj){
	$('#add_mp').val('');
	var id = $(obj).attr('data-id');
	var name = $(obj).attr('data-descricao');	
	$('.searchresults').hide();
	if( $('input[name="mp['+id+']"').length == 0 ){
		var tr = '<tr>'+
				'<td>'+name+'</td>'+
				'<td>'+				
					'<input type="text" name="lote_for['+id+']" class="p_lote form-control" required/>'+				
				'</td>'+
				'<td>'+				
					'<input type="text" name="qtd['+id+']" class="p_qtd form-control" required/>'+				
				'</td>'+				
				'<td><a href="javascript:;" onclick="excluirMP(this)" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>'+
		'</tr>';		
		$('#mp_table').append(tr);
		$('.p_qtd').mask("#.##0,000", {reverse: true });
	}	

}

function excluirMP(obj){	
	$(obj).closest('tr').remove();
	
}

function validaTabela(nomeDosCampos) {
	var todosTextArea = document.getElementsByName(nomeDosCampos);
	alert('ta aqui');
	alert(todosTextArea);
	for (var i = 0; i < todosTextArea.length; i++) {
		
		var textArea = todosTextArea[i];
		if (textArea.value.length < 3) {
			alert("Não é permitido menos de 10 caracteres");
			return;
		}
	}
}

$(function(){	
	$('#hrini').mask("00:00");     
	$('#hrfim').mask("00:00");  
	$('#espessura').mask("#.##0,000", {reverse: true });
	$('#metragem').mask("#.##0,000", {reverse: true });
	$('#largura').mask("#.##0,000", {reverse: true });
	$('#peso').mask("#.##0,000", {reverse: true });
	
	// FUNCAO AJAX CARREGA OPTION OPERADOR
	$.ajax({
		type: 'POST',
		url: BASE_URL+'/ajax/buscaOperador'
	}).done(function(result){		
        $('#operador').html(result);           
	}).fail(function(){
		alert('impossivel carregar as informações do operador');
	});
	
	
	// FUNCAO DE BUSCA MP NO SISTEMA
	$('#add_mp').on('keyup', function(){				
		
		if($('#add_mp').val().length >= 2){			
			var datatype = $(this).attr('data-type');
			var f = $(this).val();
								
			$.ajax({
				url: BASE_URL+'/ajax/'+datatype,
				data: {q:f},
				type: 'GET',								
				dataType: 'json'							
			}).done(function(json){						
				if ( $('.searchresults').length == 0 ){										
						$('#add_mp').after('<div class="searchresults"></div>');												
					}
					$('.searchresults').css('left', $('#add_mp').offset().left+'px');
					$('.searchresults').css('top', $('#add_mp').offset().top+$('#add_mp').height()+'px');					
					//$('#add_mp').height()+'px');					
					var html = '';
					for(var i in json){
						html += '<div class="si"><a href="javascript:;" Onclick="addMp(this)" data-descricao="'+json[i].descricao+'" data-id="'+json[i].id+'">'+json[i].descricao+' - '+json[i].fornecedor+'</a></div>';
					}
					$('.searchresults').html(html);
					$('.searchresults').show();
			}).fail(function(){
					
			});		
		}
		else {
			$('.searchresults').hide();
		} 
	

		
	});

	// FUNÇÃO ADD
	$('#addLoteP').click(function()
	{
		var valid = true;
		var hrini = $('#hrini').val();
		var turno = $('#turno').val();
		var maquina = $('#maquina').val();  
		var op = $('#operador').val();
        var hrfim = $('#hrfim').val();
        var especificacao = $('#especificacao').val();
        var espessura = $('#espessura').val();
        var largura = $('#largura').val();
        var metragem = $('#metragem').val();
        var gramatura = $('#gramatura').val();
        var peso = $('#peso').val();		
        if(hrini < 1){
	    	setTimeout(function(){
	    		$('#hrini').focus();
	    		$('#hrini').css("border","1px solid red");
	    		$('.errorMsgHrini').text('Informe a hora iniciada');
	    		$('.errorMsgHrini').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#hrini').focus();
        		$('#hrini').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgHrini').text("");
        	},100000); 
        	valida = false;                     	
        }				
		else if(turno == null){
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

		else if(maquina == null){
			setTimeout(function(){
        		$('#maquina').focus();
        		$('#maquina').css("border","1px solid red");
        		$('.errorMsgMaquina').text('Escolha a maquina.');
        		$('.errorMsgMaquina').css("color","red");
    		});
    		setTimeout(function(){
        		$('#maquina').focus();
        		$('#maquina').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgMaquina').text("");
    		},10000); 
    		valida = false;                    
		}						
		
        else if(op == null){
	    	setTimeout(function(){
	    		$('#operador').focus();
	    		$('#operador').css("border","1px solid red");
	    		$('.errorMsgOperador').text('Escolha o Operador');
	    		$('.errorMsgOperador').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#operador').focus();
        		$('#operador').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgOperador').text("");
        	},10000); 
        	valida = false;                     	
        }

        else if(hrfim < 1){
	    	setTimeout(function(){
	    		$('#hrfim').focus();
	    		$('#hrfim').css("border","1px solid red");
	    		$('.errorMsgHrfim').text('Informe a hora finalizada');
	    		$('.errorMsgHrfim').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#hrfim').focus();
        		$('#hrfim').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgHrfim').text("");
        	},10000); 
        	valida = false;                     	
        }				

        else if(especificacao < 1){
	    	setTimeout(function(){
	    		$('#especificacao').focus();
	    		$('#especificacao').css("border","1px solid red");
	    		$('.errorMsgEspecificacao').text('Informe  as especificações medida');
	    		$('.errorMsgEspecificacao').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#especificacao').focus();
        		$('#especificacao').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgEspecificacao').text("");
        	},10000); 
        	valida = false;                     	
        }

        else if(espessura < 1){
	    	setTimeout(function(){
	    		$('#espessura').focus();
	    		$('#espessura').css("border","1px solid red");
	    		$('.errorMsgEspessura').text('Informe  as especificações medida');
	    		$('.errorMsgEspessura').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#espessura').focus();
        		$('#espessura').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgEspessura').text("");
        	},10000); 
        	valida = false;                     	
        }

        else if(largura < 1){
	    	setTimeout(function(){
	    		$('#largura').focus();
	    		$('#largura').css("border","1px solid red");
	    		$('.errorMsgLargura').text('Informe a largura da bobina');
	    		$('.errorMsgLargura').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#largura').focus();
        		$('#largura').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgLargura').text("");
        	},10000); 
        	valida = false;                     	
        }

        else if(metragem < 1){
	    	setTimeout(function(){
	    		$('#metragem').focus();
	    		$('#metragem').css("border","1px solid red");
	    		$('.errorMsgMetragem').text('Informe a metragem da bobina');
	    		$('.errorMsgMetragem').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#metragem').focus();
        		$('#metragem').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgMetragem').text("");
        	},100000); 
        	valida = false;                     	
        }

        else if(gramatura < 1){
	    	setTimeout(function(){
	    		$('#gramatura').focus();
	    		$('#gramatura').css("border","1px solid red");
	    		$('.errorMsgGramatura').text('Informe a gramatura da bobina');
	    		$('.errorMsgGramatura').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#gramatura').focus();
        		$('#gramatura').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgGramatura').text("");
        	},100000); 
        	valida = false;                     	
        }

        else if(!$("input[type='radio'][name='tipo']").is(':checked')){				
			setTimeout(function(){
	    		$('input[name="tipo"]').focus();
	    		$('input[name="tipo"]').css("border","1px solid red");
	    		$('.errorMsgTipo').text('Escolha um tipo da bobina');
	    		$('.errorMsgTipo').css("color","red");
	    	});
        	setTimeout(function(){
        		$('input[name="tipo"]').focus();
        		$('input[name="tipo"]').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgTipo').text("");
        	},10000); 
        	valida = false;                   	
		}

        else if(peso < 1){
	    	setTimeout(function(){
	    		$('#peso').focus();
	    		$('#peso').css("border","1px solid red");
	    		$('.errorMsgPeso').text('Informe o peso total da bobina');
	    		$('.errorMsgPeso').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#peso').focus();
        		$('#peso').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgPeso').text("");
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

});