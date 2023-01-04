@extends('layouts.index')
 
@section('content')

    <div class="row">
    <div class="card">
        <div class="card-header">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Logged in Writer Users listing</h2>
            </div><div class="card-header">
           
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card-body">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            
            <th width="350px">Action</th>
        </tr>
        @foreach ($writers as $writer)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{$writer->name }}</td>
            <td>{{$writer->email }}</td>
  
            <td>
                <form action="{{ route('writers.destroy',$writer->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('writers.show',$writer->id) }}">Show</a>
    
                   
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $writers->links() !!}
      
@endsection