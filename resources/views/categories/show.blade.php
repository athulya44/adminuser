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
                <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
            </div>
        </div>
    </div> 
    
    <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
              {{$category->name }} 
</div>
        </div>
        <br>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
      {{ $category->description }}
            </div>
        </div>
   
     
     <br>
     <br>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>images</strong>

                <img src="{{asset('image/').'/'.$category->image}}" width="200">
                <br><br><br>
             
                </div>  <div class="col-6">
         
                    <a class="btn btn-primary" href="{{ URL::to( 'categories/' . $previousrecord->id ) }}">
                        <div> Previous category</div>
       

</a>

        
                    <a class="btn btn-primary" href="{{ URL::to( 'categories/' . $previousrecord->id ) }}">
                        <div>Next category</div>
             
            
</a>     
</div>
@endsection