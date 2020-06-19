function geraReport(obj) {
    var data = $(obj).serialize();    
    var url = BASE_URL + "/reports/chaves_report?" + data;    
    window.open(url, "Reports", "width=1024,height=800");
    return false;
}

$(document).ready(function () {	
	$('.report').click(function(){
		$('#frmChaves').submit(geraReport($('#frmChaves')));
		return false;
	})

});