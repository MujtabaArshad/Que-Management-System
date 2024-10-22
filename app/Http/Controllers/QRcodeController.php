<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class QRcodeController extends Controller
{
    public function branchOptions()
    {
        // Fetch options for Cash Deposit
        $cashDepositOptions = DB::table('tbl_transaction_options')
            ->where('transaction_option_id', 1)
            ->get();

        // Fetch options for Withdrawal
        $withdrawalOptions = DB::table('tbl_transaction_options')
            ->where('transaction_option_id', 2)
            ->get();

        // Fetch options for Bill Payment
        $billPaymentOptions = DB::table('tbl_transaction_options')
            ->where('transaction_option_id', 3)
            ->get();

        // Return the view with the options
        return view('BankApp.option-show', compact('cashDepositOptions', 'withdrawalOptions', 'billPaymentOptions'));
    }
}
