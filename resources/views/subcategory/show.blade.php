@extends('layouts.index')

@section('content')
<style>
    .card{
        padding:50px;
    }
    .form-group{
        padding:10px;
    }
    a{
        padding:10px;
    }
</style>
<div class="card">
    <div class="row">
      
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sub-categories.index') }}"> Back</a>
            </div>
        </div>
    </div> 
    
    <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
              {{$subCategory->name }} 
</div>
        </div>
        <br>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
      {{ $subCategory->description }}
            </div>
        </div>
   
     
     <br>
     <br>
 
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Parent Category:</strong>
                {{ $subCategory->category->name }}
            </div>
        </div>
     
</a>     
</div>
@endsection
