<?php

use App\Http\Controllers\AdminDashboard\AdminController;
use App\Http\Controllers\AdminDashboard\BankController;
use App\Http\Controllers\AdminDashboard\BranchController;
use App\Http\Controllers\AdminDashboard\BankuserController;
use App\Http\Controllers\AdminDashboard\BranchmanagerController;
use App\Http\Controllers\AdminDashboard\TicketController;
use App\Http\Controllers\AdminDashboard\LoginController;
use App\Http\Controllers\AdminDashboard\ViewmanagerController;
use App\Http\Controllers\AdminDashboard\ViewtransactionController;
use App\Http\Controllers\QRcodeController;
use Illuminate\Support\Facades\Route;

// Authentication Routes
// Route::group(['middleware' => 'guest'], function() {
   
 
Route::get('/', [LoginController::class, 'authlogin'])->name('authlogin');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
// });

// Branch Manager Routes
Route::get('/login/manager', [BranchmanagerController::class, 'managerLogin'])->name('auth.login');
Route::post('/branchmanager/login', [BranchmanagerController::class, 'Authenticate'])->name('branchmanager.login');

// Protected Routes
// Route::group(['middleware' => 'auth'], function() {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('dashboard');
    Route::get('/account/logout', [LoginController::class, 'logout'])->name('account.logout');

    // Bank Routes
    // Route::prefix('bank')->group(function() {
        Route::get('/addbank', [BankController::class, 'showForm'])->name('bank');
        Route::post('/bank/inserform', [BankController::class, 'insertData'])->name('insertForm');
        Route::get('/bank/view', [BankController::class, 'viewAll'])->name('allbank');
        Route::get('/editbank/{BankId}', [BankController::class, 'editData'])->name('editData');
        Route::post('/update/bank/{BankId}', [BankController::class, 'updateData'])->name('updateBank');
        Route::get('/viewbank/{id}', [BankController::class, 'viewbank'])->name('viewbankedit');
        Route::delete('delete/bank/{BankId}', [BankController::class, 'deletebank'])->name('deleteBank');
    // });

    // Branch Routes
    // Route::prefix('branches')->group(function() {
        Route::get('/addbranch', [BranchController::class, 'showForm'])->name('addbranch');
        Route::post('/addbranch', [BranchController::class, 'insertData'])->name('insertData');
        Route::get('/view/branch/data', [BranchController::class, 'viewData'])->name('viewData');
        Route::get('/edit/branch/{id}', [BranchController::class, 'editData'])->name('editbranch');
        Route::get('/view/edit/branch/{id}', [BranchController::class, 'vieweditbranches'])->name('vieweditbranch');
  
        Route::post('/update/branch/{id}', [BranchController::class, 'updateData']);
        Route::delete('delete/branch/{id}', [BranchController::class, 'delete'])->name('deleteBranch');
    // });

    // Branch Manager Routes
    // Route::prefix('manager')->group(function() {
        Route::get('/addmanager', [BranchmanagerController::class, 'showform'])->name('getform');
        Route::post('/addmanager', [BranchmanagerController::class, 'Insertdata'])->name('addmanager');
        Route::get('/viewmanager', [BranchmanagerController::class, 'showdata'])->name('showmanager');
        Route::get('/edit/manager/{ManagerId}', [BranchmanagerController::class, 'EditData'])->name('editmanager');
        Route::post('/update/manager/{ManagerId}', [BranchmanagerController::class, 'UpdateData'])
        ->name('updatemanager');
        
    Route::get('/edit-branch-manager/{ManagerId}', [BranchmanagerController::class, 'edit'])
    ->name('editviewmanager');


        Route::delete('delete/{ManagerId}', [BranchmanagerController::class, 'managerdelete'])->name('deletemanager');
    // });

    // Bank User Routes
    // Route::prefix('user')->group(function() {
        Route::get('/adduser', [BankuserController::class, 'adduser'])->name('getuser');
        Route::post('/adduser', [BankuserController::class, 'insertData'])->name('adduser');
        Route::get('/viewuser', [BankuserController::class, 'ShowUser'])->name('ShowUser');
        Route::post('/update-status/{id}', [BankuserController::class, 'updateStatus'])->name('UpdateStatus');
        Route::get('/edit/{id}', [BankuserController::class, 'edituser'])->name('EditUser');
        Route::post('/edit/{id}', [BankuserController::class, 'updateData']);
        Route::get('/view/user/{id}', [BankuserController::class, 'Editview'])->name('editview');
 
        Route::get('/delete/{id}', [BankuserController::class, 'delete'])->name('userdelete');
    // });

    // View Manager Routes
    Route::get('/branch-manager/view-manager', [ViewmanagerController::class, 'viewManager'])->name('viewbranchmanager');
    Route::get('/branch-manager/view-transaction', [ViewtransactionController::class, 'transaction'])->name('viewtransaction');

    // QR Code and Ticket Routes
    Route::get('/option/view/branch/data', [QRcodeController::class, 'branchOptions']);
    Route::get('/cus-form', function() {
        return view('BankApp.cus-form');
    });

    
    Route::post('/save-ticket', [TicketController::class, 'store'])->name('savedata');



     