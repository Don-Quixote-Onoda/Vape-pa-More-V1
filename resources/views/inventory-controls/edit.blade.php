@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('admin-update-inventory_controls', ['id' => $inventory_control->id]) }}" method="post">
                @csrf
                <div class="col-md-12 mb-3">
                    <label for="quantity_stock">Quantiy Stock</label>
                    <input type="number" class="form-control @error('quantity_stock')  border-danger @enderror "
                        name="quantity_stock" id="quantity_stock" placeholder="Quantity stock" value="{{ $inventory_control->quantity_stock }}"
                        required>
                    @error('quantity_stock')
                        <div class="text-daborder-danger text-danger small mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label class="text-dark font-weight-medium">Product Name</label>
                    <div class="form-group">
                        <select class=" form-control" name="product_id" required>
                            <option value="">Select product name</option>
                            @if (count($products) > 0)
                                @foreach ($products as $product)
                                    <option value="{{$product->id}}" {{$inventory_control->product_id == $product->id ? 'selected' : ''}} >{{$product->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Update</button>
            </form>
        </div>
    </div>
@endsection
