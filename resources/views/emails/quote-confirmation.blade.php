<!DOCTYPE html>
<html>
<head>
    <title>Confirmación de Cotización</title>
    <style>
        body { font-family: sans-serif; color: #333; line-height: 1.6; }
        .container { padding: 20px; }
        .button { background-color: #A92C37; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 8px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="container">
        <h1>¡Gracias por cotizar con Fixme!</h1>
        <p>Hola, **{{ $quotes->first()->user->name }}**, hemos recibido y guardado tu cotización. Aquí tienes los detalles:</p>

        @php
            $deviceModel = $quotes->first()->deviceModel;
            // ¡IMPORTANTE! Cambia esto por la dirección real de tu negocio
            $businessAddress = "Av. Benito Juárez, 100, sección primera, Zacatelco, Tlaxcala c.p. 90740";
            $mapsLink = "https://maps.app.goo.gl/eWcwXeNcsbX8rSTk6?g_st=aw" . urlencode($businessAddress);
        @endphp

        <h3>Dispositivo: {{ $deviceModel->brand->name }} {{ $deviceModel->name }}</h3>

        <table>
            <thead>
                <tr>
                    <th>Reparación Solicitada</th>
                    <th>Precio Estimado</th>
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

        <hr style="margin: 30px 0;">

        <h3>¿Listo para reparar?</h3>
        <p>Puedes traer tu dispositivo a nuestra sucursal. ¡Te esperamos!</p>
        <p><strong>Dirección:</strong> {{ $businessAddress }}</p>
        <p style="margin-top: 20px;">
            <a href="{{ $mapsLink }}" target="_blank" class="button">Ver en Google Maps</a>
        </p>
    </div>
</body>
</html>