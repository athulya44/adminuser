<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\Writer;



class Writerprofile extends Model
{
    protected $table='writerprofiles';
    protected $fillable=[
        'writer_id',
        'age',
        'qualification',
        'level',
        'phone',
        'pincode',
      
        'address'
    ];
}
