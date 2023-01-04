@extends('layouts.writer')
@section('content')
<div class="PY-5">
    <div class="container">
<div class="row justify-content-center">
    <div class="col-md-10">
        <h4> Writer profile </h4>
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
        <form action="{{url('profilewriterview') }}" method="POST">
    @csrf
    <style>
    .card-header{
        width:900px;
        height:800px;
        font-size:15px;
    }
    .form-group{
        width:860px;
        font-size:15px;
    }
    .card-body{
       width:800px;
        height:1000px;
       font-size:15px;
    }
    .form-group{
        width:800px;
        height:100px;
        font-size:15px;
    }
    h4{
        font-size:30px;
    }
  </style>
    <div class="card">
						<div class="col-md-9 col-xl-9">
					
								<div class="card-header">
                <strong>Username:</strong>          
               {{$writer->name}}
               <br><br>
               <br><br>
              <div class="col-xs-9 col-sm-12 col-md-9">
            <div class="form-group">
                <strong >Email:</strong>
               {{ $writer->email}}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-9">
            <div class="form-group">
                <strong>Age:</strong>
             {{ $writer->writerDetail->age ?? ''}}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-9">
            <div class="form-group">
                <strong>Qualification:</strong>
              {{$writer->writerDetail->qualification ?? ''}}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Level:</strong>
                {{ $writer->writerDetail->level ?? ''}}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone:</strong>
               {{$writer->writerDetail->phone ?? ''}}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pincode:</strong>
               {{$writer->writerDetail->pincode ?? ''}}
        </div>
   
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
               {{$writer->writerDetail->address ?? ''}}
        </div>
        
    </div>
   
</form>
@endsection