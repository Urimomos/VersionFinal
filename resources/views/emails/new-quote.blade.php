<!DOCTYPE html>
<html>
<head>
    <title>Nueva Cotización</title>
    <style>
        body { font-family: sans-serif; color: #333; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1 style="color: #A92C37;">¡Nueva Cotización Recibida!</h1>
    <p>Un cliente ha guardado una nueva cotización en el sistema.</p>

    @php
        $customer = $quotes->first()->user;
        $deviceModel = $quotes->first()->deviceModel;
    @endphp

    <h2>Detalles del Cliente:</h2>
    <ul>
        <li><strong>Nombre:</strong> {{ $customer->name }}</li>
        <li><strong>Email:</strong> {{ $customer->email }}</li>
        <li><strong>Teléfono:</strong> {{ $customer->phone_number ?? 'No proporcionado' }}</li>
    </ul>

    <h2>Detalles del Dispositivo:</h2>
    <ul>
        <li><strong>Dispositivo:</strong> {{ $deviceModel->brand->name }} {{ $deviceModel->name }}</li>
    </ul>

    <h2>Reparaciones Cotizadas:</h2>
    <table>
        <thead>
            <tr>
                <th>Reparación</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($quotes as $quote)
                <tr>
                    <td>{{ $quote->repairType->name }}</td>
                    <td>${{ number_format($quote->price, 2) }}</td>
                </tr>
                @php $total += $quote->price; @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr style="font-weight: bold;">
                <td style="text-align: right;">Total:</td>
                <td>${{ number_format($total, 2) }}</td>
            </tr>
        </tfoot>
    </table>

    <p>Puedes ver más detalles en el panel de administración.</p>
</body>
</html>