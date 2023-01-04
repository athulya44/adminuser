@extends('layouts.index')
@section('content')

<div class="col-lg-12 margin-tb">

<div class="pull-left">
    <h2>Categories Listing </h2>

<div class="pull-right">
    <a class="btn btn-success" href="{{ route('categories.create') }}"> Create</a>
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
   .sclist{
    list-style:none;
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
<th>Description</th>
<th>Images</th>

<th width="280px">Action</th>
 
</tr>
@foreach ($categories as $category)
<tr>
<td>{{ ++$i }}</td>
<td>{{ $category->name }}</td>
<td>{{ $category->description }}</td>

<td><img src="{{asset('image/').'/'.$category->image}}" width="200">{{$category->image}}</td>

 <td>
    <form action="{{ route('categories.destroy',$category->id) }}" method="POST">

        <a class="btn btn-info" href="{{ route('categories.show',$category->id) }}">Show</a>

        <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Edit</a>

        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</td>

</tr>

@endforeach
</table>
{!! $categories->links() !!}

@endsection