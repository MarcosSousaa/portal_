function geraReport(obj) {
    var data = $(obj).serialize();    
    var url = BASE_URL + "/reports/veiculos_report?" + data;      
    window.open(url, "Reports", "width=1024,height=800");
    return false;
}
function geraPdf(obj) {
    var data = $(obj).serialize();    
    var url = BASE_URL + "/reports/veiculos_pdf?" + data;        
    window.open(url, "Reports", "width=700,height=500");
    return false;
}

$(document).ready(function () {
	$('.pdf').click(function(){
		$('#frmVeiculos').submit(geraPdf($('#frmVeiculos')));
		return false;
	});

	$('.report').click(function(){
		$('#frmVeiculos').submit(geraReport($('#frmVeiculos')));
		return false;
	})
});