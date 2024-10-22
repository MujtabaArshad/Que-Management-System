<?php
namespace App\Http\Controllers\AdminDashboard;
 use Illuminate\Support\Facades\Validator;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Bank;
use App\Models\Branch;
use App\Models\City;
use App\Models\MainMenu;
use Illuminate\Routing\Controller;

class BranchController extends Controller
{
  //  viewData
        
    public function viewData()
    {
        $menus = MainMenu::with('subMenus');
        $menus = MainMenu::with('subMenus')->whereNotIn('id',[5,6])->get();
   
        $branches = DB::table('tbl_branches')
            ->join('tbl_banks', 'tbl_branches.BankID', '=', 'tbl_banks.BankId')
            ->join('cities', 'tbl_branches.CityID', '=', 'cities.id')
            ->select('tbl_branches.*', 'tbl_banks.Bankname', 'cities.City_name')
            ->get();

        return view('CRUD.view-branches', compact('branches', 'menus'));
    }


        
  
       
        


    //   showform
        public function showForm()
        {
        $banks = Bank::all(); 
        $cities = City::all();
        $branches = Branch::all(); 
        $menus = MainMenu::with('subMenus')->whereNotIn('id',[5,6])->get();
   

        return view('CRUD.add-branches', compact('banks', 'cities', 'branches','menus'));    
        }

  
    // insertData Branch

        public function insertData(Request $req)
        {
            $validator = Validator::make($req->all(), [
                'BranchName' => 'required|max:100',
        'BranchCode' =>'required|max:5|unique:tbl_branches,BranchCode',
        'bankname'=>'required',
        'cityname'=>'required|exists:cities,id',
        'BranchAddress' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    

        $insData = new Branch();
        $insData->BranchCode = $req->BranchCode;
        $insData->BranchName = $req->BranchName;
        $insData->BankID = $req->bankname;
        $insData->CityID = $req->cityname;
        $insData->BranchAddress = $req->BranchAddress;
        $insData->save();
        return redirect()->route('viewData')->with('message', 'Branch added successfully!');
        
        }
        


       // viewBranch

        public function viewBranch()
        {
        $banks = Bank::all();
        $menus = MainMenu::with('subMenus')->whereNotIn('id',[5,6])->get();
        


        return view('CRUD.view-branches', compact('banks','menus'));
        }


        // vieweditbranch 
        public function vieweditbranches($id)
        {
        $branch = Branch::find($id); 
        $menus = MainMenu::with('subMenus')->whereNotIn('id',[5,6])->get();
      
        return view('CRUD.view-edit-branch', compact('branch','menus'));
        }


        // editdata branch
        public function editData($BranchID)
        {
        $branch = Branch::find($BranchID);
        $menus = MainMenu::with('subMenus')->whereNotIn('id',[5,6])->get();
      
        return view('CRUD.edit-branch', compact('branch','menus'));
        }

        //   updateData  Branch 



         //  updateData

        public function updateData(Request $req, $BranchID)
        {
        $updateData = Branch::find($BranchID);

        if ($updateData) {
        $updateData->Branchname = $req->BranchName;
        $updateData->BranchCode = $req->BranchCode;
        $updateData->BranchAddress = $req->BranchAddress;
        $updateData->save();
        return redirect()->route('viewData')->with('success', 'Branch updated successfully.');
        } else {
        return redirect()->route('viewData')->with('error', 'Branch not found.');
        }
        }


        //  delete branch
    
        public function delete($BranchID)
        {
        $branch = Branch::find($BranchID);
    
    
        if ($branch) {
    
        $branch->delete();
        return redirect()->route('viewData')->with('success', 'Branch deleted successfully.');
        } else {
    
        return redirect()->route('viewData')->with('error', 'Branch not found.');
        }
        }





        public function getBranchId(Request $request)
        {
        $branchCode = $request->branch_code;

        $branch = Branch::where('BranchCode', $branchCode)->first();

        if ($branch) {
        return response()->json(['branch_id' => $branch->BranchID]);
        } else {
        return response()->json(['error' => 'Branch not found'], 404);
        }
        }
        }


    


    
 
    
   












    
// public function index()
// {
//     $branches = Branch::all();
//     // $branches = $this->viewData(); 
//     return view('CRUD.view-branches', compact('branches'));
// }


//     public function viewData()
// {
//         $branches = Branch::all();
//     // $branches = Branch::with(['bank', 'city'])->get();
//     return view('CRUD.view-branches', compact('branches'));
// }

    // public function viewData()
    // {
    //     $branches = DB::table('tbl_branches')
    //         ->join('cities', 'tbl_branches.CityID', '=', 'cities.id')
    //         ->join('tbl_banks', 'tbl_branches.BankID', '=', 'tbl_banks.BankId')
    //         ->select('tbl_branches.*', 'cities.CityName', 'tbl_banks.Bankname')
    //         ->get();

    //     return $branches;
    // }

