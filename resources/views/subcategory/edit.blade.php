<!DOCTYPE HTML>
<html>
<head>

</head>
<body>
@extends('layouts.index')

@section('content')
<style>
    
    .row{
        padding:20px;
    }
    .form-group{
        padding:10px;
    }
    .form-control{
        padding:10px;   
    }
    .control-label{
        padding:10px;   
    }
    
</style>
<div class="card">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit subcategory</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sub-categories.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('sub-categories.update',$subCategory->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    @error('name')
                    {{$message}}
                    @enderror
                    <input type="text" name="name" value="{{ $subCategory->name }}" class="form-control" placeholder="name">
                </div>
            </div>
            <br><br>
            <br>
            
           <br><br>
           <div class="control-group">
    <label class="control-label">Parent Category</label>
    <div class="control">
        <select name="category" style="margin-left:20 px;">
    <option value="{{$subCategory->id}}">{{$subCategory->category->name}}</option>
    @foreach($categories as $category)

    <option value="{{$category->id}}">{{$category->name}}</option>

 @endforeach
</select>
</div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    @error('description')
                    {{$message}}
                    @enderror
                    <input type="text" name="description" value="{{$subCategory->description }}" class="form-control" placeholder="description">
                </div>
            </div>
           <br><br>
           

             </select>
               </div>
            </div>
              
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
