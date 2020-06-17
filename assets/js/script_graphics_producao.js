/*function openPopup(obj) {    
    var data = $(obj).serialize();    
    var url = BASE_URL + "/graphics/producao_graphics?" + data;        
    window.open(url, "graphics", "fullscreen");


    return false;
}
*/
function geraGrafico(obj) {
    var data = $(obj).serialize();    
    var url = BASE_URL + "/graphics/producao_graphics?" + data;     
    window.open(url, "graphics", "width=1024,height=800");
    return false;
}
function geraPdf(obj) {
    var data = $(obj).serialize();    
    var url = BASE_URL + "/graphics/producao_graphics_pdf?" + data;   
    window.open(url, "graphics", "width=700,height=500");
    return false;
}
$(document).ready(function () {
		$('.grafico').click(function(){
		$('#graficoProducao').submit(geraGrafico($('#graficoProducao')));
		return false;
	});

	$('.pdf').click(function(){
		$('#graficoProducao').submit(geraPdf($('#graficoProducao')));
		return false;
	})
});