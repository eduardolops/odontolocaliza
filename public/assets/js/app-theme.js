$(function(){
    // $('#specialization').multiselect();
    // $('#healthinsurance').multiselect({
    //     enableFiltering: true,
    //     filterBehavior: 'value'
    // });
    $('select[multiple]').multiselect({
        search: true,
        delay: 100,
        texts: {
            placeholder: '-- Selecione --',
            search: 'Pesquisar',
            selectedOptions: ' selecionado'
        }
    });

    $('.carousel').carousel(); 
    $("[data-mask]").inputmask();
    
    $('#state').change(function () {
        var uf = $(this).val();

        $('#city').html('').append('<option value="">Carregando...</option>');
        $.get('/cities/' + uf, function (cities) {
            $('#city').empty();
            $('#city').html('').append('<option value="">-- Selecione --</option>');
            $.each(cities, function (key, value) {
                $('select[name=city]').append('<option value=' + value.slug + '>' + value.name + '</option>');
            });
        });
    });

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

    // Google Maps API
    var lat  = $('#google-map').data('latitude');
    var long = $('#google-map').data('longitude');

    function initMap() {
      var myLatlng = new google.maps.LatLng(lat, long);
      var mapOptions = {
        zoom: 16,
        center: myLatlng
      };
      var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
      var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
    }
    google.maps.event.addDomListener(window, 'load', initMap);
});

