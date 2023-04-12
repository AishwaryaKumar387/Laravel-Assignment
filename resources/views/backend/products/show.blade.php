@extends('layouts.custom')
<style>
img.cpp {
    width: auto;
    height: 225px;
}
</style>
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Product Detail</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Products</a></li>
                <li class="breadcrumb-item active">View Product</li>
            </ol>
            @if (\Session::has('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {!! \Session::get('success') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @elseif (\Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {!! \Session::get('error') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    View Product
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                        <div class="col-sm-10">
                            <span class="form-control">{{$product->name}}</span>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="category">Category:</label>
                        <div class="col-sm-10">
                            <span class="form-control">{{$product->category}}</span>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="sku">SKU:</label>
                        <div class="col-sm-10">
                            <span class="form-control">{{$product->sku}}</span>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="price">Price:</label>
                        <div class="col-sm-10">
                            <span class="form-control">{{$product->price}}</span>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="quantity">Quantity:</label>
                        <div class="col-sm-10">
                            <span class="form-control">{{$product->quantity}}</span>
                        </div>
                    </div><br>
                </div>
            </div>
        </div>
    </main>
@endsection