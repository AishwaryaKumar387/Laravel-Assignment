@extends('layouts.custom')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Products</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Products</li>
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
            <div>
                <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
            </div><br>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Product
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>SKU</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Deleted At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>SKU</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Deleted At</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if (count($products))
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td>{{ '$' . $product->price }} </td>
                                        <td>{{ $product->quantity }} </td>
                                        <td>
                                            <input type="checkbox" value="{{ $product->status }}"
                                                data-href="{{ route('products.change_status') }}"
                                                data-id="{{ $product->id }}" class="status_checkbox"
                                                @if ($product->status == 1) checked @endif data-title="Product" />
                                        </td>
                                        <td> {{ date('jS F Y', strtotime($product->created_at)) }}</td>
                                        <td>
                                            @if (!empty($product->deleted_at))
                                                {{ date('jS F Y', strtotime($product->deleted_at)) }}@else{{ 'Existing' }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('products.show', $product->id) }}" title="View"><i
                                                    class="fas fa-eye" aria-hidden="true"></i></a>&nbsp;
                                            <a href="{{ route('products.edit', $product->id) }}" title="Edit"><i
                                                    class="fas fa-edit" aria-hidden="true"></i></a>&nbsp;

                                            <a class="trash_data @if (!empty($product->deleted_at)) {{ 'd-none' }} @endif"
                                                data-title="Product" href="{{ route('products.destroy', $product->id) }}" title="Delete"><i
                                                    class="fa fa-trash" aria-hidden="true"></i></a>

                                            <a class="restore_data @if (empty($product->deleted_at)) {{ 'd-none' }} @endif"
                                                data-title="Product" href="{{ route('products.restore', $product->id) }}" title="Restore"><i
                                                    class="fa fa-retweet" aria-hidden="true"></i> </a>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
