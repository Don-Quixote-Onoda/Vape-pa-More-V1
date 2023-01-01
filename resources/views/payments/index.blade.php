@extends('layouts.app')
@section('content')

    <!-- Form Modal -->
    <button type="button" class="btn btn-info btn-pill" data-toggle="modal" data-target="#paymentModal">
        Add Payment
    </button>

    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="productModalTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Add New Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin-store-payments') }}" method="post">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <label for="name">Payment Name</label>
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
                            <label for="price">Quantity</label>
                            <input type="number" class="form-control @error('price')  border-danger @enderror "
                                name="quantity" id="quantity" placeholder="Product quantity" value="{{ old('quantity') }}"
                                required>
                            @error('quantity')
                                <div class="text-daborder-danger text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary ml-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table id="paymentsTable" class="table table-hover table-payment" style="width:100%">
        <thead>
            <tr>
                <th>Payment Name</th>
                <th>Quantity</th>
                <th style="border-bottom: none">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if (count($payments) > 0)
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->name }}</td>
                        <td>{{ $payment->quantity }}</td>
                        <td>
                            <a href="{{route('admin-edit-payments', ['id' => $payment->id])}}">
                                <i class="mdi mdi-pencil text-success"></i>
                            </a>
                            <form action="{{route('admin-delete-payments', $payment->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method("DELETE")
                                <button type="submit"><i class="mdi mdi-delete text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <h2>No payments available.</h2>
            @endif
        </tbody>
    </table>
@endsection
