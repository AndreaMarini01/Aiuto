/*
<script>
    $(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#ricercaAzienda").keyup(function (e) {
    e.preventDefault();
    let ricercaAzienda = $("input[name=ricercaAzienda]").val();
    let CSRF_TOKEN = '{{ csrf_token() }}';
    if (ricercaAzienda != '') {
    $.ajax({
    type: 'POST',
    url: "{{ route('catalogoPost') }}",
    data: {name: ricercaAzienda, _token: CSRF_TOKEN},
    success: function (data) {
    let result_tag = "";
    $.each(JSON.parse(data), function (item) {
    result_tag += "<div>" +
    "<p>" + item.get('id') + "</p>" +
    "<p>" + item.nomeAzienda + "</p>" +
    "<p>" + item.ragioneSociale + "</p>" +
    "<p>" + item.tipologia + "</p>" +
    "<p>" + item.logo + "</p>" +
    "<p>" + item.tipologia + "</p>" +
    "<p>" + item.localizzazione + "</p>" +
    "</div>";
});
    $('#container').html(result_tag);
}
});
} else {
    $('#container').html('');
}
});
});
</script>
*/




