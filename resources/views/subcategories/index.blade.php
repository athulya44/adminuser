@extends('layouts.index')
@section('content')

<div class="col-lg-12 margin-tb">

<div class="pull-left">
    <h2>Categories Listing </h2>

<div class="pull-right">
    <a class="btn btn-success" href="{{ route('subcategories.create') }}"> Create</a>
</div>
</div>
</div>
<style>
table,th,td{
    background-color:white;

}
.pull-left{
    background-color:white;
    padding:20px;
}

    .pull-right{
        padding:20px;
    }
    .form-group{
        padding:20px;
    }
   table{
    padding:20px;
   }
   .card{
    padding:20px;
   }
</style>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<div class="card">
<table class="table table-bordered">
<tr>
<th>id</th>
<th>Name</th>
<th> Category Name</th>
<th>Description</th>
<th>Images</th>
<th width="280px">Action</th>
 
</tr>
@foreach($subcategories as $subcategory) 
<tr>
    <td>{{$subcategory->id}} </td>
    <td>{{$subcategory->name}}</td>
    <td>{{$subcategory->category_id}}</td>
    <td>{{ $subcategory->description }}</td>
    <td><img src="{{asset('image/').'/'.$subcategory->image}}" width="200">{{$subcategory->image}}</td>

 <td>
    <form action="{{ route('subcategories.destroy',$subcategory->id) }}" method="POST">

        <a class="btn btn-info" href="{{ route('subcategories.show',$subcategory->id) }}">Show</a>

        <a class="btn btn-primary" href="{{ route('subcategories.edit',$subcategory->id) }}">Edit</a>

        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</td>

</tr>

@endforeach
</table>
{!! $subcategories->links() !!}

@endsection