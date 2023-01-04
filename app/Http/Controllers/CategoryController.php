<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Http\Controllers\CategoryController;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
      
   
    $categories=Category::latest()->paginate(5);
    return view('categories.index',compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }





    //create new input//


    public function create(){
        return view('categories.create');
    }

    //store new input
    //

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            
        
            
        ]);
        $input = $request->all( );

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
       Category::create($input);

        return redirect()->route('categories.index')
                        ->with('success','New product Added Successfully.');
    }

    
public function show(Category $category)

{
    $previousrecord = Category::where('id', '<', $category->id)->orderBy('id','desc')->first();
 
    $next =Category::where('id', '>', $category->id)->min('id');
 return view('categories.show',compact('category','previousrecord'))->with('next', $next);
}
        
public function edit($id){
    $category=category::find($id);
    return view('categories.edit',compact('category'));
}

public  function update(Request $request,Category $category){
    $request->validate([
        'name' => 'required',
        'description' => 'required',
    ]);

    $input['name'] = $request->name;
    $input['description'] = $request->description;
    

    if ($image = $request->file('image')) {
        $destinationPath = 'image/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $input['image'] = $profileImage;
    }else{
       // unset($input['image']);
    }

    $category->update($input);

    return redirect()->route('categories.index')
                    ->with('success',' updated successfully');
}
public function destroy(Category $category)

    {
    
        $category->delete();
    
        return redirect()->route('categories.index')
                        ->with('success','User deleted successfully');
    }

}
