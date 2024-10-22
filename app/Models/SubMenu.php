<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    protected $table = 'sub_menu';   
    protected $fillable = ['name', 'route', 'main_menu_id'];

     
    public function mainMenu()
    {
        return $this->belongsTo(MainMenu::class, 'main_menu');
    }
}