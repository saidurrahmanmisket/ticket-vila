<!DOCTYPE html>
<html>
<head>
    <title>Your Tickets and eBook</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 100%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 600px;
            border-radius: 8px;
        }
        h1 {
            color: #007bff;
            font-size: 24px;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        ul li {
            background: #007bff;
            color: #fff;
            padding: 10px;
            margin: 5px 0;
            border-radius: 4px;
            text-align: center;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #777;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thank you for your purchase!</h1>
        <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
        <p>Here are your ticket numbers:</p>
        <ul>
            @foreach ($ticketNumbers as $ticketNumber)
                <li>{{ $ticketNumber }}</li>
            @endforeach
        </ul>
        <p>Your eBook is attached to this email.</p>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
