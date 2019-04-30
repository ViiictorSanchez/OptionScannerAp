function ajaxCallGains(gains){
    var table = $("#gains-tbody").empty()

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'GET',
        url: '/gains_data',
        data: {accountNumber: gains},
        cache: true,
        success:function(data){
            console.log(data);
            var accountNumber = data[0];
            var gainLossValues = data[1].gainloss.closed_option;
            gainLossValues.forEach(function(value){
                var child = `<tr data-account="${accountNumber}" style="display:table-row">
                                <td>${value.symbol}</td>
                                <td>${value.quantity}</td>
                                <td>${number_format(value.cost)}</td>
                                <td>${number_format(value.proceeds)}</td>
                                <td class="${setColor(value.gain_loss)}"><strong>${number_format(value.gain_loss)}  ${number_format(value.gain_loss_percent)}%)</strong>
                                </td>
                                <td>${date(value.open_date)}</td>
                                <td>${date(value.close_date)}</td>
                            </tr>`;
                        table.append(child);
            })

        },error:function(){
            alert("FALLIDO");
        }
    });
}

function number_format(value){
    Number(value).toFixed(2);
}

function setColor(value){
    return value > 0 ? 'green' : 'red'
}

function date(value){
    value.format('MMMM d, Y');
}

function changeGains(element) {
    $('#list-header-menu>strong').text(element.id);
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
    ajaxCallGains(element.id);
}

(function(){
    var firstElement = {id: $('#list-header-menu>strong').text()};
    changeGains(firstElement);
})()

