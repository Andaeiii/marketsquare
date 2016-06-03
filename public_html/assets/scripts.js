function getLGAs(obj){
	$('#lgxfield').html('<img src="/ajax/yahoo.gif"/> &nbsp; ~ &nbsp; LOADING ');
	v = Number($(obj).val());
	//alert(typeof(v));
	if(v > 0){
		getStateLgas(v);
	}
}

function getStateLgas(v){

	$.ajax({
		'type':'get',
		'url':'http://www.buynaija.com/admin/getlgas/'+ Number(v),
		'success':function(msg){
			ht = '<div class="row-fluid"><label class="control-label visible-ie8 visible-ie9">Local Government/Town</label>';
			ht += '<div class="controls"><select name="lga_optn" class="span8 select2">';
			ht += '<option>...select residence Town/Lga </option>'+ msg +'</select></div></div>';
			//input the states inbetween...
			$('#lgxfield').html(ht);
		}
	})
}