<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Bank;
use App\Models\Branch;
use App\Models\City;
use App\Models\MainMenu;
use App\Models\tbl_reason_manager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Reasonmanagercontroller extends Controller
{
    public function Auth(){
        return view('auth.auth-reason-manager');
      }

      public function authreasonmanager(Request $req)
      {
      $req->validate([
      'email' => 'required|email',
      'password' => 'required|min:6',
      ]);

      $reason_manager = tbl_reason_manager::where('email', $req->email)->first();
      if ($reason_manager && Hash::check($req->password, $reason_manager->password)) {
        Auth::login($reason_manager);
        session(['role' => 5, 'userName' => $reason_manager->firstname]);
      return redirect()->route('dashboard');


      }
      else {
          return redirect()->back()->withErrors(['email' => 'The provided credentials do not match our records.']);
      }
  }


 

  public function getreasonmanager(){
    $roles=Role::all();
 $banks=Bank::all();
 $branches=Branch::all();
 $cities=City::all();
 $menus = MainMenu::with('subMenus')->whereNotIn('id',[5,6])->get();

 

    return view('Reason-manager.add-reason-manager',compact('banks','branches','cities','roles','menus' ));
}

  
    public function insertreasonmanager(Request $request){

        $validate = $request->validate([
            'firstname' => 'required|string|max:255|unique:tbl_reason_manager,firstname',
            'email' => 'required|string|max:255|unique:tbl_reason_manager,email',  
            'password' => 'required|string|min:8',
            'contactnumber' => 'required|digits:11|unique:tbl_reason_manager,contactnumber',
            'address' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'ntn' => 'required|digits:13|unique:tbl_reason_manager,ntn',
            'gender' => 'required|string|in:Male,Female',
      
            'bankname' => 'required',
            'branchname' => 'required',
            'cityname' => 'required',
            'hiredate' => 'required|date',
            'dateofbirth' => 'required|date',
            'salary' => 'required',
            'role' => 'required',
        ], [
            'email.unique' => 'This Email is already registered.',
            'contactnumber.unique' => 'This contact number is already registered.',
            'ntn.unique' => 'This NTN is already registered.',
        ]);
        
       
        $insdata = new tbl_reason_manager();
        $insdata->firstname = $request->firstname;
        $insdata->email = $request->email;
        $insdata->password = bcrypt($request->password);
        $insdata->contactnumber=$request->contactnumber;
        $insdata->address = $request->address;
        $insdata->age = $request->age;
        $insdata->ntn = $request->ntn;
        $insdata->gender = $request->gender;
        $insdata->bankid = $request->bankname;
        $insdata->branchid = $request->branchname;
        $insdata->cityid = $request->cityname;
        $insdata->hiredate = $request->hiredate;
        $insdata->dateofbirth = $request->dateofbirth;
        $insdata->salary = $request->salary;
        $insdata->role=$request->role;
        $insdata->save();
        return redirect()->route('showreasonmanager');
        }
        public function showreasonmanager(){

            $reason_manager=DB::table('tbl_reason_manager')
            ->join('tbl_banks','tbl_reason_manager.bankid','=','tbl_banks.BankId')
            ->join('tbl_branches','tbl_reason_manager.branchid','tbl_branches.BranchID')
            ->join('cities','tbl_reason_manager.cityid','=','cities.id')
            ->select('tbl_reason_manager.*','tbl_banks.Bankname','tbl_branches.BranchName','cities.City_name')->get();
        // $managers=Branchmanager::all();
        $menus = MainMenu::with('subMenus')->whereNotIn('id',[5,6])->get();

      
        return view('Reason-manager.view-reason-manager',compact('reason_manager','menus'));
      }

      public function editreasonmanager($id){
        $reason_manager = tbl_reason_manager::findOrFail($id);
        $menus = MainMenu::with('subMenus')->whereNotIn('id',[5,6])->get();

        return view('Reason-manager.edit-reason', compact('reason_manager','menus'));
        }

        public function profilereasonmanager($id)
        {
            $menus = MainMenu::with('subMenus')->whereNotIn('id',[5,6])->get();
            $reason_manager = tbl_reason_manager::findOrFail($id);

        return view('CRUD.view-edit-manager', compact('reason_manager','menus'));
        }


        public function  profileshowedit($id)
        {
            $menus = MainMenu::with('subMenus')->whereNotIn('id',[5,6])->get();
            $reason_manager = tbl_reason_manager::findOrFail($id);

        return view('Reason-manager.profile-view', compact('reason_manager','menus'));
        }



        public function updatereasonmanager(Request $request, $id)
        {

            $validate = $request->validate([
                'firstname' => 'required|string|max:255',
        'email' => [   'required',
        'email',
        Rule::unique('tbl_reason_manager', 'email')->ignore($id, 'id'),
        ],
     [
        'email.unique' => 'The email has already been taken.',
     ],




        'password' => 'nullable|string|min:8',
        'address' => 'required|string|max:255',
        'age' => 'required|integer|min:1',
        'ntn' => [
        'required',
        'digits:13',
        Rule::unique('tbl_reason_manager', 'ntn')->ignore($id, 'id'),
        ],
        'gender' => 'required|string|in:Male,Female',
        'bankname' => 'required',
        'branchname' => 'required',
        'Cityname' => 'required',
        'hiredate' => 'required|date',
        'dateofbirth' => 'required|date',
        'required',
        'numeric',
        'min:0',
        'regex:/^\d{1,6}(\.\d{1,2})?$/',

        ] );


        $insdata = tbl_reason_manager::find($id);

        if ($insdata) {

        $insdata->firstname = $request->fstname;
        $insdata->email = $request->email;

        if ($request->filled('password')) {
        $insdata->password = bcrypt($request->password);
        }


        $insdata->address = $request->address;
        $insdata->age = $request->age;
        $insdata->ntn = $request->ntn;
        $insdata->gender = $request->gender;
        $insdata->hiredate = $request->hiredate;
        $insdata->dateofbirth = $request->dateofbirth;
        $insdata->salary = $request->salary;

        $insdata->save();
        return redirect()->route('showreasonmanager')->with('success', 'Branch Manager updated successfully!');
        } else {
        return redirect()->route('showreasonmanager')->with('error', 'Branch Manager not found!');
        }
        }



        public function reasonmanagerdelete($id){
          $reason_manager=tbl_reason_manager::find($id);
          if($reason_manager){
              $reason_manager->delete();
              return redirect()->route('showreasonmanager')->with('delete branch manager.');
          }

      }

    }






 