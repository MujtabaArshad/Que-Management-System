<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;  // Use this instead of Model
use Illuminate\Notifications\Notifiable;
class tbl_reason_manager extends Authenticatable
{
    protected $table = 'tbl_reason_manager';  
    protected $primaryKey = 'id';  

  

    use Notifiable;

    protected $fillable = [
        'firstname',
        'email',
        'password',
        'contactnumber',
        'address',
        'age',
        'ntn',
        'gender',
        'bankid',
        'branchid',
        'cityid',
        'hiredata',
        'date_of_birth',
        'salary',
        'role',
         
    ];

    public function bank(){
    
    return $this->belongsTo(Bank::class, 'BankID', 'bankid');

}



public function city()
{
    
    return $this->belongsTo(City::class, 'CityID', 'cityid');
}
}



