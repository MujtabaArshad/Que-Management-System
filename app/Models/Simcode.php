<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simcode extends Model
{
    use HasFactory;

   
    protected $table = 'tbl_simcode';

    protected $primaryKey = "id";
}
