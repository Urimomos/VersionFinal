<!DOCTYPE html>
<html>
<head>
    <title>Reparación Completada</title>
</head>
<body style="font-family: sans-serif; color: #333;">
    <h1 style="color: #A92C37;">¡Buenas Noticias!</h1>
    <p>Hola, **{{ $quote->user->name }}**,</p>
    <p>Nos complace informarte que la reparación de tu dispositivo **{{ $quote->deviceModel->brand->name }} {{ $quote->deviceModel->name }}** ha sido completada con éxito.</p>
    
    <h3>Detalle del Servicio:</h3>
    <ul>
        <li><strong>Reparación:</strong> {{ $quote->repairType->name }}</li>
        <li><strong>Costo Final:</strong> ${{ number_format($quote->price, 2) }}</li>
    </ul>

    <p>Ya puedes pasar a recogerlo en nuestra sucursal durante nuestro horario de atención.</p>
    <p>¡Gracias por confiar en Fixme!</p>
</body>
</html>