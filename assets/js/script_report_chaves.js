function geraReport(obj) {
    var data = $(obj).serialize();    
    var url = BASE_URL + "/reports/chaves_report?" + data;    
    window.open(url, "Reports", "width=1024,height=800");
    return false;
}
function geraPdf(obj) {
    var data = $(obj).serialize();    
    var url = BASE_URL + "/reports/chaves_pdf?" + data;    
    window.open(url, "Reports", "width=700,height=500");
    return false;
}



$(document).ready(function () {
	$('.pdf').click(function(){
		$('#frmChaves').submit(geraPdf($('#frmChaves')));
		return false;
	});

	$('.report').click(function(){
		$('#frmChaves').submit(geraReport($('#frmChaves')));
		return false;
	})

});