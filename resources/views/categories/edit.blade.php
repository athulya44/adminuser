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
</style>
<div class="card">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit category</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
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

    <form action="{{ route('categories.update',$category->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    @error('name')
                    {{$message}}
                    @enderror
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="name">
                </div>
            </div>
            <br><br>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    @error('description')
                    {{$message}}
                    @enderror
                    <input type="text" name="description" value="{{$category->description }}" class="form-control" placeholder="description">
                </div>
            </div>
           <br><br>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                        <strong>Images:</strong>
                       
                        <input type="file" name="images" class="form-control" placeholder="images">
                        <img src="/image/{{ $category->image }}" width="300px">
                    </div>
                </div>
              
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
