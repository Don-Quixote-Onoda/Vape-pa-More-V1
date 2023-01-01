@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8  mx-auto">
            <form action="{{ route('admin-update-products', ['id' => $product->id]) }}" method="post">
                @csrf
                <div class="col-md-12 mb-3">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control @error('name')  border-danger @enderror "
                        name="name" id="name" placeholder="Product name" value="{{ $product->name }}"
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
                            <option value="1" {{$product->type == 1 ? 'selected' : ''}}>Cig-A-Likes</option>
                            <option value="2" {{$product->type == 2 ? 'selected' : ''}}>Vape Pens</option>
                            <option value="3" {{$product->type == 3 ? 'selected' : ''}}>Mods</option>
                            <option value="4" {{$product->type == 4 ? 'selected' : ''}}>Pod Mods</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="price">Price</label>
                    <input type="text" class="form-control @error('price')  border-danger @enderror "
                        name="price" id="price" placeholder="Product price" value="{{ $product->price }}"
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
                            <option value="1" {{$product->status == 1 ? 'selected' : ''}}>Unavailable</option>
                            <option value="2" {{$product->status == 2 ? 'selected' : ''}}>Back Order</option>
                            <option value="3" {{$product->status == 3 ? 'selected' : ''}}>Hide</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
