<?php
namespace App\Http\Controllers\AdminDashboard;

 
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function AdminDashboard(){

    $roleId = session('role');


    $menus = collect();




        if ($roleId == 1) {
        $menus = DB::table('access_menus')
        ->join('access_roles', 'access_menus.role_id', '=', 'access_roles.role_id')
        ->join('main_menu', 'access_menus.menu_id', '=', 'main_menu.id')
        ->leftJoin('sub_menu', 'access_menus.submenu_id', '=', 'sub_menu.id')
        ->select(
        'main_menu.id as main_id',
        'sub_menu.id as sub_id',
        'main_menu.name as main_name',
        'main_menu.icon as menu_icon',
        'main_menu.route as main_route',
        'sub_menu.name as sub_name',
        'sub_menu.route as sub_route',
        'access_roles.role_name as access_role'
        ) ->where('access_menus.role_id', $roleId)->get();
    }


   else    if ($roleId == 3) {
        $menus = DB::table('access_menus')
        ->join('access_roles', 'access_menus.role_id', '=', 'access_roles.role_id')
        ->join('main_menu', 'access_menus.menu_id', '=', 'main_menu.id')
        ->leftJoin('sub_menu', 'access_menus.submenu_id', '=', 'sub_menu.id')
        ->select(
        'main_menu.id as main_id',
        'sub_menu.id as sub_id',
        'main_menu.name as main_name',
        'main_menu.icon as menu_icon',
        'main_menu.route as main_route',
        'sub_menu.name as sub_name',
        'sub_menu.route as sub_route',
        'access_roles.role_name as access_role'
        ) ->where('access_menus.role_id', $roleId)->get();
    }

    $menusGrouped = $menus->groupBy('main_id');

    return view('AdminDashboard.index', ['menus' => $menusGrouped]);
}


        // else if($roleId == 3) {
        // $menus = DB::table('access_menus')
        // ->join('access_roles', 'access_menus.role_id', '=', 'access_roles.role_id')
        // ->join('main_menu', 'access_menus.menu_id', '=', 'main_menu.id')
        // ->leftJoin('sub_menu', 'access_menus.submenu_id', '=', 'sub_menu.id')
        // ->select(
        // 'main_menu.id as main_id',
        // 'sub_menu.id as sub_id',
        // 'main_menu.name as main_name',
        // 'main_menu.icon as menu_icon',
        // 'main_menu.route as main_route',
        // 'sub_menu.name as sub_name',
        // 'sub_menu.route as sub_route',
        // 'access_roles.role_name as access_role'
        // )

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
    //     ) ->whereNotIn('main_menu.id', [5, 6])->get();

    //     }










    // if ($roleId == 5) {
    //     $menus = DB::table('access_menus')
    //         ->join('access_roles', 'access_menus.role_id', '=', 'access_roles.role_id')
    //         ->join('main_menu', 'access_menus.menu_id', '=', 'main_menu.id')
    //         ->leftJoin('sub_menu', 'access_menus.submenu_id', '=', 'sub_menu.id')
    //         ->select(
    //             'main_menu.id as main_id',
    //             'sub_menu.id as sub_id',
    //             'main_menu.name as main_name',
    //             'main_menu.icon as menu_icon',
    //             'main_menu.route as main_route',
    //             'sub_menu.name as sub_name',
    //             'sub_menu.route as sub_route',
    //             'access_roles.role_name as access_role'
    //         )
    //         ->where('access_menus.role_id', $roleId)
    //         ->orderBy('main_menu.id')
    //         ->get();





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
    //     ) ->whereNotIn('main_menu.id', [5, 6])->get();

    //     }



    // else if($roleId==4){
    //     $menus = DB::table('access_menus')
    //     ->join('access_roles', 'access_menus.role_id', '=', 'access_roles.role_id')
    //     ->join('main_menu', 'access_menus.menu_id', '=', 'main_menu.id')
    //     ->leftJoin('sub_menu', 'access_menus.submenu_id', '=', 'sub_menu.id')
    //     ->select(
    //         'main_menu.id as main_id',
    //         'sub_menu.id as sub_id',
    //         'main_menu.name as main_name',
    //         'main_menu.icon as menu_icon',
    //         'main_menu.route as main_route',
    //         'sub_menu.name as sub_name',
    //         'sub_menu.route as sub_route',
    //         'access_roles.role_name as access_role'
    //     )
    //     ->get();
    // }



    // public function AdminDashboard()
    // {
    //     $roleId = session('role');

    //     $menus = DB::table('access_menus')
    //         ->join('access_roles', 'access_menus.role_id', '=', 'access_roles.role_id')
    //         ->join('main_menu', 'access_menus.menu_id', '=', 'main_menu.id')
    //         ->leftJoin('sub_menu', 'access_menus.submenu_id', '=', 'sub_menu.id')
    //         ->select(
    //             'main_menu.id as main_id',
    //             'sub_menu.id as sub_id',
    //             'main_menu.name as main_name',
    //             'main_menu.icon as menu_icon',
    //             'main_menu.route as main_route',
    //             'sub_menu.name as sub_name',
    //             'sub_menu.route as sub_route',
    //             'access_roles.role_name as access_role'
    //         )
    //         ->where('access_menus.role_id', $roleId)
    //         ->get();

    //         $menusGrouped = $menus->groupBy('main_id');

    //     return view('AdminDashboard.index', ['menus' => $menusGrouped]);
    // }

    //     $roleId = session('role');


    //     $menus = DB::table('access_menus')
    //         ->join('access_roles', 'access_menus.role_id', '=', 'access_roles.role_id')
    //         ->join('main_menu', 'access_menus.menu_id', '=', 'main_menu.id')
    //         ->leftJoin('sub_menu', 'access_menus.submenu_id', '=', 'sub_menu.id')
    //         ->select(
    //             'main_menu.id as main_id',
    //             'sub_menu.id as sub_id',
    //             'main_menu.name as main_name',
    //             'main_menu.icon as menu_icon'  ,
    //             'main_menu.route as main_route',
    //             'sub_menu.name as sub_name',
    //             'sub_menu.route as sub_route',
    //             'access_roles.role_name as access_role'
    //         )
    //         ->where('access_menus.role_id', $roleId)
    //         ->get();

    //     return view('AdminDashboard.index', compact('menus'));
    // }


}
