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
            <h1 class="mt-4">Products</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Products</a></li>
                <li class="breadcrumb-item active">Add Product</li>
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
                    Add Product
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{ old('name') }}" autocomplete="off">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="category">Category:</label>
                            <div class="col-sm-10">
                                <input type="text" name="category" class="form-control" id="category" placeholder="Enter category" value="{{ old('category') }}" autocomplete="off">
                                <span class="text-danger">{{ $errors->first('category') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="sku">SKU:</label>
                            <div class="col-sm-10">
                                <input type="text" name="sku" class="form-control" id="sku" placeholder="Enter SKU" value="{{ old('sku') }}" autocomplete="off">
                                <span class="text-danger">{{ $errors->first('sku') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="price">Price:</label>
                            <div class="col-sm-10">
                                <input type="text" name="price" class="form-control" id="price" placeholder="Enter price" value="{{ old('price') }}" autocomplete="off">
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="quantity">Quantity:</label>
                            <div class="col-sm-10">
                                <input type="text" name="quantity" class="form-control" id="quantity" placeholder="Enter quantity" value="{{ old('quantity') }}" autocomplete="off">
                                <span class="text-danger">{{ $errors->first('quantity') }}</span>
                            </div>
                        </div>
                        <div class="clearfix"></div><br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('custom-script')
    <script>
    //on focus input
    $(document).on("change", "input", function (){
        $(this).parent().find("span").remove();
        $(document).find('.alert').remove();
    }); 
    $(document).on("focus", "input", function (){
        $(this).parent().find("span").remove();
        $(document).find('.alert').remove();
    }); 
    $(document).on("focus", "textarea", function (){
        $(this).parent().find("span").remove();
        $(document).find('.alert').remove();
    }); 
    $(document).on("change", "select", function (){
        $(this).parent().find("span").remove();
        $(document).find('.alert').remove();
    }); 
    $(document).on("focus", "select", function (){
        $(this).parent().find("span").remove();
        $(document).find('.alert').remove();
    }); 
    </script>
@endpush
