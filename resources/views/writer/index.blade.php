@extends('layouts.writer')
@section('content')

<div class="PY-5">
    <div class="container">
<div class="row justify-content-center">
    <div class="col-md-10">
        <h4> Edit Writer Profile</h4>
       
            @if ($errors->any())
    <div class="alert alert-danger">
        There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
   
        <form action="{{url('profilewriter') }}" method="POST">
    @csrf
    <style>
    .card-header{
        width:900px;
        height:1000px;
    }
    .form-group{
        width:860px;
       
    }
    .card-body{
       width:800px;
        height:1000px;
       
    }
    .form-group{
        width:800px;
        height:100px;
    }
    h4{
        font-size:30px;
      
    }
  </style>
    <div class="row">
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
                            
								<div class="card-header">
                                <div class="form-group">
                <strong>Username:</strong>
                <input type="text" name="username"  value="{{$writer->name}}"class="form-control" placeholder="Name">
                <br>
                <br>
              <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email"  value="{{ $writer->email}}"class="form-control" placeholder="email">
        </div>
        <div class="form-group">
                <strong>Password:</strong>
                <input type="text" name="email"  value="{{ $writer->password}}"class="form-control" placeholder="email">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Age:</strong>
                <input type="text" name="age"  value="{{ $writer->writerDetail->age ?? ''}}"class="form-control" placeholder="age">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Qualification:</strong>
                <input type="text" name="qualification"  value="{{$writer->writerDetail->qualification ?? ''}}"class="form-control" placeholder="qualification">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Level:</strong>
                <input type="text" name="level"  value="{{ $writer->writerDetail->level ?? ''}}"class="form-control" placeholder="level">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone:</strong>
                <input type="text" name="phone"  value="{{$writer->writerDetail->phone ?? ''}}"class="form-control" placeholder="phone">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pincode:</strong>
                <input type="text" name="pincode"  value="{{$writer->writerDetail->pincode ?? ''}}"class="form-control" placeholder="pincode">
        </div>
       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                <input type="text" name="address"  value="{{$writer->writerDetail->address ?? ''}}"class="form-control" placeholder="address">
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">update</button>
        </div>
    </div>
   
</form>
@endsection