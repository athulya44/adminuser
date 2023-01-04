@extends('layouts.index')
@section('content')

<div class="col-lg-12 margin-tb">

<div class="pull-left">
    <h2>Subcategories Listing </h2>

<div class="pull-right">
    <a class="btn btn-success" href="{{ route('sub-categories.create') }}"> Create</a>
</div>
</div>
</div>
<p class="alert-success">


</p>
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
<th>Id</th>
<th>SubCategoryName</th>
<th>Parent category</th>
<th>Description</th>


<th width="280px">Action</th>
 
</tr>
@foreach ($subcategories as $subcategory)
<tr>
<td>{{ ++$i }}</td>
<td>{{ $subcategory->name }}</td>
<td>{{ $subcategory->category->name }}</td>
<td>{{ $subcategory->description }}</td>



<td>
    <form action="{{ route('sub-categories.destroy',$subcategory->id) }}" method="POST">

        <a class="btn btn-info" href="{{ route('sub-categories.show',$subcategory->id) }}">Show</a>

        <a class="btn btn-primary" href="{{ route('sub-categories.edit',$subcategory->id) }}">Edit</a>

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