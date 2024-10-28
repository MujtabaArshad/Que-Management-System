<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking App</title>
    <link rel="stylesheet" href="{{ asset('assets/css/option.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}">
    
    </head>
    <body>
 
        <div class="container">
        <header class="gradient">
        <h1 style="color:white">Banking App</h1>
        </header>

        <main>
        <!-- Option Cards -->
        <div class="option-card">
        @foreach($cashDepositOptions as $option)
        <h2 class="gradient-text">{{ $option->transaction_option_name }}</h2>
        <p>Securely deposit cash into your account.</p>
        <button class="gradient-btn" onclick="handleOptionClick('CashDeposit')">Deposit Now</button>
        @endforeach
        </div>

        <div class="option-card">
        @foreach($withdrawalOptions as $option)
        <h2 class="gradient-text">{{ $option->transaction_option_name }}</h2>
        <p>Withdraw cash with ease.</p>
        <button class="gradient-btn" onclick="handleOptionClick('Withdrawal')">Withdraw Now</button>
        @endforeach
        </div>

        <div class="option-card">
        @foreach($billPaymentOptions as $option)
        <h2 class="gradient-text">{{ $option->transaction_option_name }}</h2>
        <p>Pay your bills swiftly and securely.</p>
        <button  class="gradient-btn" onclick="handleOptionClick('BillPayment')">Pay Bill</button>
        @endforeach
        </div>

        <!-- Confirmation Overlay -->
        <div id="confirmationOverlay">
        <div id="confirmationModal">
        <h2>Confirm</h2>
        <p id="confirmationMessage"></p>
        <button class="gradient-btn" type="button" id="confirmButton">Yes, Proceed</button>
        <button class="gradient-btn" type="button" id="cancelButton">Cancel</button>
        </div>
        </div>
        </main>
        </div>

    <script src="{{ asset('assets/js/script.js') }}"></script>

    </body>
    </html>
