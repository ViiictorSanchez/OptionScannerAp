




function callajax (account){
	console.log("test");
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'GET',
        url: '/account',
        data: {accountNumber: account},
		success:function (data) {
        	console.log(data);

        }

    })


}

function changeBalance(element) {
	$('#list-header-menu>strong').text(element.id)
	$('li[data-account]').each(function(index, value){
		if(value.dataset.account == element.id) {
			value.style.display = "list-item"
		}
		else value.style.display = "none"
	})
	$('tr[data-account]').each(function(index, value){
		if(value.dataset.account == element.id) {
			value.style.display = "table-row"
		}
		else value.style.display = "none"
	})
	callajax(element.id)
    
}
