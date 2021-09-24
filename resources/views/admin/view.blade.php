@extends('layouts.master')
@section('title','create product')
@section('content')
<h1 class="text-center text-muted" >Product Listing</h1>

<br>
<br>
<div class="container">

    <table class="table table-hover">
        <thead>
        <tr>
            <th>ProductID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Type</th>
            <th>Model#</th>
            <th>Cost</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>

        @foreach($data as $prod)
            <tr>
                <td>{{$prod->ProductID}}</td>
                <td>{{$prod->ProductImg}}</td>
                <td>{{$prod->ProductType}}</td>
                <td>{{$prod->ProductMNum}}</td>
                <td>{{$prod->ProductBrand}}</td>
                <td>{{$prod->ProductNm}}</td>
                <td>{{$prod->ProductCst}}</td>
                <td>{{$prod->ProductDesc}}</td>
                <td><a href="{{url('/edit/'.$prod->ProductID)}}">edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
