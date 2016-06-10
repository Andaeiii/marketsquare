function getCatgs(vc){
	$('#cdsc').html('<div class="spinner"><i class="fa fa-refresh fa-spin"></i></div>');
	ux = 'http://www.buynaija.com/admin/category/'+Number(vc);
	//ert(ux);
	$.ajax({
		'type':'get',
		'url':ux,
		'success':function(msg){
			$('#cdsc').html('<ul>'+msg+'</ul>');
		}
	})
}
