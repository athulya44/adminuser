<?php
  
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Frontend;
use Illuminate\Http\Request;
  use Illuminate\Validation\Validator\validate;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frontends = Frontend::latest()->paginate(5);
    
        return view('frontend.index',compact('frontends'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
    
      Frontend::create([
        'name' => $request['name'],
        'age' => $request['age'],
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
    ]);
    
     
        return redirect()->route('frontends.index')
                        ->with('success','User created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Frontend $frontend)
    {
        return view('frontend.show',compact('frontend'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Frontend $frontend)
    {
        return view('frontend.edit',compact('frontend'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
       //validate post data
       
         //validate post data
         $this->validate($request, [
            'name' => 'required',
            'age' => 'required',
             'email' => 'required',
             'password' => 'required',
         ]);
         $userData = $request->only(["email","password"]);
         $userData['password'] = Hash::make($userData['password']);
         Frontend::find($id)->update($userData);
         
         return redirect()->route('frontends.index');
      }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frontend $frontend)
    {
        $frontend->delete();
    
        return redirect()->route('frontends.index')
                        ->with('success','User deleted successfully');
    }
}