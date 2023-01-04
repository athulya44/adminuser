<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userdetail extends Model
{
    use HasFactory;
    
    protected $table='user_details';
    protected $fillable=[
        'admin_id',
        'phone',
        'pin_code',
        'address',
    ];
}
