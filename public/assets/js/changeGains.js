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
            var accountNumber = data[0];
            var gainLossValues = data[1];
            gainLossValues.forEach(function(value){
                var child = `<tr data-account="${accountNumber}" style="display:table-row" class="itemList">
                                <td><p>${value.symbol}</p></td>
                                <td><p>${value.quantity}</p></td>
                                <td><p>${Number(value.cost).toFixed(2)}</p></td>
                                <td><p>${Number(value.proceeds).toFixed(2)}</p></td>
                                <td class="${setColor(value.gain_loss)}"><strong class="${setColor(value.gain_loss)}">${number_format(value.gain_loss)}  (${number_format(value.gain_loss_percent)}%)</strong>
                                </td>
                                <td><p>${value[0]}</p></td>
                                <td><p>${value[1]}</p></td>
                            </tr>`;
                        table.append(child);
            })

            $(".pagination").html(" ")

            let numItems = $("#gains-tbody .itemList").length
            let limitPerPage = 20

            $("#gains-tbody .itemList:gt(" + (limitPerPage - 1) + ")").hide()

            let totalPages = Number((numItems/limitPerPage)+1).toFixed(0)

            if($("#topnavlogo").hasClass('top-nav-logo-dark')){
                $(".pagination").append("<li id='previous-page'><a class='page-link page-link-dark' href='javascript:void(0)' aria-label='Previous'><span aria-hidden='true'> < </span></a></li>")
                $(".pagination").append("<li class='page-item active'><a class='page-link page-link-dark' href='javascript:void(0)'>"+ 1 + "</a></li>")

                for (let index = 1; index < totalPages; index++) {
                    $(".pagination").append("<li class='page-item'><a class='page-link page-link-dark' href='javascript:void(0)'>"+ (index + 1) + "</a></li>")
                }

                $(".pagination").append("<li id='next-page'><a class='page-link page-link-dark' href='javascript:void(0)' aria-label='Next'><span aria-hidden='true'> > </span></a></li>")

            }else{
                $(".pagination").append("<li id='previous-page'><a class='page-link' href='javascript:void(0)' aria-label='Previous'><span aria-hidden='true'> < </span></a></li>")
                $(".pagination").append("<li class='page-item active'><a class='page-link' href='javascript:void(0)'>"+ 1 + "</a></li>")

                for (let index = 1; index < totalPages; index++) {
                    $(".pagination").append("<li class='page-item'><a class='page-link' href='javascript:void(0)'>"+ (index + 1) + "</a></li>")
                }

                $(".pagination").append("<li id='next-page'><a class='page-link' href='javascript:void(0)' aria-label='Next'><span aria-hidden='true'> > </span></a></li>")

            }

            $(".pagination li.page-item").on("click", function(){
                if ($(this).hasClass("active")) {
                    return false;
                }else{
                   let currentPage = $(this).index()
                    $(".pagination li").removeClass("active")
                    $(this).addClass("active")
                    $("#gains-tbody .itemList").hide()

                    let grandTotal = limitPerPage * currentPage;

                    for (let j = (grandTotal - limitPerPage); j < grandTotal; j++) {
                        $("#gains-tbody .itemList:eq(" + j + ")").show()
                    }

                }
            })

            $("#previous-page").on("click", function() {
                let currentPage = $(".pagination li.active").index()
                if(currentPage == 1  ){
                    return false
                }else{
                    currentPage--;
                    $(".pagination li").removeClass("active")
                    $("#gains-tbody .itemList").hide()

                    let grandTotal = limitPerPage * currentPage;

                    for (let j = (grandTotal - limitPerPage); j < grandTotal; j++) {
                        $("#gains-tbody .itemList:eq(" + j + ")").show()
                    }
                    $(".pagination li.page-item:eq(" + (currentPage - 1) + ")").addClass("active");
                }
            })

            $("#next-page").on("click", function() {
                let currentPage = $(".pagination li.active").index()
                if(currentPage == totalPages){
                    return false
                }else{
                    currentPage++;
                    $(".pagination li").removeClass("active")
                    $("#gains-tbody .itemList").hide()

                    let grandTotal = limitPerPage * currentPage;

                    for (let j = (grandTotal - limitPerPage); j < grandTotal; j++) {
                        $("#gains-tbody .itemList:eq(" + j + ")").show()
                    }
                    $(".pagination li.page-item:eq(" + (currentPage - 1) + ")").addClass("active");
                }
            })
        },error:function(){
            $(".pagination").html(" ")
            alert("There are no gains in your history");
        }
    });
}



function number_format(value){
    Number(value).toFixed(2);
    value += '';
    x = value.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function setColor(value){
    return value > 0 ? 'green' : 'red'
}

function changeGains(element) {
    let account = $(element)[0]['id'];
    let fullAccount = '#' + account + ' strong';
    $('#list-header-menu>strong').text($(fullAccount).html())
    ajaxCallGains(element.id)
}

(function(){
    let account = $('#list-header-menu>strong').html();
    let typeAccount = account.split(" ");
    let firstElement = {id: $('#list-header-menu>strong').text().slice(typeAccount[0].length + 1)};
    changeGains(firstElement);
})()

