<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
</head>
<body>
	<div style="background-color:#F9F9F9;padding:10px;">
		<p>Enviado por: {!! $name.' ('.$email.')' !!}</p>
		<p>Assunto: {!! $subject !!}</p>
		<p>{!! $user_message !!}</p>
		<br><br><br>
		<p>{!! date('d/m/Y H:m') !!}</p>
	</div>
</body>
</html>