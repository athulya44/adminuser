@extends('layouts.profile')
@section('content')
<div class="PY-5">
    <div class="container">
<div class="row justify-content-center">
    <div class="col-md-10">
        <h4> Edit Admin profile</h4>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
            @if ($errors->any())
    <div class="alert alert-danger">
        There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{url('profile') }}" method="POST">
    @csrf
  <style>
    .card{
        width:700px;
        height:40px;
    }
  </style>
    <div class="row">
        <br>
        <br>
        <br>
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
                <strong>Username:</strong>
                <input type="text" name="username"  value="{{ $admin->name}}"class="form-control" placeholder="Name">
              <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br>
        <br>
                <strong>email:</strong>
                <input type="text" name="email"  value="{{ $admin->email}}"class="form-control" placeholder="email">
        </div>
        <br>
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        
        <br>

                <strong>phone:</strong>
                <input type="text" name="phone"  width="500px" height="300px" value="{{ $admin->userDetail->phone  ?? ''}}"class="form-control" placeholder="phone">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
<br><br>
        <div class="form-group">
                <strong>pincode:</strong>
                <input type="text" name="pin_code"  value="{{ $admin->userDetail->pin_code  ?? ''}}"class="form-control" placeholder="pincode">
        </div>
        <br>
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <strong>address:</strong>
                <input type="text" name="address"  value="{{$admin->userDetail->address  ?? ''}}"class="form-control" placeholder="address">
        </div>
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection