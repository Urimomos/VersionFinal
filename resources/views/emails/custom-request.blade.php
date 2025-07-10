<!DOCTYPE html>
<html>
<head>
    <title>Solicitud Personalizada</title>
    <style>
        body { font-family: sans-serif; color: #333; line-height: 1.6; }
        .card { border: 1px solid #ddd; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
        h2 { color: #A92C37; border-bottom: 1px solid #eee; padding-bottom: 10px; }
        strong { color: #555; }
    </style>
</head>
<body>
    <h1>¡Nueva Solicitud Personalizada Recibida!</h1>
    <p>Un cliente no encontró su dispositivo en la lista y ha enviado la siguiente solicitud:</p>

    <div class="card">
        <h2>Detalles del Cliente</h2>
        <p><strong>Nombre:</strong> {{ $customRequest->user->name }}</p>
        <p><strong>Email:</strong> {{ $customRequest->user->email }}</p>
        <p><strong>Teléfono:</strong> {{ $customRequest->user->phone_number ?? 'No proporcionado' }}</p>
    </div>

    <div class="card">
        <h2>Descripción del Dispositivo</h2>
        <p>{{ $customRequest->device_description }}</p>
    </div>

    <div class="card">
        <h2>Descripción del Problema</h2>
        <p>{{ $customRequest->problem_description }}</p>
    </div>

    <p>Por favor, ponte en contacto con el cliente para dar seguimiento.</p>
</body>
</html>