<!DOCTYPE html>
<html>

<head>
    <style>
        .email-container {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            padding: 20px;
            border: 1px solid #ddd;
            margin: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .email-header {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .email-body {
            font-size: 16px;
        }

        .email-footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            Status Update
        </div>
        <div class="email-body">
            <p>Dear {{ $name }},</p>
            <p>Your application status has been updated to: <strong>{{ $status }}</strong>.</p>
            @if ($status == 'Terverifikasi')
                <p>Congratulations! You have passed the administration process.</p>
                <p>Your login credentials are:</p>
                <p>Email: {{ $email }}</p>
                <p>Password: {{ $password }}</p>
            @elseif ($status == 'Tertolak')
                <p>We regret to inform you that your application did not meet our criteria.</p>
            @endif
        </div>
        <div class="email-footer">
            <p>Thank you,<br>Hub Inagata</p>
        </div>
    </div>
</body>

</html>
