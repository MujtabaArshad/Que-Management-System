<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_transaction_option_details extends Model
{
    use HasFactory;

    protected $table = 'tbl_transaction_option_details';
    protected $fillable = [
        'customer_name', 
        'customer_phone',
        'transaction_option_id_FK', 
       
        'transaction_name', 
        'ticket_number'
    ];

    public function transactionOption()
    {
        return $this->belongsTo(tbl_transaction_option::class, 'transaction_option_id_FK' );

    }
}
