<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Models\Admin;
use App\Models\Userdetails;

class UserController extends Controller
{
   

            
                public function index()
            {
                $admin_id =Auth::guard('admin')->user()->id;
                $admin = Admin::find($admin_id);
                return view('profile.index', compact('admin'));
            }
            
          public function updateUserDetails(Request $request){
         $request->validate([
            'username'=>['required','string'],
            'phone'=>['required','digits:10'],
            'pin_code'=>['required','digits:6'],
            'address'=>['required','string','max:500'],
         ]);
        

            
            
            $admin_id =Auth::guard('admin')->user()->id;
            $admin = Admin::find($admin_id);
            $admin->update([
               'name'=>$request->username
            ]);
             $admin->userDetail()->updateOrCreate([
                'admin_id'=>$admin_id,
             ],
             [
               'phone'=>$request->phone,
               'pin_code'=>$request->pin_code,
               'address'=>$request->address,
             ]
             ) ;  
             return redirect()->intended('/profile');
          }
   public function  view(){
      $admin_id =Auth::guard('admin')->user()->id;
      $admin = Admin::find($admin_id);
      return view('profile.view',compact('admin'));
   }
        }