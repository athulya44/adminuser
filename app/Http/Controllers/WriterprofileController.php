<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;
use App\models\writer;
use App\models\Writerprofile;

class WriterprofileController extends Controller
{
  public function index(){
    $writer_id =Auth::guard('writer')->user()->id;
    $writer = Writer::find($writer_id);
    return view('writer.index', compact('writer'));
  }
  public function edit(Request $request){
    $request->validate([
       'username'=>['required','string'],
       'email'=>['required','string'],
       'age'=>['required'],
       'qualification'=>['required','string'],
       'level'=>['required','string'],
       'phone'=>['required'],
       'pincode'=>['required'],
       
    
       'address'=>['required'],
    ]);
   
       $writer_id =Auth::guard('writer')->user()->id;
       $writer = Writer::find($writer_id);
       $writer->update([
          'name'=>$request->username
       ]);
        $writer->writerDetail()->updateOrCreate([
           'writer_id'=>$writer_id,
        ],
        [
          'age'=>$request->age,
          'qualification'=>$request->qualification,
          'level'=>$request->level,
          'phone'=>$request->phone,
          'pincode'=>$request->pincode,
          
          'address'=>$request->address,

        ]
        );  
        return redirect()->intended('/profilewriterview')->with('success','Profile updated successfully');
     }
public function  show(){
 $writer_id =Auth::guard('writer')->user()->id;
 $writer = Writer::find($writer_id);
 return view('writer.show',compact('writer'));
}
public function  profile(){
   $writer_id =Auth::guard('writer')->user()->id;
   $writer = Writer::find($writer_id);
   return view('writer.profile',compact('writer'));
  }
   }

