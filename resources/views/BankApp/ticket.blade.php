<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Design</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .ticket {
            background-color: #fff;
            width: 400px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            position: relative;
        }

        .ticket img {
            width: 100px;
            margin-bottom: 20px;
        }

        .ticket h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .ticket-number {
            font-size: 36px;
            font-weight: bold;
            color: #e74c3c;
            margin-bottom: 20px;
        }

        .ticket-footer {
            font-size: 14px;
            color: #777;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>
<body>

@php
    $ticketNumber = request('ticketNumber');
    $optionType = request('optionType');
    $firstName = request('firstName');
@endphp

<div class="ticket" id="customAlert">
    <img src="{{ asset('assets/img/bank-icon/top-dashboard.png') }}" alt="Bank Image">
    <h1>Your Ticket</h1>
    <div class="ticket-number" id="alertMessage">
        Thank you, {{ $firstName }}. Your ticket number is {{ $ticketNumber }} for {{ $optionType }}.
    </div>
    <div class="ticket-footer">
        Please keep this ticket for future reference.
    </div>
</div>

<script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
