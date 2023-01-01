@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('admin-update-order_details', ['id' => $order_detail->id]) }}" method="post">
                @csrf
                <div class="col-md-12 mb-3">
                    <label for="quantity_order">Quantiy Order</label>
                    <input type="number" class="form-control @error('quantity_order')  border-danger @enderror "
                        name="quantity_order" id="quantity_order" placeholder="Quantity stock" value="{{ $order_detail->quantity_order }}"
                        required>
                    @error('quantity_order')
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
                                    <option value="{{$product->id}}" {{$order_detail->product_id == $product->id ? 'selected' : ''}} >{{$product->name}}</option>
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
