$(function ricercaFiltribyNameAndWords() {
    $('#ricercaParola').on('keyup',function () {
        $value1 = $('#ricercaAzienda').val();
        $value2 = $('#ricercaParola').val();
        if ($value1 || $value2) {
            $('#all-data').hide();
            $('#searched-content').show();
        } else {
            $('#all-data').show();
            $('#searched-content').hide();
        }
        $.ajax({
            type: 'GET',
            url: '/listaPromozioni/filtered',
            data: {'ricercaParola': $value2, 'ricercaAzienda': $value1},
            success: function (data) {
                console.log(data);
                $('#searched-content').html(data);
            }
        })
    })
    $('#ricercaAzienda').on('keyup',function () {
        $value1 = $('#ricercaAzienda').val();
        $value2 = $('#ricercaParola').val();
        if ($value1 || $value2) {
            $('#all-data').hide();
            $('#searched-content').show();
        } else {
            $('#all-data').show();
            $('#searched-content').hide();
        }
        $.ajax({
            type: 'GET',
            url: '/listaPromozioni/filtered',
            data: {'ricercaParola': $value2, 'ricercaAzienda': $value1},
            success: function (data) {
                console.log(data);
                $('#searched-content').html(data);
            }
        })
    })
})


$(function aperturaFiltri() {
    $('#filter-button').click(function () {
        $('#filtri').slideToggle();
    })
})

$(function chiusuraFiltri() {
    $('#close-button').click(function () {
        $('#filtri').slideToggle();
    })
})
