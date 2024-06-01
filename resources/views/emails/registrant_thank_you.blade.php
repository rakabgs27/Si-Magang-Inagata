<!DOCTYPE html>
<html>
<head>
    <title>Thank You for Registering</title>
</head>
@php
    $nama = '(M. Fajrul Falah)';
@endphp
<body>
    <h1>Thank you, {{ $registrant['name'] }}!</h1>
    <p>Thank you for registering with us.</p>
    <p>Please wait while we verify your details. If you have any questions, feel free to contact our manager.</p>
    <p>Manager's Phone Number: +62 819-1300-6938 {{ $nama }}</p>
    <p>Best Regards,<br>Hub Inagata</p>
</body>
</html>
