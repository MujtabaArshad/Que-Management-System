<?php

namespace App\Http\Controllers\AdminDashboard;

 
use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\Branch;
use App\Models\Branchmanager;
use App\Models\City;
use App\Models\Role;
use App\Models\MainMenu;
use Illuminate\Routing\Controller as RoutingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Validation\Rule;
use Illuminate\Validation\Rule;

        class BranchmanagerController extends RoutingController
        {
        public  function showform(){
        $banks=Bank::all();
        $branches=Branch::all();
        $cities=City::all();
        $menus = MainMenu::with('subMenus')->get();
        $roles = Role::where('id', 3)->get();
        $menus = MainMenu::with('subMenus')->whereNotIn('id',[5,6])->get();


        return view('CRUD.add-manager',compact('banks','branches','cities','roles','menus'));

        }


        public function Addmanager(){
        $banks=Bank::all();
        $branches=Branch::all();
        $cities=City::all();
        $roles=Role::all();
        $menus = MainMenu::with('subMenus')->get();
        return view('CRUD.add-manager',compact('banks','branches','cities','roles','menus'));
        }

        public function Insertdata(Request $req) {
        $validate = $req->validate([
        'fstname' => 'required|string|max:255|unique:tbl_branchmanagers,FirstName',
        'Email' => 'required|email|unique:tbl_branchmanagers,Email',
        'Password' => 'required|string|min:8',
        'contactnumber' => 'required|digits:11|unique:tbl_branchmanagers,ContactNumber',
   

     
        'Address' => 'required|string|max:255',
        'Age' => 'required|integer|min:1',
        'NTN' => 'required|digits:13|unique:tbl_branchmanagers,NTN',
        'Gender' => 'required|string|in:Male,Female',
        'bankname' => 'required',
        'branchname' => 'required',
        'branchcode' => 'required',
        'Cityname' => 'required',
        'Hiredate' => 'required|date',
        'dateofbirth' => 'required|date',
        'role' => 'required',
       'Salary' =>'required' ],
       [
         'Email.unique' => 'This Email is already registered.',
        'contactnumber.unique' => 'This contact number is already registered.',
        'NTN.unique' => 'This NTN is already registered.',
       ]
    
    );



        $insdata = new Branchmanager();
        $insdata->Firstname = $req->fstname;
        $insdata->Email = $req->Email;
        $insdata->Password = bcrypt($req->Password);
        $insdata->ContactNumber=$req->contactnumber;
        $insdata->Address = $req->Address;
        $insdata->Age = $req->Age;
        $insdata->NTN = $req->NTN;
        $insdata->Gender = $req->Gender;
        $insdata->BankID = $req->bankname;
        $insdata->BranchID = $req->branchname;
        $insdata->BranchCode = $req->branchcode;
        $insdata->CityID = $req->Cityname;
        $insdata->HireDate = $req->Hiredate;
        $insdata->Date_of_birth = $req->dateofbirth;
        $insdata->Salary = $req->Salary;
        $insdata->Role=$req->role;
        $insdata->save();
        return redirect()->route('showmanager');
        }

        public function managerLogin(){
        return view('auth.branch-manager');
        }

        public function authenticate(Request $req)
        {
        $req->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
        ]);

        $branchManager = Branchmanager::where('Email', $req->email)->first();
        if ($branchManager && Hash::check($req->password, $branchManager->Password)) {
        Auth::guard('managers')->login($branchManager);
        session([
        'role' => $branchManager->Role,
        'userName' => $branchManager->Firstname,
        'branchId' => $branchManager->BranchID,
        'branchcode' => $branchManager->BranchCode,
        ]);
        return redirect()->route('dashboard');


        }
        else {
            return redirect()->back()->withErrors(['email' => 'The provided credentials do not match our records.']);
        }
    }

            public function showdata(){

                $managers=DB::table('tbl_branchmanagers')
                ->join('tbl_banks','tbl_branchmanagers.BankID','=','tbl_banks.BankId')
                ->join('tbl_branches','tbl_branchmanagers.BranchID','tbl_branches.BranchID')
                ->join('cities','tbl_branchmanagers.CityID','=','cities.id')
                ->select('tbl_branchmanagers.*','tbl_banks.Bankname','tbl_branches.BranchName','cities.City_name')->get();
            // $managers=Branchmanager::all();

            $menus = MainMenu::with('subMenus')->whereNotIn('id',[5,6,7])->get();

            return view('CRUD.view-manager',compact('managers','menus'));
          }

            public function EditData($ManagerId){
            $managers = Branchmanager::findOrFail($ManagerId);
            $menus = MainMenu::with('subMenus')->whereNotIn('id',[5,6])->get();

            return view('CRUD.edit-manager', compact('managers','menus'));
            }


            public function edit($ManagerId)
            {
                $menus = MainMenu::with('subMenus')->whereNotIn('id',[5,6])->get();
                $managers = Branchmanager::findOrFail($ManagerId);

            return view('CRUD.view-edit-manager', compact('managers','menus'));
            }



            public function managerdelete($id){
                $branchManager=Branchmanager::find($id);
                if($branchManager){
                    $branchManager->delete();
                    return redirect()->route('showmanager')->with('delete branch manager.');
                }

            }

            public function UpdateData(Request $req, $ManagerId)
            {

            $validator  = Validator::make($req->all(), [
            'fstname' => 'required|string|max:255',
            'Email' => [
            'required',
            'email',
            Rule::unique('tbl_branchmanagers', 'Email')->ignore($ManagerId, 'ManagerId'),
            ],
         [
            'Email.unique' => 'The email has already been taken.',
         ],




            'Password' => 'nullable|string|min:8',
            'Address' => 'required|string|max:255',
            'Age' => 'required|integer|min:1',
            'NTN' => [
            'required',
            'digits:13',
            Rule::unique('tbl_branchmanagers', 'NTN')->ignore($ManagerId, 'ManagerId'),
            ],
            'Gender' => 'required|string|in:Male,Female',
            'bankname' => 'required',
            'branchname' => 'required',
            'branchcode' => 'required|integer',
            'Cityname' => 'required',
            'Hiredate' => 'required|date',
            'dateofbirth' => 'required|date',
            'required',
            'numeric',
            'min:0',
            'regex:/^\d{1,6}(\.\d{1,2})?$/',

            ] );


            $insdata = Branchmanager::find($ManagerId);

            if ($insdata) {

            $insdata->Firstname = $req->fstname;
            $insdata->Email = $req->Email;

            if ($req->filled('Password')) {
            $insdata->Password = bcrypt($req->Password);
            }


            $insdata->Address = $req->Address;
            $insdata->Age = $req->Age;
            $insdata->NTN = $req->NTN;
            $insdata->Gender = $req->Gender;
            $insdata->HireDate = $req->Hiredate;
            $insdata->Date_of_birth = $req->dateofbirth;
            $insdata->Salary = $req->Salary;

            $insdata->save();
            return redirect()->route('showmanager')->with('success', 'Branch Manager updated successfully!');
            } else {
            return redirect()->route('showmanager')->with('error', 'Branch Manager not found!');
            }
            }
        }











    // if ($branchManager && Hash::check($request->password, $branchManager->Password)) {
    //     Auth::guard('managers')->login($branchManager);
    //     session(['role' => $branchManager->Role, 'userName' => $branchManager->name]);
    //     return redirect()->route('dashboard');
    // }

    // // If all checks fail, return back with an error
    // return back()->withErrors(['email' => 'Invalid credentials.']);
    // $branchManager = Branchmanager::where('Email', $req->email)->first();
    // if ($branchManager && Hash::check($req->password, $branchManager->Password)) {
    //     if ($branchManager->Role == 5) {
    //         Auth::guard('managers')->login($branchManager);
    //         session(['role' => $branchManager->Role]);
    //         return redirect()->route('dashboard');

    //     } else {
    //                session(['role' => $branchManager->Role]);
    //         Auth::guard('managers')->login($branchManager);
    //         return redirect()->route('dashboard');
    //     }
    // }

    // return back()->withErrors(['email' => 'Invalid credentials.']);







// public function Authenticate(Request $req)
// {
//     $req->validate([
//         'email' => 'required|email',
//         'password' => 'required|min:6',
//     ]);


//     $branchManager = Branchmanager::where('Email', $req->email)->first();

//     if ($branchManager && Hash::check($req->password, $branchManager->Password)) {
//         if ($branchManager->Role == 5) {
//             Auth::guard('managers')->login($branchManager);
//             return redirect()->route('dashboard');
//           }
//     }

//     return back()->withErrors(['email' => 'Invalid credentials.']);
// }






        // if ($branchManager && Hash::check($req->password, $branchManager->Password)) {
        // if ($branchManager->Role == 5) {
        //   Auth::guard('managers')->login($branchManager);

        // return redirect()->route('dashboard');
        // }
        // }

        // return redirect()->route('login')->withErrors(['error' => 'Invalid credentials or unauthorized access.']);
        // }



        // public function viewData()
        // {
        //     $menus = MainMenu::with('subMenus')->whereNotIn('id', [5, 6])->get();

        //     $branches = DB::table('tbl_branches')
        //         ->join('tbl_banks', 'tbl_branches.BankID', '=', 'tbl_banks.BankId')
        //         ->join('cities', 'tbl_branches.CityID', '=', 'cities.id')
        //         ->select('tbl_branches.*', 'tbl_banks.Bankname', 'cities.City_name')
        //         ->get();

        //     return view('CRUD.view-branches', compact('branches', 'menus'));
        // }






















    // public function Insertdata(Request $req){
    //     $validate =$req->validate([


    //        'fstname' => 'required|string|max:255',
    //        'Email'=>'required|email|unique|tbl_branchmanagers,Email',

    //        'Password'=>'required|string|min:8',
    //        'Address'=>'required|string|max:255',
    //         'Age'=>'required|integer|min:1',
    //         'NTN' => 'required|digits:13|unique:tbl_branchmanagers,NTN',
    //         'Gender' => 'required|string|in:Male,Female',
    //         'bankname' => 'required',
    //         'branchname' => 'required',
    //         'branchcode' => 'required|integer',
    //         'Cityname' => 'required',
    //         'Hiredate' => 'required|date',
    // 'dateofbirth' => 'required|date',
    // 'Salary' => [
    //     'required',
    //     'numeric',
    //     'min:0',
    //     'max:999999.99',
    //     'regex:/^\d+(\.\d{1,2})?$/',
    // ],



    //     ]);
    //     $insdata=new Branchmanager();
    //     $insdata->Firstname=$req->fstname;
    //     $insdata->Email=$req->Email;
    //     $insdata->Password= bcrypt($req->Password);
    //     $insdata->Address=$req->Address;
    //     $insdata->Age=$req->Age;
    //     $insdata->NTN=$req->NTN;
    //     $insdata->Gender=$req->Gender;
    //     $insdata->BankID=$req->bankname;
    //     $insdata->BranchID=$req->branchname;
    //     $insdata->BranchCode=$req->branchcode;
    //     $insdata->CityID=$req->Cityname;
    //     $insdata->HireDate=$req->Hiredate;
    //     $insdata->Date_of_birth	=$req->dateofbirth;
    //     $insdata->Salary=$req->Salary;
    //     // $insdata->Status = $req->input('Status', true);

    //     $insdata->save();

    //     return redirect()->back()->with('success', 'Branch Manager added successfully!');

    // }


