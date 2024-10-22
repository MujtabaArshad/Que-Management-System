<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessMenu extends Model
{
    use HasFactory;
    protected $table = "access_roles";
    protected $fillable = ['name', 'route', 'icon'];

    public function roles()
    {
        return $this->belongsToMany(access_roles::class, 'access_menus', 'menu_id', 'role_id');
    }
}
