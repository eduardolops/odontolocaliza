<?php 

function geoLocationLatLog($address)
{
    if( !$address ):
        return false;
    endif;

	$url = 'http://maps.google.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false';
	$geocode = file_get_contents($url);
    $output  = json_decode($geocode);

    if( $output->status == 'OK' ):
        $geo = [
                'lat'  => $output->results[0]->geometry->location->lat,
                'long' => $output->results[0]->geometry->location->lng,
        ];
        
        return $geo;
    endif;

    return false;
}

function giveLastParam($input)
{
    if( !$input ):
        return false;
    endif;

    foreach ($input as $k => $v) {
        $input[$k] = explode('-', $input[$k]);
        $input[$k] = end($input[$k]);
    }

    return $input;
}

function convertStatusInTypeSituationPayment($order_status)
{
    // 0 = aguardando, 1 = pago, 2 = pendente, 3 = cancelado;
    switch ($order_status) {
        case 1:
            $status = '<span class="label label-success">Pagamento Efetuado</span>';
            break;
        case 2:
            $status = '<span class="label label-warning">Pagamento Pendente</span>';
            break;
        case 3:
            $status = '<span class="label label-danger">Pagamento Cancelado</span>';
            break;
        default:
            $status = '<span class="label label-default">Aguardando Pagamento</span>';
            break;
    }

    return $status;
}

function convertTypeStatus($status)
{
    // 0 = inativo, 1 = ativo;
    switch ($status) {
        case 'active':
            $status = '<span class="label label-success">Ativo</span>';
            break;
        case 'suspend':
            $status = '<span class="label label-danger">Inativo</span>';
            break;
        default:
            $status = '<span class="label label-warning">Pendente</span>';
            break;
    }

    return $status;
}