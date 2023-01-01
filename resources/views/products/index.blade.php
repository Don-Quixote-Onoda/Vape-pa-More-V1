@extends('layouts.app')
@section('content')

    <!-- Form Modal -->
    <button type="button" class="btn btn-info btn-pill" data-toggle="modal" data-target="#productModal">
        Add Product
    </button>

    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Add New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin-store-products') }}" method="post">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control @error('name')  border-danger @enderror "
                                name="name" id="name" placeholder="Product name" value="{{ old('name') }}"
                                required>
                            @error('name')
                                <div class="text-daborder-danger text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="text-dark font-weight-medium">Product Type</label>
                            <div class="form-group">
                                <select class=" form-control" name="type" required>
                                    <option value="">Select product type</option>
                                    <option value="1" {{old('type') == 1 ? 'selected' : ''}}>Cig-A-Likes</option>
                                    <option value="2" {{old('type') == 2 ? 'selected' : ''}}>Vape Pens</option>
                                    <option value="3" {{old('type') == 3 ? 'selected' : ''}}>Mods</option>
                                    <option value="4" {{old('type') == 4 ? 'selected' : ''}}>Pod Mods</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="price">Price</label>
                            <input type="text" class="form-control @error('price')  border-danger @enderror "
                                name="price" id="price" placeholder="Product price" value="{{ old('price') }}"
                                required>
                            @error('price')
                                <div class="text-daborder-danger text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="text-dark font-weight-medium">Status</label>
                            <div class="form-group">
                                <select class=" form-control" name="status" required>
                                    <option value="">Select product status</option>
                                    <option value="1" {{old('type') == 1 ? 'selected' : ''}}>Unavailable</option>
                                    <option value="2" {{old('type') == 2 ? 'selected' : ''}}>Back Order</option>
                                    <option value="3" {{old('type') == 3 ? 'selected' : ''}}>Hide</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary ml-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table id="productsTable" class="table table-hover table-product" style="width:100%">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Product Type</th>
                <th>Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if (count($products) > 0)
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->type }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->status }}</td>
                        <td>
                            <a href="{{route('admin-edit-products', ['id' => $product->id])}}">
                                <i class="mdi mdi-pencil text-success"></i>
                            </a>
                            <form action="{{route('admin-destroy-products', $product->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method("DELETE")
                                <button type="submit"><i class="mdi mdi-delete text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <h2>No products available.</h2>
            @endif
        </tbody>
    </table>
@endsection
