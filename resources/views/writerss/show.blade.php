@extends('layouts.index')
  
@section('content')
<style>
    .pull-left{
        padding: 20px;
    }
    .pull-right{
        padding: 20px;
    }
    .card{
        padding:30px;
    }
    .form-group{
        padding:20px;
    }
</style>
<div class="card">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('writers.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $writer->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $writer->email }}
            </div>
        
    </div>
@endsection