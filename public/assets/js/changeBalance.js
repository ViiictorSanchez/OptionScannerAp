function changeBalance(element) {
	$('li[data-account]').each(function(index, value){
		if(value.dataset.account == element.id) value.style.display = "list-item"
		else value.style.display = "none"
	})

	
}