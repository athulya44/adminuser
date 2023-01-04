<?php

    namespace App\Models;
    use App\models\Writer;
    use App\models\writerDetail;
    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Auth;

    class Writer extends Authenticatable
    {
        use Notifiable;

        protected $guard = 'writer';
        public function writerDetail(){

            return $this->hasOne(Writerprofile::class,'writer_id','id');
           
           
            }
        protected $fillable = [
            'name', 'email', 'password',
        ];
 

 
        protected $hidden = [
            'password', 'remember_token',
        ];
   
    }