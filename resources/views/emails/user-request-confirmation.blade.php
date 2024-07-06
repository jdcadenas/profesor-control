<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Solicitud de usuario recibida</title>
</head>
<body>
    <h1>Solicitud de usuario recibida</h1>

    <p>Estimado coordinador de la escuela {{ $userRequest->school->name }},</p>

    <p>Se ha recibido una nueva solicitud de usuario para la facultad {{ $userRequest->faculty->name }}.</p>

    <p>Detalles de la solicitud:</p>

    <ul>
        <li>Nombre: {{ $userRequest->name }}</li>
        <li>Correo electrónico: {{ $userRequest->email }}</li>
        <li>Fecha de comienzo: {{ $userRequest->start_date }}</li>
        <li>Escuela: {{ $userRequest->school->name }}</li>
    </ul>

    <p>Para revisar la solicitud completa, por favor acceda al siguiente enlace:</p>

    <a href="{{ route('user-requests.show', $userRequest->id) }}">Ver solicitud</a>

    <p>Atentamente,</p>

    <p>Sistema de gestión de solicitudes</p>
</body>
</html>