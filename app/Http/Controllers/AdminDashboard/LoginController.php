<?php

namespace App\Http\Controllers\AdminDashboard;

 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
use App\Models\SuperAdmin;
 
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    // Show login page
    public function authlogin()
    {
        return view('auth.auth-login');
    }


        public function authenticate(Request $request)
        {
        $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
        ]);

        $superAdmin = SuperAdmin::where('email', $request->email)->first();


        if ($superAdmin &&  $request->password && $superAdmin->password) {
        Auth::login($superAdmin);
        session(['role' => 1, 'userName' => $superAdmin->name]);

        return redirect()->route('dashboard');
        } else {
        return redirect()->back()->withErrors(['email' => 'The provided credentials do not match our records.']);
        }



        }


public function logout()
{
    Auth::logout();
    return redirect()->route('authlogin');
}
}



// $userBank = UserBank::where('Email', $request->email)->first();
// if ($userBank && Hash::check($request->password, $userBank->Password)) {
//     Auth::login($userBank);
//     session(['role' => $userBank->RoleID, 'userName' => $userBank->name]);
//     return redirect()->route('dashboard');
// }



//       $bank = Bank::where('email', $request->email)->first();
//     if ($bank && Hash::check($request->password, $bank->Password)) {
//         Auth::login($bank);
//         session(['role' => $bank->Role, 'bakname' => $bank->name]);
//         return redirect()->route('dashboard');
//     }


//     return redirect()->back()->withErrors(['email' => 'The provided credentials do not match our records.']);


    // public function authenticate(Request $request)
    // {

    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|min:6',
    //     ]);


    //     $userBank = UserBank::where('Email', $request->email)->first();
    //     if ($userBank && Hash::check($request->password, $userBank->Password)) {
    //         Auth::login($userBank);
    //         session(['role' => $userBank->RoleID, 'userName' => $userBank->name]);
    //         return redirect()->route('dashboard');
    //     }


    //     $superAdmin = SuperAdmin::where('email', $request->email)->first();
    //     if ($superAdmin && Hash::check($request->password, $superAdmin->password)) {
    //         Auth::login($superAdmin);
    //         session(['role' => 1, 'userName' => $superAdmin->name]);
    //         return redirect()->route('dashboard');
    //     }


    //     $bank = Bank::where('email', $request->email)->first();
    //     if ($bank && Hash::check($request->password, $bank->Password)) {
    //         Auth::login($bank);
    //         session(['role' => $bank->Role, 'userName' => $bank->name]);
    //         return redirect()->route('dashboard');
    //     }

    //     // Check Branch Manager

    // }

    // public function authenticate(Request $request)
    // {

    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|min:6',
    //     ]);


    //     $userBank = UserBank::where('Email', $request->email)->first();
    //     if ($userBank && Hash::check($request->password, $userBank->Password)) {
    //         if ($userBank->RoleID == 4) {
    //             Auth::login($userBank);
    //             return redirect()->route('dashboard');
    //         } else {
    //             return redirect()->route('login')
    //                 ->with('error', 'You do not have access to this area.')
    //                 ->withInput();
    //         }
    //     }


    //     $superAdmin = SuperAdmin::where('email', $request->email)->first();
    //     if ($superAdmin && Hash::check($request->password, $superAdmin->password)) {
    //         Auth::login($superAdmin);
    //         return redirect()->route('dashboard');
    //     }

    //     $bankUser = Bank::where('email', $request->email)->first();
    //     if ($bankUser && Hash::check($request->password, $bankUser->Password)) {
    //         Auth::login($bankUser);
    //         return redirect()->route('dashboard');
    //     }


    //     return redirect()->route('login')
    //         ->with('error', 'Either email or password is incorrect.')
    //         ->withInput();
    // }

