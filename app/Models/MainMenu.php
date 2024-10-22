<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainMenu extends Model
{
    // Corrected property name from 'ptable' to 'table'
    protected $table = 'main_menu';  // Make sure the table name matches the database table

    protected $fillable = ['name', 'route', 'icon'];

    // Relationship with SubMenu model
    public function subMenus()
    {
        return $this->hasMany(SubMenu::class, 'main_menu_id');
    }
}
