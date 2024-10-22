<?php
namespace App\Http\Controllers\AdminDashboard;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
 
use App\Models\Bank;
use App\Models\Role;
use App\Models\MainMenu;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;


class BankController extends  Controller
{
    // Bank showform
    public function showForm()
    {

        $roles = Role::where('id',[3])->get();

        $menus = MainMenu::with('subMenus')  ->whereNotIn('id',[5,6])  ->get();
        return view('CRUD.bank', compact('roles','menus'));


    }

    public function insertData(Request $req)
    {
        // Validation rules
        $validator = Validator::make($req->all(), [
            'Bankname' => 'required|string|max:255|unique:tbl_banks,Bankname',
            'Email' => 'required|email|unique:tbl_banks,email',
            'contact' => 'required|digits:11|unique:tbl_banks,contact',
            'No_of_Employee' => 'required|integer',
            'NTN' => 'required|digits:13|unique:tbl_banks,NTN',
            'Address' => 'required|string|max:255',
            'Password' => 'required|string|min:6',
            'Branches' => 'required|integer',
        ], [
            'Bankname.unique' => 'This bank name is already registered.',
            'Email.unique' => 'This email is already registered.',
            'contact.unique' => 'This contact number is already registered.',
            'NTN.unique' => 'This NTN number is already registered.',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Insert data
        $insData = new Bank();
        $insData->Bankname = $req->Bankname;
        $insData->email = $req->Email;
        $insData->contact = $req->contact;
        $insData->No_of_Employee = $req->No_of_Employee;
        $insData->NTN = $req->NTN;
        $insData->Address = $req->Address;
        $insData->Password = bcrypt($req->Password);
        $insData->Branches = $req->Branches;
    
        $insData->save();
        return redirect()->route('allbank')->with('success', 'Bank registered successfully.');
    }
    

    //  viewAll
    public function viewAll(){
    $banks=Bank::all();
    $menus = MainMenu::with('subMenus')->whereNotIn('id',[5,6])->get();
    return view('CRUD.bank-view',compact('banks','menus'));
    }
    //  delete
    public function deletebank($BankId)
    {
    $bank = Bank::find($BankId);

    if ($bank) {
    $bank->delete();
    return redirect()->route('allbank')->with('success', 'Bank record deleted successfully.');
    }
    else {
    return redirect()->route('allbank')->with('error', 'Bank record not found.');
    }

    }

    //   editdata
    public function editData($BankId)
    {

    $banks = Bank::find($BankId);

    $menus = MainMenu::with('subMenus')->whereNotIn('id',[5,6])->get();


    return view('CRUD.bank-edit', compact('banks','menus'));
    }

    // viewbank
    public function viewbank($BankId)
    {

    $banks = Bank::find($BankId);
    $menus = MainMenu::with('subMenus')->whereNotIn('id',[5,6])->get();


    return view('CRUD.bank-view-edit', compact('banks','menus'));
    }

    // update

    public function updateData(Request $req, $BankId)
{
    $validateData = $req->validate([
        'Bankname' => 'required|string|max:255',
        'email' => ['required', 'email', Rule::unique('tbl_banks')->ignore($BankId, 'BankId')],
        'contact' => 'required|digits:11',
        'No_of_Employee' => 'required|integer',
        'NTN' => ['required', 'digits:13', Rule::unique('tbl_banks')->ignore($BankId, 'BankId')],
        'Address' => 'required|string|max:255',
        'Password' => 'nullable|string|min:6',
        'Branches' => 'required|integer',
    ]);

    $updateData = Bank::find($BankId);

    if($updateData) {
        $updateData->Bankname = $req->Bankname;
        $updateData->email = $req->email;
        $updateData->contact = $req->contact;
        $updateData->No_of_Employee = $req->No_of_Employee;
        $updateData->NTN = $req->NTN;
        $updateData->Address = $req->Address;

        if($req->Password) {
            $updateData->Password = bcrypt($req->Password);
        }

        $updateData->Branches = $req->Branches;
        $updateData->save();
    }

    return redirect()->route('allbank')->with('success', 'Bank updated successfully.');
    }
    }

    // public function updateData(Request $req, $BankId)
    // {
    //     // Validate the request
    //     $req->validate([
    //         'Bankname' => 'required|string|max:255',
    //         'Bankemail' => [
    //             'required',
    //             'email',
    //             Rule::unique('tbl_banks', 'Bankemail')->ignore($BankId, 'BankId'),
    //         ],
    //         'Bankcontact' => 'required|size:12|numeric',
    //         'No_of_Employee' => 'required|integer',
    //         'NTN' => 'required|size:13|numeric',
    //         'BankAddress' => 'required|string|max:255',
    //         'Password' => 'nullable|string|min:6',
    //         'Branches' => 'required|integer',
    //     ]);

    //     // Find the bank record
    //     $UpdataBank = Bank::find($BankId);

    //     if ($UpdataBank) {
    //         // Update the record
    //         $UpdataBank->Bankname = $req->Bankname;
    //         $UpdataBank->Bankemail = $req->Bankemail;
    //         $UpdataBank->Bankcontact = $req->Bankcontact;
    //         $UpdataBank->No_of_Employee = $req->No_of_Employee;
    //         $UpdataBank->NTN = $req->NTN;
    //         $UpdataBank->BankAddress = $req->BankAddress;
    //         $UpdataBank->Password = $req->Password ? bcrypt($req->Password) : $UpdataBank->Password;
    //         $UpdataBank->Branches = $req->Branches;
    //         $UpdataBank->save();

    //         return redirect()->route('allbank')->with('success', 'Bank updated successfully.');
    //     } else {
    //         return redirect()->route('allbank')->with('error', 'Bank not found.');
    //     }
    // }


    //   public function updateData(Request $req, $BankId)
    //     {
    //         $req->validate([
    //             'Bankname' => 'required|string|max:255',
    //             'Bankemail' => [
    //                 'required','email',
    //                 Rule::unique('tbl_banks', 'Bankemail')->ignore($BankId),

    //             ],
    //             'Bankcontact' => 'required|size:12|numeric',
    //             'No_of_Employee' => 'required|integer',
    //             'NTN' => 'required|size:13|numeric',
    //             'BankAddress' => 'required|string|max:255',
    //             'Password' => 'nullable|string|min:6',
    //             'Branches' => 'required|integer',
    //         ]);

    //         $UpdataBank = Bank::find($BankId);


    //         if ($UpdataBank) {
    //             $UpdataBank->Bankname = $req->Bankname;
    //             $UpdataBank->Bankemail = $req->Bankemail;
    //             $UpdataBank->Bankcontact = $req->Bankcontact;
    //             $UpdataBank->No_of_Employee = $req->No_of_Employee;
    //             $UpdataBank->NTN = $req->NTN;
    //             $UpdataBank->BankAddress = $req->BankAddress;
    //             $UpdataBank->Password = $req->Password ? bcrypt($req->Password) : $UpdataBank->Password;
    //             $UpdataBank->Branches = $req->Branches;
    //             $UpdataBank->save();
    //             return redirect()->route('bank')->with('success', 'Bank updated successfully.');
    //         } else {
    //             return redirect()->route('bank')->with('error', 'Bank not found.');
    //         }
    //     }
