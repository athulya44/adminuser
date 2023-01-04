<?php
  
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Writer;
use Illuminate\Http\Request;
  
class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $writers =Writer::latest()->paginate(5);
    
        return view('writerss.index',compact('writers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('writerss.create');
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
    
       Writer::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
    ]);
     
        return redirect()->route('writers.index')
                        ->with('success','User created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Writer $writer)
    {
        return view('writerss.show',compact('writer'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Writer $writer)
    {
        return view('writerss.edit',compact('writer'));
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
             'email' => 'required',
             'password' => 'required',
         ]);
         $userData = $request->only(['name',"email","password"]);
         $userData['password'] = Hash::make($userData['password']);
        Writer::find($id)->update($userData);
         
         return redirect()->route('writers.index');
      }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Writer $writer)
    {
        $writer->delete();
    
        return redirect()->route('writers.index')
                        ->with('success','User deleted successfully');
    }

}