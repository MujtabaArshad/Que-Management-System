<?php

namespace App\Http\Controllers\AdminDashboard;

 
use Illuminate\Http\Request;
use App\Models\tbl_transaction_option;
use App\Models\MainMenu;

use App\Models\tbl_transaction_option_details;
use Illuminate\Routing\Controller;

class ViewtransactionController extends Controller
{
    public function transaction(Request $request)
    {
        $menus = MainMenu::with('subMenus')->whereNotIn('id', [1, 2, 3, 4])->get();
        $transactionName = tbl_transaction_option::all();
    
        if ($request->ajax()) {
            $transactionId = $request->input('transaction');
    
            if (empty($transactionId)) {
                $transactions = tbl_transaction_option_details::all();  
            } else {
                $transactions = tbl_transaction_option_details::where('transaction_option_id_FK', $transactionId)->get();
            }
    
               $cashDepositsCount = tbl_transaction_option_details::
               where('transaction_name', 'Cash Deposit')->count();
            $withdrawalsCount = tbl_transaction_option_details::where('transaction_name', 'Withdrawal')->count();
            $billPaymentsCount = tbl_transaction_option_details::where('transaction_name', 'Bill Payment')->count();
    
            return response()->json([
                'transactions' => $transactions,
                'totals' => [
                    'cashDepositsCount' => $cashDepositsCount,
                    'withdrawalsCount' => $withdrawalsCount,
                    'billPaymentsCount' => $billPaymentsCount,
                ]
            ]);
        }
    
          $transactions = tbl_transaction_option_details::all();
        $cashDepositsCount = tbl_transaction_option_details::where('transaction_name', 'Cash Deposit')->count();
        $withdrawalsCount = tbl_transaction_option_details::where('transaction_name', 'Withdrawal')->count();
        $billPaymentsCount = tbl_transaction_option_details::where('transaction_name', 'Bill Payment')->count();
    
        return view('CRUD.Branchmanager.view-transaction', compact('menus', 'transactions', 'transactionName', 'cashDepositsCount', 'withdrawalsCount', 'billPaymentsCount'));
        
    }
    

//   public function transaction(Request $request)
// {
//     $menus = MainMenu::with('subMenus')->whereNotIn('id', [1, 2, 3, 4])->get();
//     $transactionName = tbl_transaction_option::all();

//     if ($request->ajax()) {
//         $transactionId = $request->input('transaction');

//          if (empty($transactionId)) {
//             $transactions = tbl_transaction_option_details::all();  
//         } else {
//             $transactions = tbl_transaction_option_details::where('transaction_option_id_FK', $transactionId)->get();
//         }

//         return response()->json(['transactions' => $transactions]);
//     }

//     $transactions = tbl_transaction_option_details::all(); 
//     return view('CRUD.Branchmanager.view-transaction', compact('menus', 'transactions', 'transactionName'));
// }



    // public function transaction(Request $request)
    // {
    //       $menus = MainMenu::with('subMenus')->whereNotIn('id', [1, 2, 3, 4])->get();
    //     $transactionName = tbl_transaction_option::all();

    //       if ($request->ajax()) {
    //         $transactionId = $request->input('transaction');
    //         $transactions = tbl_transaction_option_details::where('transaction_option_id_FK', $transactionId)->get();
            
    //           return response()->json(['transactions' => $transactions]);
    //     }
    //     else{

    //       $transactions = tbl_transaction_option_details::all();
    //     }
        
    //     return view('CRUD.Branchmanager.view-transaction', compact('menus', 'transactions', 'transactionName'));
    // }
}
