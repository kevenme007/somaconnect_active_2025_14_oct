<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Support Offer</title>
</head>
<body>
    <h2>New Support Offer Received</h2>
    <p><strong>Name:</strong> {{ $supportOffer->first_name }} {{ $supportOffer->last_name }}</p>
    <p><strong>Email:</strong> {{ $supportOffer->email }}</p>
    <p><strong>Phone:</strong> {{ $supportOffer->phone ?? 'N/A' }}</p>
    <p><strong>Support Type:</strong> {{ ucfirst($supportOffer->support_type) }}</p>
    <p><strong>Details:</strong></p>
    <p>{{ $supportOffer->details }}</p>
</body>
</html>
