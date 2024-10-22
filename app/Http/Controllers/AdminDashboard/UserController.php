<!-- 
    
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\Branch;
    
class UserController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */




    
    public function index()
{
    $branches = Branch::all();
    return view('CRUD.view-branches', compact('branches'));
}

    // public function index()
    // {
    //     $users = Branch::get();
  
    //     return view('CRUD.view-branches', compact('branch'));
    // }
          
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
         
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function import(Request $request) 
    // {
    //     // Validate incoming request data
    //     $request->validate([
    //         'file' => 'required|max:2048',
    //     ]);
  
    //     Excel::import(new UsersImport, $request->file('file'));
                 
    //      return redirect()->route('viewData')->with('success', 'Bank imported successfully.');
    // }


    public function import(Request $request) 
{
    // Validate incoming request data
    $request->validate([
        'file' => 'required|mimes:xlsx,xls|max:2048',
    ]);

    // Import the file
    Excel::import(new UsersImport, $request->file('file'));

    // Redirect with success message
    return redirect()->route('viewData')->with('success', 'Data imported successfully.');
}

} -->