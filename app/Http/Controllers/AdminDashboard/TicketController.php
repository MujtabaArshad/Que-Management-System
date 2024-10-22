<?php
namespace App\Http\Controllers\AdminDashboard;
 
use App\Models\tbl_transaction_option_details;
 
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
 

class TicketController extends Controller
{

  public function store(Request $request) 
{
  

    $phoneNumber = $request->simcode . $request->customer_phone;

    $insData = new tbl_transaction_option_details();
    $insData->customer_name = $request->customer_name;
    $insData->customer_phone = $phoneNumber;  
    $insData->transaction_option_id_FK = $request->transaction_option_id_FK;
    $insData->transaction_name = $request->transaction_name;
    $insData->ticket_number = $request->ticket_number;
  
    $insData->save();
    return redirect()->back()->with('success', 'Form submitted successfully!');

    // Pass the branchCode and branchName to the view
  
}

}
    // public function viewAll(){
    //   $mobilefor = Bank::all();
    //   return view('CRUD.bank-view',compact('banks'));
    //   }


      // public function Dropdown()
      // {
      // $phone = Simcode::all();
      // return view('BankApp.cus-form', compact('phone'));
      // }

      
      // public function Dropdown()
      // {
          
      //   $dropdownoptions=Simcode::all();
      //     $dropdownoptions = DB::table('tbl_simcode')
      //         ->where('id', 1)
      //         ->get();
      
          
      //     return view('BankApp.cus-form', compact('dropdownoptions')); 
      // }
      

      

