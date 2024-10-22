<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_transaction_option extends Model
{
        protected $table='tbl_transaction_options';
        protected $fillable=[
        'transaction_option_name',

        ];

}
