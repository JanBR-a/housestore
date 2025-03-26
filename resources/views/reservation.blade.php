<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Confirmada</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            color: #28a745;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #555;
            margin: 10px 0;
        }

        .details {
            margin: 20px 0;
            text-align: left;
        }

        .details p {
            margin: 5px 0;
            font-size: 16px;
            color: #333;
        }

        .button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
            cursor: pointer;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>¡Reserva Confirmada!</h1>
        <p>Gracias por realizar tu reserva. A continuación, encontrarás los detalles:</p>

        <div class="details">
            <p><strong>Nombre:</strong> {{ $property->title  }}, {{ $property->address }}</p>
            <p><strong>Usuario:</strong> {{ $user->name }}</p>
            <p><strong>Agente:</strong> {{ $property->user->name }}</p>
        </div>

        <a href="/" class="button">Volver al inicio</a>
    </div>
</body>
</html>