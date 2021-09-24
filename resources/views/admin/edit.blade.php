@extends('layouts.master')
@section('title','create product')
@section('content')
    <h1 class="text-center text-muted" >Edit Product</h1>

    <br>
    <div class="container-fluid flex align-item-center justify-center">
        <form method="post" action="{{route('update')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$id}}">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Product Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="pname" value="{{$pname}}" placeholder="Product Name">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-4">
                    <input type="file" class="form-control-file" value="{{$pimage}}" name="pimage">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"  value="{{$ptype}}" name="ptype" placeholder="Product Type">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Model Number</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="{{$pmnumber}}" name="pmnumber" placeholder="Model Number">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Brand Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="{{$pbrand}}" name="pbrand" placeholder="Brand Name">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Cost</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="pcost" value="{{$pcost}}" placeholder="Product Cost">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control"  name="pdesc" value="{{$pdesc}}" placeholder="Product Description"></input>
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
