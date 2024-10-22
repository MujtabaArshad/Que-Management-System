<?php
namespace App\Http\Controllers\AdminDashboard;

use App\Models\MainMenu;
use App\Models\Role;
 
use App\Models\Branchmanager;
 
use App\Models\Branch;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class viewmanagerController extends Controller
{

        public function viewManager()
        {

        $branchManager = Auth::guard('managers')->user();


        $branchId = $branchManager->BranchID;


        $branch = Branch::with('bank', 'city')
        ->where('BranchID', $branchId)
        ->first();
        $managerRole = $branchManager->Role;
        if ($managerRole == 3) {

        $menus = MainMenu::with('subMenus')->whereNotIn('id', [1, 2, 3, 4])->get();
        } else {

        $menus = MainMenu::with('subMenus')->get();
        }


        return view('CRUD.Branchmanager.view-branch-manager', compact('branch', 'branchManager', 'menus'));
        }



        }
