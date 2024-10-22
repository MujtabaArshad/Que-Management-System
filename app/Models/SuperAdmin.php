<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class SuperAdmin extends Authenticatable
{
protected $table = "tbl_superadmin";

protected $fillable = [
'name',
'email',
'password'
];

 
public function setPasswordAttribute($password)
{
    $this->attributes['password'] = bcrypt($password);
}
}

?>