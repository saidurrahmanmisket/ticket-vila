<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Your Ticket - Ticket Villa</title>
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

        .invitation-text {
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            font-size: 16px;
            text-align: center;
            font-weight: bold;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Join Ticket Villa</h1>
    </div>
    <div class="content">
        <p>Hi there!</p>
        <p>I’d like to introduce you to <strong>Ticketvilla</strong>. Ticketvilla can help you convert more of your visitors into actively engaged leads. Confirmed leads, delivered straight into your marketing funnel, right where you need them.</p>
        <div class="invitation-text">
            <p><strong>Click the link below to buy your ticket:</strong></p>
            <a href="{{ $referralLink }}" class="button" style="color: #ffffff">Buy Ticket Now</a>
        </div>
        <p>If you have any questions or need help with your purchase, feel free to contact our support team.</p>
        <p>Thank you,<br>Ticket Villa Team</p>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Ticket Villa. All rights reserved.</p>
    </div>
</div>
</body>
</html>
