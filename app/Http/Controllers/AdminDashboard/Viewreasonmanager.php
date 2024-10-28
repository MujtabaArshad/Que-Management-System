<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\MainMenu;
use Illuminate\Support\Facades\DB;

class Viewreasonmanager extends Controller
{
   
    public function viewbranch(){
        $branches=Branch::all();
        $menus = MainMenu::with('subMenus')->whereNotIn('id', [1, 2, 3, 4,5,6,7])->get();
   
        $branches = DB::table('tbl_branches')
            ->join('tbl_banks', 'tbl_branches.BankID', '=', 'tbl_banks.BankId')
            ->join('cities', 'tbl_branches.CityID', '=', 'cities.id')
               ->select('tbl_branches.*', 'tbl_banks.Bankname', 'cities.City_name' )
            ->get();

        return view('Reason-manager.branch-view',compact('branches','menus'));
    }
}
