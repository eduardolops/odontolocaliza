$(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('[data-toggle="tooltip"]');
    $("[data-mask]").inputmask();

    $('#zip_code').on('blur', function(){
        
        var zip_code = $(this).val();

        $.get('/zip_code/' + zip_code, function(data){
            ClearField();
            if (data.uf != undefined)
            {
                $('#zip_code').val(data.cep);
                $('#address').val(data.logradouro);
                $('#neighborhood').val(data.bairro);
                $('#number').focus();
            }else
            {
                $('.zip_code').append('<p class="text-danger" id="zip">Cep não encontrado</p>');
            }
        }, 'json');
    });
    function ClearField()
    {
        $('#zip_code').html('');
        $('#address').val('');
        $('#neighborhood').val('');
    }
});