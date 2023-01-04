<!DOCTYPE HTML>
<html>
<head>
<style>
.row{
    padding: 20px;
}
</style>
</head>
<body>
@extends('layouts.index')

@section('content')
<div class="card">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add new  subcategory</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('subcategories.index') }}"> Back</a>
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

<form action="{{ route('subcategories.store') }}" enctype="multipart/form-data" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> Subcategory Name:</strong>
                    @error('name')
                    {{$message}}
                    @enderror
                <input type="text" name="name" class="form-control"  placeholder="name">
            </div>
        </div>

       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Subcategory Description:</strong>
                @error('description')
                {{$message}}
                @enderror
                <input type="text" name="description" class="form-control" placeholder="description">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Subcategory Image:</strong>
                @error('image')
                {{$message}}
                @enderror
                <input type="file" name="image"  class="form-control" placeholder="image">
            </div>
        </div>
       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Select parent category:</strong>
               
            <div class="control">
                <select name="category" style="margin-left :20px;" >
                <option>Select categories</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
               @endforeach
                </select>
            </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
</body>
</html>