<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\FrontendController;


class Frontend extends Model
{
    use HasFactory;
    protected $table="frontends";
    protected  $fillable=[
        'name',
        'age',
        'email',
        'password'
    ];
 
}
