<!DOCTYPE html>
<html>
<head>
    <title>Reponse</title>
</head>
<body>

    @if ($data['emailType'] === 'confirm')
        <h2>Confirmation de réservation</h2>
        <p>Bonjour {{ $data['partenaireNom'] }} {{ $data['partenairePrenom'] }},</p>
        <p>Vous avez reçu une nouvelle réservation de la part de {{ $data['clientNom'] }} {{ $data['clientPrenom'] }}.</p>
        <p>Voici les détails de la réservation :</p>
        <ul>
            <li><strong>Nom du client:</strong> {{ $data['clientNom'] }} {{ $data['clientPrenom'] }}</li>
            <li><strong>Email du client:</strong> {{ $data['clientEmail'] }}</li>
            <li><strong>Date de reservation:</strong> {{ $data['date_reservation'] }}</li>
            <li><strong>Duree:</strong> {{ $data['duree'] }}</li>
            <li><strong>Prix Total:</strong> {{ $data['prix_total'] }}</li>
        </ul>
    @endif

    @if ($data['emailType'] === 'accept')
        <h2>Acceptation de la demande de réservation</h2>
        <p>Bonjour {{ $data['clientPrenom'] }} {{ $data['clientNom'] }},</p>
        <p>Votre demande de réservation a été Acceptée pour l'intervention {{ $data['interventionNom'] }}.</p>
        <p>Voici les détails de la réservation :</p>
        <ul>
            <li><strong>Nom du partenaire:</strong> {{ $data['partenairePrenom'] }} {{ $data['partenaireNom'] }}</li>
            <li><strong>Date de reservation:</strong> {{ $data['date_reservation'] }}</li>
            <li><strong>Duree:</strong> {{ $data['duree'] }}</li>
            <li><strong>Prix Total:</strong> {{ $data['prix_total'] }}</li>
        </ul>
    @endif


    @if ($data['emailType'] === 'refus')
        <h2>Refus de la demande de réservation</h2>
        <p>Bonjour {{ $data['clientPrenom'] }} {{ $data['clientNom'] }},</p>
        <p>Votre demande de réservation a été refusée pour l'intervention {{ $data['interventionNom'] }}.</p>
        <p>Voici les détails de la réservation :</p>
        <ul>
            <li><strong>Nom du partenaire:</strong> {{ $data['partenairePrenom'] }} {{ $data['partenaireNom'] }}</li>
            <li><strong>Date de reservation:</strong> {{ $data['date_reservation'] }}</li>
            <li><strong>Duree:</strong> {{ $data['duree'] }}</li>
            <li><strong>Prix Total:</strong> {{ $data['prix_total'] }}</li>
        </ul>
    @endif

    <p>Merci pour votre service!</p>
</body>
</html>
