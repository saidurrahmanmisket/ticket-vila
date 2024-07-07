<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 0px auto;
            max-width: 800px;
            width: 100%;
            padding: 10px;
        }
        .top-right-text img {
            margin: 0;
            padding: 0;
        }
        .top-left-text, .footer, .date-info {
            margin-bottom: 20px;
        }
        .top-left-text {
            display: flex;
            justify-content: flex-end;
            float: right;
        }
        .header {
            margin-bottom: 20px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .top-right-text{
            float: left;
        }
        .top-right-text img {
            max-width: 100px;
            height: auto;
        }
        .header h2 {
            margin-top: 100px;
            text-align: center;
        }
        .date-info p, .footer p {
            margin: 0;
        }
        .invoice-info {
            margin-top: 20px;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .invoice-table th, .invoice-table td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
        }
        .description {
            margin-top: 20px;
            display: flex;
            align-items: center;
            margin: 50px auto;
        }
        .description p {
            margin: 0;
            padding-right: 20px;
            float: left;
        }
        .description h2 {
            margin: 0 0;
        }
        .total {
            font-weight: bold;
        }
        .footer {
            margin-top: 100px;
            display: flex;
            justify-content: space-between;
        }
        .footer div {
            flex: 1;
        }
        .footer .left {
            float: left;
        }
        .footer .mid {
            float: left;
            margin-left: 60px;
        }
        .footer .right {
            float: right;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="">
        <div class="top-right-text">
            <img src="{{ public_path('frontend/images/logo-update.png') }}" alt="Company Logo">
        </div>
        <div class="top-left-text">
            Invoice ID: {{$order->id.'/'.date('Y')}} from {{$order->created_at}}
        </div>

    </div>
    <div class="header">
        <h2>TICKETVILLA Ltd</h2>
    </div>
    <div class="date-info">
        <p>Invoice ID: {{$order->id.'/'.date('Y')}}</p>
        <p>Issue Date:{{$order->created_at}}</p>
{{--        <p>PO Number:</p>--}}
{{--        <p>Due Date: 14/06/2024</p>--}}
    </div>
    <div class="invoice-info">
        <table class="invoice-table">
            <thead>
            <tr>
                <th style="width: 48%">From</th>
                <th>For</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <p>TICKETVILLA Ltd</p>
                    <p>Larnaca, Cyprus, 6041</p>
                </td>
                <td>
                    <p>{{ $order->user->first_name }} {{ $order->user->last_name }}</p>
                    <p>{{ $order->user->email }}</p>
                    <p>VAT Nr.: CY60076519A</p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="description">
        <p>Description:</p>
        <h2>Invoice</h2>
    </div>
    <table class="invoice-table">
        <thead>
        <tr>
            <th>No.</th>
            <th>Item</th>
            <th>Qty</th>
            <th>Unit net price</th>
            <th>VAT %</th>
            <th>VAT amount</th>
            <th>Total gross</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ 1 }}</td>
            <td>Styria eBook</td>
            <td>{{ $order->quantity }}</td>
            <td>{{ ($order->total_price - ($order->total_price / 100 * 3)) / $order->quantity }}</td>
            <td>3%</td>
            <td>{{ ($order->total_price / 100 * 3) }}</td>
            <td>{{ $order->total_price }}</td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="6" class="total">Total</td>
            <td class="total">€{{ $order->total_price }}</td>
        </tr>
        <tr>
            <td colspan="6">Tax rate</td>
            <td>€{{ ($order->total_price / 100 * 3) }}</td>
        </tr>
        </tfoot>
    </table>
    <div class="footer">
        <div class="left">
{{--            <p>IBAN:</p>--}}
{{--            <p>SWIFT:</p>--}}
{{--            <p>Bank:</p>--}}
            <p>Owner: TICKETVILLA LTD</p>
        </div>
        <div class="mid">
            <p>E-Mail: info@ticketvilla.eu</p>
            <p>Web: www.ticketvilla.eu</p>
            <p>Tel: +436706017170</p>
        </div>
        <div class="right">
            <p>Name: TICKETVILLA LTD</p>
            <p>Reg. Number:HE 460525</p>
            <p>Postal Adresse: Dryadon, 1, </p>
            <p>Floor 1, 6041, Larnaca, Cyprus</p>
            <p>Director: Balazs SIMON</p>
        </div>
    </div>
</div>
</body>
</html>
