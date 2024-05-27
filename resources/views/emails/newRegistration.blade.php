<!DOCTYPE html>
<html>

<head>
    <title>New Registrant Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            max-width: 600px;
            border-radius: 8px;
        }

        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }

        .header h1 {
            margin: 0;
            color: #333;
        }

        .content {
            padding: 20px;
            text-align: center;
        }

        .content p {
            font-size: 16px;
            color: #666;
        }

        .footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }

        .footer p {
            margin: 0;
            font-size: 14px;
            color: #999;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>New Registrant Notification</h1>
        </div>
        <div class="content">
            <p>There is a new registrant in the system. Please review their information and take the necessary actions.</p>
            <a id="view-registrants-button" class="button">View Registrants</a>
        </div>
        <div class="footer">
            <p>This is an automated notification. Please do not reply to this email.</p>
        </div>
    </div>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var button = document.getElementById('view-registrants-button');
            var token = "{{ $token }}";
            var baseUrl = "{{ route('list-pendaftar.index') }}";
            var url = new URL(baseUrl);
            url.searchParams.append('token', token);
            button.href = url.toString();
        });
    </script> --}}
</body>

</html>
