<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau message de contact</title>
</head>
<body>
    <h2>Vous avez reçu un nouveau message via le formulaire de contact :</h2>
    <p><strong>Nom :</strong> {{ $name }}</p>
    <p><strong>Email :</strong> {{ $email }}</p>
    <p><strong>Téléphone :</strong> {{ $phone }}</p>
    <p><strong>Sujet :</strong> {{ $subject }}</p>
    <p><strong>Message :</strong></p>
    <p>{{ $message_content }}</p>
</body>
</html>
