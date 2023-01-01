@extends('layouts.app')
@section('content')

    <!-- Form Modal -->
    <button type="button" class="btn btn-info btn-pill" data-toggle="modal" data-target="#orderModal">
        Add Order
    </button>

    <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="inventoryControlModalTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Add New Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin-store-orders') }}" method="post">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <label class="text-dark font-weight-medium">Customer Name</label>
                            <div class="form-group">
                                <select class=" form-control" name="customer_id" required>
                                    <option value="">Select customer name</option>
                                    @if (count($customers) > 0)
                                        @foreach ($customers as $customer)
                                            <option value="{{$customer->id}}" {{old('customer_id') == $customer->id ? 'selected' : ''}} >{{$customer->firstname}} {{$customer->lastname}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="text-dark font-weight-medium">Payment Name</label>
                            <div class="form-group">
                                <select class=" form-control" name="payment_id" required>
                                    <option value="">Select payment name</option>
                                    @if (count($payments) > 0)
                                        @foreach ($payments as $payment)
                                            <option value="{{$payment->id}}" {{old('payment_id') == $payment->id ? 'selected' : ''}} >{{$payment->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary ml-3">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table id="ordersTable" class="table table-hover table-order" style="width:100%">
        <thead>
            <tr>
                <th>User Name</th>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th style="border-bottom: none">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if (count($orders) > 0)
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->user_id }}</td>
                        <td>{{ $order->customer_id }}</td>
                        <td>{{ $order->payment }}</td>
                        <td>
                            <a href="{{route('admin-edit-order', ['id' => $order->id])}}">
                                <i class="mdi mdi-pencil text-success"></i>
                            </a>
                            <form action="{{route('admin-delete-order', $order->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method("DELETE")
                                <button type="submit"><i class="mdi mdi-delete text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <h2>No inventory controls available.</h2>
            @endif
        </tbody>
    </table>
@endsection
