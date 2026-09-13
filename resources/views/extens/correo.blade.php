<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGRICOLA - ISTAE</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f9f4;
            color: #333;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #d1e7dd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background-color: #3c9d9b;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
        }
        .content .field {
            margin-bottom: 15px;
        }
        .content .field label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #3c9d9b;
        }
        .content .field span {
            display: block;
            background-color: #f0f9f7;
            padding: 10px;
            border: 1px solid #d1e7dd;
            border-radius: 4px;
            color: #333;
        }
        .footer {
            background-color: #f4f9f4;
            color: #666;
            text-align: center;
            padding: 10px;
            font-size: 12px;
        }
        .footer a {
            color: #3c9d9b;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>HOLA ISTAE</h1>
        </div>
        <div class="content">
            <div class="field">
                <label>Nombre:</label>
                <span>{{ $dato->Nombre }}</span>
            </div>
            <div class="field">
                <label>Correo:</label>
                <span>{{ $dato->Correo }}</span>
            </div>
            <div class="field">
                <label>Mensaje:</label>
                <span>{{ $dato->Mensaje }}</span>
            </div>
        </div>
        <div class="footer">
            <p>Gracias por contactarnos. Si tienes alguna duda, visita nuestra página <a href="https://istae.edu.ec/">aquí</a>.</p>
        </div>
    </div>
</body>
</html>
