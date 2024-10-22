<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model implements AuthenticatableContract
{
    use Authenticatable; // Add this trait for authentication

    protected $table = 'tbl_banks';
    protected $primaryKey = 'BankId';

    protected $fillable = [
        'Bankname',
        'email',
        'Bankcontact',
        'No_of_Employee',
        'NTN',
        'BankAddress',
        'Password',
        'Branches',
    ];

    // Relationship with branches
    public function branches()
    {
        return $this->hasMany(Branch::class, 'BankID', 'BankId');
    }
}
