


function callajax (account){

	var balances_target_1 = $('#balances-1').empty()
    var balances_target_2 = $('#balances-2').empty()
    var table = $("#home2-tbody").empty()

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'GET',
        url: '/account',
        data: {accountNumber: account},
        cache: true,
		success:function (data) {

        	var balances_values = data[1].balances


    		var newChild_1 = `
                             <li class="float-right list-unstyled portfolio-title title-card">
                                    <a class="menu-my-portfolio-color"><strong> My Portfolio</strong> </a>
                             </li>

							<li class="float-left list-unstyled my-portfolio-menu" data-account="${balances_values.account_number}" style="display:list-item">
    							<a class="font-size-portfolio">$ ${balances_values.total_equity} </a>
    						</li >
    						                            
                            <li class="float-left list-unstyled my-portfolio-menu" data-account="${balances_values.account_number}" style="display:list-item">
                                <a class="menu-my-portfolio-color">Unrealized P/L</a>
                                <p>
                                    <strong class="${setColor(balances_values.open_pl)}">  ${balances_values.open_pl} </strong>
                                </p>
                            </li>
                            <li class="float-left list-unstyled my-portfolio-menu" data-account="${balances_values.account_number}" style="display:list-item">
                                <a class="menu-my-portfolio-color" >Realized P/L</a>
                                <p><strong class="${setColor(balances_values.close_pl)}"> ${balances_values.close_pl}</strong></p>
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
			
			var accountNumber = data[0];
			var positions_values = data[1].positions.position;

			positions_values.forEach(function(value, index){
				var market_value = value.quantity * value[0].symbol.quotes.quote.last
				var total_gain = market_value - value.cost_basis
				var child = `<tr data-account="${accountNumber}" style="display:table-row">
				                <td>
				                    ${value.symbol}
				                    <p>${value[0].symbol.quotes.quote.last}</p>
				                </td>
				                <td class="${setColor(value[0].symbol.quotes.quote.change)}">
				                   $ ${value[0].symbol.quotes.quote.change}
				                    <p class="${setColor(value[0].symbol.quotes.quote.change_percentage)}">% ${value[0].symbol.quotes.quote.change_percentage}</p>
				                </td>
				                <td>
				                    ${value.quantity}
				                </td>
				                <td>
				                    ${value.cost_basis}
				                </td>
				                <td>
				                    ${number_format(market_value)}
				                </td>
				                <td class="${setColor(total_gain)}">
				                    ${number_format(total_gain)}
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


function setColor(value){
	return value > 0 ? 'green' : 'red'
}

function number_format(value){
    return Number(value).toFixed(2);
}


function changeBalance(element) {
	$('#list-header-menu>strong').text('individual ' + element.id)
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
	var firstElement = {id: $('#list-header-menu>strong').text().slice(11) }
	changeBalance(firstElement)	
})()
