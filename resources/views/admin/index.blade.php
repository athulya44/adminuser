@extends('layouts.index')
 
@section('content')
<div class="card">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Backend Admin Users listing</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admins.create') }}"> Create New user</a>
            </div>
        </div>
    </div>
  <style>
    .pull-right{
        padding:20px;
    }
    h2{
        padding:20px;
    }
  </style>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card-body">
    <table class="table table-bordered" >
        <tr>
            <th >No</th>
            <th>Name</th>
            <th>Email</th>
            
            <th width="280px">Action</th>
        </tr>
        @foreach ($admins as $admin)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{$admin->name }}</td>
            <td>{{ $admin->email }}</td>
          
            <td>
                <form action="{{ route('admins.destroy',$admin->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('admins.show',$admin->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('admins.edit',$admin->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    
      
@endsection