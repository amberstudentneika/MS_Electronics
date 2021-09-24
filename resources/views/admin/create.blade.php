@extends('layouts.master')
@section('title','create product')
@section('content')
<h1 class="text-center text-muted" >Create Product</h1>

<br>
<div class="container-fluid flex align-item-center justify-center">
<form method="post" action="{{route('create')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Product Name</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="pname" placeholder="Product Name">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-4">
            <input type="file" class="form-control-file" name="pimage">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Type</label>
        <div class="col-sm-4">
            <input type="text" class="form-control"  name="ptype" placeholder="Product Type">
        </div>
    </div>

   <div class="form-group row">
        <label class="col-sm-2 col-form-label">Model Number</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="pmnumber" placeholder="Model Number">
        </div>
    </div>

   <div class="form-group row">
        <label class="col-sm-2 col-form-label">Brand Name</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="pbrand" placeholder="Brand Name">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Cost</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="pcost" placeholder="Product Cost">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-4">
            <textarea class="form-control" rows="5" name="pdesc" placeholder="Product Description"></textarea>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Submit form</button>
    <button type="button" class="btn btn-danger" onclick="window.location.href='{{url('/index')}}';">Cancel</button>

        @foreach ($errors->all() as $error)
        <div class="alert alert-warning"> <strong>Warning!</strong> {{ $error }}    </div>
        @endforeach

        <?php $ses = session()->get('msg') ?>
        @if($ses!='')
            <div class="alert alert-warning"><strong>Warning!</strong> {{ session()->get('msg') }} </div>
             {{session()->forget('msg')}}
        @endif
</form>
</div>
@endsection
