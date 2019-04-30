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
            var gainLossValues = data[0].gainloss.closed_option;
            gainLossValues.forEach(function(value){
                var child = `<tr>
                                <td>{{${value.symbol}}}</td>
                                <td>{{${value.quantity}}}</td>
                                <td>{{number_format(${value.cost}, 2, '.', ',')}}</td>
                                <td>{{number_format(${item.proceeds}, 2, '.', ',')}}</td>
                                <td @if (${item.gain_loss} > 0)
                                    class = "green";
                                @else
                                    class = "red";
                                @endif
                                ><strong>{{number_format(${item.gain_loss}, 2, '.', ',')}}  ({{number_format(${item.gain_loss_percent}, 2, '.', ',')}}%)</strong>
                                </td>
                                <td>{{date('M d, Y', strtotime(${item.open_date}))}}</td>
                                <td>{{date('M d, Y', strtotime(${item.close_date}))}}</td>
                            </tr>`;
                        table.append(child);
            })

        }
    });
}

function changeGains(element) {
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
    ajaxCallGains(element.id)

}

(function(){
    var firstElement = {id: $('#list-header-menu>strong').text().slice(11) }
    changeGains(firstElement)
})()

