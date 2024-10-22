<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable; // Import the Authenticatable class
use Illuminate\Notifications\Notifiable; // Optional for notifications

class UserBank extends Authenticatable // Extend the Authenticatable class
{
    use HasFactory, Notifiable; // Add Notifiable if you plan to use notifications

    protected $table = "user_banks";

    protected $fillable = [
        'FirstName',
        'LastName',
        'Email',
        'ContactNumber',
        'Address',
        'Age',
        'NTN',
        'Password',
        'Gender', 
        'RoleID', 
        'Status',
        'Role'
    ];

    // You may also want to define any additional methods needed
}


// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class UserBank extends Model
// {
//     use HasFactory;
// protected $table="user_banks";

    
// protected $fillable = [
//     'FirstName',
//     'LastName',
//     'Email',
//     'Address',
//     'Age',
//     'NTN',
//     'Password',
//     'Gender', 
//      'RoleID', 
//     'Status'

// ];
// }
