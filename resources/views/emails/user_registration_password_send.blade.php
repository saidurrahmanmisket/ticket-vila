<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Ticket Villa</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #f5f5f5;
        }

        .header {
            background-color: #010c0f;
            padding: 15px;
            text-align: center;
            color: white;
            border-radius: 8px 8px 0 0;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 20px;
            font-size: 16px;
            color: #141414;
        }

        .footer {
            background-color: #f5f5f5;
            padding: 15px;
            text-align: center;
            border-radius: 0 0 8px 8px;
        }

        .button {
            display: inline-block;
            background-color: #010c0f;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 16px;
        }

        .button:hover {
            background-color: #f3ac4e;
        }

        .credentials {
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            font-size: 16px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Welcome to Ticket Villa</h1>
    </div>
    <div class="content">
        <p>Hi {{ $name }},</p>
        <p>Welcome to Ticket Villa! We're excited to have you join us.</p>
        <div class="credentials">
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Password:</strong> {{ $password }}</p>
        </div>
        <p>Please make sure to change your password after your first login.</p>
        <p>If you have any questions, feel free to contact our support team.</p>
        <a href="{{ url('/login') }}" class="button" style="color: #ffffff">Login to Your Account</a>
        <p>Thank you,<br>Ticket Villa Team</p>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Ticket Villa. All rights reserved.</p>
    </div>
</div>
</body>
</html>
