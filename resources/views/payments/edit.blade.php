@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <form action="{{ route('admin-update-payments', ['id' => $payment->id]) }}" method="post">
                @csrf
                <div class="col-md-12 mb-3">
                    <label for="name">Payment Name</label>
                    <input type="text" class="form-control @error('name')  border-danger @enderror "
                        name="name" id="name" placeholder="Product name" value="{{ $payment->name }}"
                        required>
                    @error('name')
                        <div class="text-daborder-danger text-danger small mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="price">Quantity</label>
                    <input type="number" class="form-control @error('price')  border-danger @enderror "
                        name="quantity" id="quantity" placeholder="Product quantity" value="{{ $payment->quantity }}"
                        required>
                    @error('quantity')
                        <div class="text-daborder-danger text-danger small mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary ml-3">Update</button>
            </form>
        </div>
    </div>
@endsection
