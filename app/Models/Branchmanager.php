<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Database\Eloquent\Model;

class Branchmanager extends Authenticatable  
{
    use HasFactory;

    protected $table = 'tbl_branchmanagers';  
    protected $primaryKey = 'ManagerId';  

  
    protected $fillable = [
        'firstName',
        'Email',
        'Password',
        'ContactNumber',
        'Address',
        'Age',
        'NTN',
        'Gender',
        'BankID',
        'BranchID',
        'BranchCode',
        'CityID',
        'HireDate',
        'Date_of_birth',
        'Salary',
        'Role',
        'Status'
    ];

    
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'BankID', 'BankID');
    }

    public function city()
    {
        
        return $this->belongsTo(City::class, 'CityID', 'CityID');
    }
}
