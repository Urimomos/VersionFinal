<!DOCTYPE html>
<html>
<head><title>Cotización Cancelada</title></head>
<body style="font-family: sans-serif; color: #333;">
    <h1 style="color: #A92C37;">Cotización Cancelada por el Cliente</h1>
    <p>El cliente <strong>{{ $quote->user->name }}</strong> ha cancelado la siguiente cotización:</p>
    <ul>
        <li><strong>Dispositivo:</strong> {{ $quote->deviceModel->brand->name }} {{ $quote->deviceModel->name }}</li>
        <li><strong>Reparación:</strong> {{ $quote->repairType->name }}</li>
        <li><strong>Precio:</strong> ${{ number_format($quote->price, 2) }}</li>
    </ul>
    <p>Esta cotización ha sido eliminada del sistema.</p>
</body>
</html>