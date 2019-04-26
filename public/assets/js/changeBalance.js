

function render() {

}


function callajax (account){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'GET',
        url: '/account',
        data: {accountNumber: account},
        cache: true,
		success:function (data) {

        	
        	var balances_target_1 = $('#balances-1').empty()
        	var balances_target_2 = $('#balances-2').empty()

        	var balances_values = data[1].balances


    		var newChild_1 = `<li class="float-left list-unstyled my-portfolio-menu" data-account="${balances_values.account_number}" style="display:list-item">
    							<a class="font-size-portfolio">$ ${balances_values.total_equity} </a>
    						</li >
    						                            
                            <li class="float-left list-unstyled my-portfolio-menu" data-account="${balances_values.account_number}" style="display:list-item">
                                <a class="menu-my-portfolio-color">Unrealized P/L</a>
                                <p>
                                    <strong> ${balances_values.open_pl} </strong>
                                </p>
                            </li>
                            <li class="float-left list-unstyled my-portfolio-menu" data-account="${balances_values.account_number}" style="display:list-item">
                                <a class="menu-my-portfolio-color" >Realized P/L</a>
                                <p><strong> ${balances_values.close_pl}</strong></p>
                            </li>`

            var newChild_2 = `<li class="float-left list-unstyled submenu-myportfolio" data-account="${balances_values.account_number}" style="display:list-item">
                                    <a class="menu-my-portfolio-color">  Cash </a>
                                    <p><strong> ${balances_values.total_cash} </strong></p>
                                </li>
                                <li class="float-left list-unstyled submenu-myportfolio" data-account="${balances_values.account_number}" style="display:list-item">
                                    <a class="menu-my-portfolio-color"> Stocks </a>
                                    <p><strong> ${balances_values.stock_long_value}</strong></p>
                                </li>
                                <li class="float-left list-unstyled " data-account="${balances_values.account_number}" style="display:list-item">
                                    <a class="menu-my-portfolio-color"> Options</a>
                                    <p><strong> ${balances_values.option_long_value +  balances_values.option_short_value}</strong></p>
                                </li>`


        	balances_target_1.append(newChild_1)
        	balances_target_2.append(newChild_2)
        	

        }

    })

	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		method: 'GET',
		url: '/portfolioData',
		data: {accountNumber: account},
		cache: true,
		success:function (data) {
			
			var table = $("#home2-tbody").empty()
		
			var accountNumber = data[0];
			var positions_values = data[1].positions.position;

			positions_values.forEach(function(value, index){
				
				var child = `<tr data-account="${accountNumber}" style="display:table-row">
				                <td>
				                    ${value.symbol}
				                    <p>${value[0].symbol.quotes.quote.last}</p>
				                </td>
				                <td class="green">
				                    ${value[0].symbol.quotes.quote.change}
				                    <p>%${value[0].symbol.quotes.quote.change_porcentage}</p>
				                </td>
				                <td>
				                    ${value.quantity}
				                </td>
				                <td>
				                    ${value.cost_basis}
				                </td>
				                <td>
				                    ${value.quantity * value[0].symbol.quotes.quote.last}
				                </td>
				                <td class="green">
				                    ${value.quantity * value[0].symbol.quotes.quote.last - value.cost_basis}
				                </td>
				                <td>
				                    <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light button-my-portfolio">
				                        <strong>Trade</strong></button>
				                </td>
				            </tr>`
				table.append(child)
			})
			

		}

	})

}

function changeBalance(element) {
	$('#list-header-menu>strong').text(element.id)
	// $('li[data-account]').each(function(index, value){
	// 	if(value.dataset.account == element.id) {
	// 		value.style.display = "list-item"
	// 	}
	// 	else value.style.display = "none"
	// })
	// $('tr[data-account]').each(function(index, value){
	// 	if(value.dataset.account == element.id) {
	// 		value.style.display = "table-row"
	// 	}
	// 	else value.style.display = "none"
	// })
	callajax(element.id)
    
}

(function(){
	var firstElement = {id: $('#list-header-menu>strong').text() }
	changeBalance(firstElement)
})()
