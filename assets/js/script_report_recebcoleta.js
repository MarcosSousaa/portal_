function geraReport(obj) {
    var data = $(obj).serialize();    
    var url = BASE_URL + "/reports/recebimentoColeta_report?" + data;         
    window.open(url, "Reports", "width=1024,height=800");
    return false;
}
function geraPdf(obj) {
    var data = $(obj).serialize();    
    var url = BASE_URL + "/reports/recebimentoColeta_pdf?" + data;             
    window.open(url, "Reports", "width=700,height=500");
    return false;
}
$(document).ready(function () {
	$('.pdf').click(function(){
		$('#frmRecbColeta').submit(geraPdf($('#frmRecbColeta')));
		return false;
	});

	$('.report').click(function(){
		$('#frmRecbColeta').submit(geraReport($('#frmRecbColeta')));
		return false;
	})
});