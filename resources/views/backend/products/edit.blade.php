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
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
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
                    Edit Product :: {{ $product->name }}
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Name:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ isset($product) ? $product->name : old('name') }}">
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="category">Category:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="category" name="category"
                                    value="{{ isset($product) ? $product->category : old('category') }}">
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="sku">SKU:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sku" name="sku"
                                    value="{{ isset($product) ? $product->sku : old('sku') }}">
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="price">Price:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="price" name="price"
                                    value="{{ isset($product) ? $product->price : old('price') }}">
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="price">Quantity:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="quantity" name="quantity"
                                    value="{{ isset($product) ? $product->quantity : old('quantity') }}">
                            </div>
                        </div><br>
                        <div class="clearfix"></div><br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
