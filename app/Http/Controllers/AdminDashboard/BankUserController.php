<?php
namespace App\Http\Controllers\AdminDashboard;

use Illuminate\Http\Request;
use App\Models\UserBank;
use App\Models\Role;
use App\Models\MainMenu;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
 
use Illuminate\Validation\Rule;

class BankuserController extends Controller
{
    // Add User
    public function adduser()
    {

        // $roleId = session('role');


        // $menus = collect();




        //     if ($roleId == 5) {
        //     $menus = DB::table('access_menus')
        //     ->join('access_roles', 'access_menus.role_id', '=', 'access_roles.role_id')
        //     ->join('main_menu', 'access_menus.menu_id', '=', 'main_menu.id')
        //     ->leftJoin('sub_menu', 'access_menus.submenu_id', '=', 'sub_menu.id')
        //     ->select(
        //     'main_menu.id as main_id',
        //     'sub_menu.id as sub_id',
        //     'main_menu.name as main_name',
        //     'main_menu.icon as menu_icon',
        //     'main_menu.route as main_route',
        //     'sub_menu.name as sub_name',
        //     'sub_menu.route as sub_route',
        //     'access_roles.role_name as access_role'
        //     ) ->where('access_menus.role_id', $roleId)->get();}



        //     else if($roleId == 4) {
        //     $menus = DB::table('access_menus')
        //     ->join('access_roles', 'access_menus.role_id', '=', 'access_roles.role_id')
        //     ->join('main_menu', 'access_menus.menu_id', '=', 'main_menu.id')
        //     ->leftJoin('sub_menu', 'access_menus.submenu_id', '=', 'sub_menu.id')
        //     ->select(
        //     'main_menu.id as main_id',
        //     'sub_menu.id as sub_id',
        //     'main_menu.name as main_name',
        //     'main_menu.icon as menu_icon',
        //     'main_menu.route as main_route',
        //     'sub_menu.name as sub_name',
        //     'sub_menu.route as sub_route',
        //     'access_roles.role_name as access_role'
        //     )

        //     ->get();
        //     }


        //     if ($roleId == 1) {
        //     $menus = DB::table('access_menus')
        //     ->join('access_roles', 'access_menus.role_id', '=', 'access_roles.role_id')
        //     ->join('main_menu', 'access_menus.menu_id', '=', 'main_menu.id')
        //     ->leftJoin('sub_menu', 'access_menus.submenu_id', '=', 'sub_menu.id')
        //     ->select(
        //     'main_menu.id as main_id',
        //     'sub_menu.id as sub_id',
        //     'main_menu.name as main_name',
        //     'main_menu.icon as menu_icon',
        //     'main_menu.route as main_route',
        //     'sub_menu.name as sub_name',
        //     'sub_menu.route as sub_route',
        //     'access_roles.role_name as access_role')->get();

        // }



        //     else if($roleId == 4) {
        //     $menus = DB::table('access_menus')
        //             ->join('access_roles', 'access_menus.role_id', '=', 'access_roles.role_id')
        //     ->join('main_menu', 'access_menus.menu_id', '=', 'main_menu.id')
        //     ->leftJoin('sub_menu', 'access_menus.submenu_id', '=', 'sub_menu.id')
        //     ->select(
        //     'main_menu.id as main_id',
        //     'sub_menu.id as sub_id',
        //     'main_menu.name as main_name',
        //     'main_menu.icon as menu_icon',
        //     'main_menu.route as main_route',
        //     'sub_menu.name as sub_name',
        //     'sub_menu.route as sub_route',
        //     'access_roles.role_name as access_role'
        //     ) ;

        //     }


        //     $menusGrouped = $menus->groupBy('main_id');

            $menus = MainMenu::with('subMenus')->whereNotIn('id',[5,6])->get();


    $roles = Role::where('id',[4])->get();
    $menus = MainMenu::with('subMenus')->whereNotIn('id',[5,6])->get();
    return view('CRUD.add-user', compact('roles','menus'));

    }


    // Show Users
    public function ShowUser()
    {
    $users = UserBank::all();


    $menus = MainMenu::with('subMenus')->whereNotIn('id',[5,6])->get();

    return view('CRUD.view-user', compact('users','menus'));
    }

  // Insert User
public function insertData(Request $req)
{
    $validator = Validator::make($req->all(), [
        'FirstName' => 'required|string|max:255',
        'LastName' => 'required|string|max:255',
        'Email' => 'required|email|unique:user_banks,Email',
        'contactnumber' => 'required|digits:11|unique:user_banks,ContactNumber',
        'Address' => 'required|string|max:255',
        'Age' => 'required|integer|min:1',
        'NTN' => 'required|digits:13|unique:user_banks,NTN',
        'Password' => 'required|string|min:8',
        'Gender' => 'required|string|in:Male,Female',
        'rolename' => 'required|integer|exists:roles,id',
        'Status' => 'nullable|boolean',
    ], [
        'Email.unique' => 'This Email is already registered',
        'contactnumber.unique' => 'This contact number is already registered.',
        'NTN.unique' => 'This NTN number is already registered.'
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    $insData = new UserBank();
    $insData->FirstName = $req->input('FirstName');
    $insData->LastName = $req->input('LastName');
    $insData->Email = $req->input('Email');
    $insData->ContactNumber = $req->input('contactnumber');
    $insData->Address = $req->input('Address');
    $insData->Age = $req->input('Age');
    $insData->NTN = $req->input('NTN');
    $insData->Password = bcrypt($req->input('Password'));
    $insData->Gender = $req->input('Gender');
    $insData->RoleID = $req->input('rolename');
    $insData->Status = $req->input('Status', true);
    $insData->save();

    return redirect()->route('ShowUser')->with('success', 'User registered successfully.');
}

    // Edit User
    public function edituser($id)
    {
    $users = UserBank::find($id);
    $roles = Role::where('id',[4])->get();


    $menus = MainMenu::with('subMenus')->whereNotIn('id',[5,6])->get();

    return view('CRUD.edit-user', compact('users', 'roles','menus'));
    }

    // Edit View
    // public function Editview($id)
    // {
    // $viewusr = UserBank::find($id);
    // $menus = MainMenu::with('subMenus')->get();

    // $roles = Role::all();
    // return view('CRUD.editview', compact('viewusr', 'roles','menus'));
    // }


    public function Editview($id)
{
    $viewusr = UserBank::find($id);

    if (!$viewusr) {
        return redirect()->back()->with('error', 'User not found');
    }

    $menus = MainMenu::with('subMenus')->whereNotIn('id',[5,6])->get();
         $roles = Role::all();
    return view('CRUD.editview', compact('viewusr', 'roles', 'menus'));
}

    // Update User
    public function updateData(Request $req, $id)
    {
    $validatedData = $req->validate([
    'FirstName' => 'required|string|max:255',
    'LastName' => 'required|string|max:255',
    'Email' => [
    'email',
    Rule::unique('user_banks', 'Email')->ignore($id),
    ],
    'Address' => 'required|string|max:255',
    'Age' => 'required|integer|min:1',
    'NTN' => [
    'required',
    'digits:13',
    Rule::unique('user_banks', 'NTN')->ignore($id),
    ],
    'Password' => 'nullable|string|min:8',
    'Status' => 'nullable|boolean',
    ]);

    $updateData = UserBank::find($id);
    if ($updateData) {
    $updateData->FirstName = $req->FirstName;
    $updateData->LastName = $req->LastName;
    $updateData->Email = $req->Email;
    $updateData->Address = $req->Address;
    $updateData->Age = $req->Age;
    $updateData->NTN = $req->NTN;

    if ($req->filled('Password')) {
    $updateData->Password = bcrypt($req->Password);
    }

    if ($req->has('Status')) {
    $updateData->Status = $req->Status;
    }

    $updateData->save();

    return redirect()->route('ShowUser')->with('success', 'User updated successfully.');
    }

    return redirect()->route('ShowUser')->with('error', 'User not found.');
    }




    public function updateStatus(Request $request, $id)
{
    $user = UserBank::find($id);

    if (!$user) {
        return redirect()->route('ShowUser')->withErrors('User not found');
    }


    if ($request->input('status') == '0') {

        $user->delete();
        return redirect()->route('ShowUser')->with('success', 'User deleted successfully');
    } else {

        $user->Status = 1;
        $user->save();
        return redirect()->route('ShowUser')->with('success', 'Status updated to active successfully');
    }
}

   // Delete User
  // Delete User
public function delete($id)
{
    $user = UserBank::find($id);
    if ($user) {
        $user->delete();
        return redirect()->route('ShowUser')->with('success', 'User deleted successfully.');
    } else {
        return redirect()->route('ShowUser')->with('error', 'User not found.');
    }
}

   }

//     public function updateStatus(Request $request, $id)
// {
//     $user = UserBank::find($id);

//     if (!$user) {
//         return redirect()->route('ShowUser')->withErrors('User not found');
//     }

//      $user->Status = $request->input('status') == '1' ? 1 : 0;
//     $user->save();

//     return redirect()->route('ShowUser')->with('success', 'Status updated successfully');
// }



    // public function updateStatus(Request $request, $id)
    // {
    // $user = UserBank::find($id);

    // if (!$user) {
    // return redirect()->route('ShowUser')->withErrors('User not found');
    // }

    // $user->Status = $request->input('status') ? 1 : 0;
    // $user->save();

    // return redirect()->route('ShowUser')->with('success', 'Status updated successfully');
    // }


 