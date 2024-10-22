<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'tbl_branches';

    protected $primaryKey = 'BranchID';
    

    public function bank()
{
    return $this->belongsTo(Bank::class, 'BankID', 'BankId');
}

public function city()
{
    return $this->belongsTo(City::class, 'CityID', 'id');
}


    protected $fillable = [
        'BranchID',
        'BranchCode',
        'BranchName',
        'Address Line',
        
        'BankID',
        'CityID',
       
        
        
    ];
}
