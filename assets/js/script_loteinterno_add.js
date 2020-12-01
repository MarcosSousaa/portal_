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
				'<td>'+				
					'<select name="tipo['+id+']" class="form-control"><option value="0001">%</option><option value="0002">KG</option></select>'+				
				'</td>'+				
				'<td><a href="javascript:;" onclick="excluirMP(this)" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>'+
		'</tr>';		
		$('#mp_table').append(tr);
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
	$('#quantidade').mask("#.##0,000", {reverse: true });
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
		var lote_for = 'lote_for';
		validaTabela(lote_for);
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

});