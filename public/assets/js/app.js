$(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('[data-toggle="tooltip"]');
    $("[data-mask]").inputmask();

    $('.zip_code').on('blur', function(){
        //var token = $('input[name="_token"]').val();
        //, _token : token

        $.ajax({
            url: '/admin/users/zip_code',
            type: 'POST',
            data: {zip_code: $(this).val()},
            dataType: 'json',
            success: function (data) {
                ClearField();
                if (data.uf != undefined )
                {
                    $('#address').val(data.logradouro);
                    $('#neighborhood').val(data.bairro);
                    $('#states').val(data.uf);
                    $('#city').val(data.localidade);

                }else
                {
                    $('#zip').html('Cep não encontrado');
                }
            }
        })
            .done(function() {
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
    });
    function ClearField()
    {
        $('#zip').html('');
        $('#address').val('');
        $('#neighborhood').val('');
        $('#states').val('');
        $('#city').val('');
    }
});