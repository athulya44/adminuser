@extends('layouts.profile')
@section('content')
<div class="PY-5">
    <div class="container">
<div class="row justify-content-center">
    <div class="col-md-10">
        <h4>  Admin Profile</h4>
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
    
        height:300px;
    }
  h4{
     padding:30px;
  }
</style>
<div class="card">
    <div class="card-header">
    <div class="row">
        <br>
        <br>
				<div class="col-md-9 col-xl-10">
                <strong>Username:</strong>
              {{ $admin->name}}
              <br>
              <br>
              <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>email:</strong>
              {{ $admin->email}}
        </div>
        <br>
        <br>
        
        <div class="form-group">
                <strong>phone:</strong>
               {{ $admin->userDetail->phone  ?? ''}}
        </div>
        <br><br>
        <div class="form-group">
                <strong>pin_code:</strong>
                {{ $admin->userDetail->pin_code  ?? ''}}
        </div>
        <br><br>
        <div class="form-group">
                <strong>address:</strong>
       {{$admin->userDetail->address  ?? ''}}
        </div>
      
   
</form>
@endsection