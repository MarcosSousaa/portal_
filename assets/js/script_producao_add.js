$(document).ready(function(){
	// MASCARA	
	$('#hrini').mask("00:00");
	$('#hrfim').mask("00:00");
    $('#rpm').mask("00.00");
    $('#tempoparada').mask("00:00");

    $('#sobrabobkg').mask("#.##0,000", {reverse: true});
	$('#peso_bob').mask("#.##0,000", {reverse: true });
    $('#total').mask("#.##0,000", {reverse: true });
    $('#larg').mask("#.##0,000", {reverse: true });
    $('#esp').mask("#.##0,000", {reverse: true });
    $('#metrag').mask("#.##0,000", {reverse: true });
    $('#apara').mask("#.##0,000", {reverse: true });
    $('#refile').mask("#.##0,000", {reverse: true });
    $('#borra').mask("#.##0,000", {reverse: true });
    $('#acabamento').mask("#.##0,000", {reverse: true });
	// FUNCAO AJAX CARREGA OPTION OPERADOR
	$.ajax({
		type: 'POST',
		url: BASE_URL+'/ajax/buscaOperador'
	}).done(function(result){		
		$('#operador').html(result);
	}).fail(function(){
		alert('impossivel carregar as informações do operador');
	});

	// CALCULA TOTAL DE KG
	// FUNCOES BD(AJAX)
    $('#quantidade').on('blur', function(){
        var qtd = $('#quantidade').val();
        var peso = $('#peso_bob').val().replace(",", ".");
        var total = peso * qtd;       
        $('#total').val(total);        

    });
    $('#peso_bob').on('blur', function(){
        var qtd = $('#quantidade').val();
        var peso = $('#peso_bob').val();
        var total = peso * qtd;       
        $('#total').val(total);        
    }); 


	// FUNÇÃO ADD
	$('#addProd').click(function(){
		var valid = true;		
		var ext = $('#extrusora_prod').val();		
		var turno = $('#turno_prod').val();
		var operador = $('#operador').val();
		var hri = $('#hrini').val();		
		var pedido = $('#pedido').val();
		var op = $('#ordem').val();
		var lote = $('#lote').val();
		var peso = $('#peso_bob').val();
		var qtd = $('#quantidade').val();			
		var hrfim = $('#hrfim').val();		
        if(ext == null){
	    	setTimeout(function(){
	    		$('#extrusora_prod').focus();
	    		$('#extrusora_prod').css("border","1px solid red");
	    		$('.errorMsgExt').text('Escolha a extrusora que foi produzido o material');
	    		$('.errorMsgExt').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#extrusora_prod').focus();
        		$('#extrusora_prod').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgExt').text("");
        	},10000); 
        	valida = false;                     	
        }
        else if(turno == null){
        	setTimeout(function(){
        		$('#turno_prod').focus();
        		$('#turno_prod').css("border","1px solid red");
        		$('.errorMsgTurno').text('Escolha qual turno foi produzido');
        		$('.errorMsgTurno').css("color","red");
        	});
        	setTimeout(function(){
        		$('#turno_prod').focus();
        		$('#turno_prod').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgTurno').text("");	
        	},10000);
        	valida = false;
        }
        else if(operador == null){
	    	setTimeout(function(){
	    		$('#operador').focus();
	    		$('#operador').css("border","1px solid red");
	    		$('.errorMsgOperador').text('Escolha o operador que efetuou a produção');
	    		$('.errorMsgOperador').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#operador').focus();
        		$('#operador').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgOperador').text("");
        	},10000); 
        	valida = false;                     	
        }
        else if(hri < 1){
        	setTimeout(function(){
	    		$('#hrini').focus();
	    		$('#hrini').css("border","1px solid red");
	    		$('.errorMsgHorIni').text('Informe o horario de inicio da produção');
	    		$('.errorMsgHorIni').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#hrini').focus();
        		$('#hrini').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgSituIni').text("");
        	},10000); 
        	valida = false;        	
        }

        else if(!$("input[type='radio'][name='aprovacaoini']").is(':checked')){				
			setTimeout(function(){
	    		$('input[name="aprovacaoini"]').focus();
	    		$('input[name="aprovacaoini"]').css("border","1px solid red");
	    		$('.errorMsgSitu').text('Escolha uma aprovação de inicio');
	    		$('.errorMsgSitu').css("color","red");
	    	});
        	setTimeout(function(){
        		$('input[name="aprovacaoini"]').focus();
        		$('input[name="aprovacaoini"]').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgSitu').text("");
        	},10000); 
        	valida = false;                   	
		}
        else if(pedido < 1 ){
        	setTimeout(function(){
	    		$('#pedido').focus();
	    		$('#pedido').css("border","1px solid red");
	    		$('.errorMsgPedido').text('Informe o numero do pedido');
	    		$('.errorMsgPedido').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#pedido').focus();
        		$('#pedido').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgPedido').text("");
        	},10000); 
        	valida = false;        		
        }

       	else if(op < 1 ){
        	setTimeout(function(){
	    		$('#ordem').focus();
	    		$('#ordem').css("border","1px solid red");
	    		$('.errorMsgOrdem').text('Informe o numero da ordem');
	    		$('.errorMsgOrdem').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#ordem').focus();
        		$('#ordem').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgOrdem').text("");
        	},10000); 
        	valida = false;        		
        }

       	else if(lote < 1 ){
        	setTimeout(function(){
	    		$('#lote').focus();
	    		$('#lote').css("border","1px solid red");
	    		$('.errorMsgLote').text('Informe o numero do pedido');
	    		$('.errorMsgLote').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#lote').focus();
        		$('#lote').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgLote').text("");
        	},10000); 
        	valida = false;        		
        }

        else if(peso < 1 ){
        	setTimeout(function(){
	    		$('#peso_bob').focus();
	    		$('#peso_bob').css("border","1px solid red");
	    		$('.errorMsgPeso').text('Informe o peso da bob');
	    		$('.errorMsgPeso').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#peso_bob').focus();
        		$('#peso_bob').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgPeso').text("");
        	},10000); 
        	valida = false;        		
        }

       	else if(qtd < 1 ){
        	setTimeout(function(){
	    		$('#quantidade').focus();
	    		$('#quantidade').css("border","1px solid red");
	    		$('.errorMsgQtd').text('Informe a quantidade produzida');
	    		$('.errorMsgQtd').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#quantidade').focus();
        		$('#quantidade').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgQtd').text("");
        	},10000); 
        	valida = false;        		
        }

       	else if(hrfim < 1 ){
        	setTimeout(function(){
	    		$('#hrfim').focus();
	    		$('#hrfim').css("border","1px solid red");
	    		$('.errorMsgHorFim').text('Informe o horario de termino da produção');
	    		$('.errorMsgHorFim').css("color","red");
	    	});
        	setTimeout(function(){
        		$('#hrfim').focus();
        		$('#hrfim').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgHorFim').text("");
        	},10000); 
        	valida = false;        		
        }

        else if(!$("input[type='radio'][name='aprovacaofim']").is(':checked')){				
			setTimeout(function(){
	    		$('input[name="aprovacaofim"]').focus();
	    		$('input[name="aprovacaofim"]').css("border","1px solid red");
	    		$('.errorMsgSituFim').text('Escolha uma aprovação de inicio');
	    		$('.errorMsgSituFim').css("color","red");
	    	});
        	setTimeout(function(){
        		$('input[name="aprovacaofim"]').focus();
        		$('input[name="aprovacaofim"]').css("border-color","rgb(169, 169, 169)");
        		$('.errorMsgSituFim').text("");
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


    $('#addPerda').click(function(){
        var valid = true;       
        var dep = $('#dep').val();       
        var turno = $('#turno_perda').val();
        var maquina = $('#maq').val();
        var produto = $('#prod').val();
        if(turno == null){
            setTimeout(function(){
                $('#turno_perda').focus();
                $('#turno_perda').css("border","1px solid red");
                $('.errorMsgTurno').text('É necessario escolher o turno');
                $('.errorMsgTurno').css("color","red");
            });
            setTimeout(function(){
                $('#turno_perda').focus();
                $('#turno_perda').css("border-color","rgb(169, 169, 169)");
                $('.errorMsgTurno').text("");
            },10000); 
            valida = false;                         
        }
        else if(dep == null){
            setTimeout(function(){
                $('#dep').focus();
                $('#dep').css("border","1px solid red");
                $('.errorMsgDep').text('Escolha o departamento');
                $('.errorMsgDep').css("color","red");
            });
            setTimeout(function(){
                $('#dep').focus();
                $('#dep').css("border-color","rgb(169, 169, 169)");
                $('.errorMsgDep').text("");   
            },10000);
            valida = false;
        }


        else if(produto == null){
            setTimeout(function(){
                $('#prod').focus();
                $('#prod').css("border","1px solid red");
                $('.errorMsgProd').text('Escolha um produto');
                $('.errorMsgProd').css("color","red");
            });
            setTimeout(function(){
                $('#prod').focus();
                $('#prod').css("border-color","rgb(169, 169, 169)");
                $('.errorMsgProd').text("");   
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

    var maquinas = {
        EXT : ['','EXT01','EXT02','EXT03','EXT04','EXT05'],
        ACA : ['','REB01','REB02','REB03','REB04','REB05','REB06','REB07','RAC01','RAC02'],
        DIS : ['','REF01','REF02','REF03','REF04','REF05'],
        MIS : ['','GRA01','GRA02','GRA03','MIS01','MIS02','MOI01','MOI02','MOI03','MOI04'],
        PRA : ['','PRA01','PRA02'],
        IMP : ['','IMP01','IMP02'],
        TUB : ['','TUB08','TUB09','TUB10','TUB11','TUB12','TUB13','TUB14','TUB15','TUB16','EST01']
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
});