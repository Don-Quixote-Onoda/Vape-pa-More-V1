@extends('layouts.app')
@section('content')

    <!-- Form Modal -->
    <button type="button" class="btn btn-info btn-pill" data-toggle="modal" data-target="#orderDetailsModal">
        Add Order Details
    </button>

    <div class="modal fade" id="orderDetailsModal" tabindex="-1" role="dialog" aria-labelledby="orderDetailsModalTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Add New Order Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin-store-order_details') }}" method="post">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <label for="quantity_order">Quantiy Order</label>
                            <input type="number" class="form-control @error('quantity_order')  border-danger @enderror "
                                name="quantity_order" id="quantity_order" placeholder="Quantity order" value="{{ old('quantity_order') }}"
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
                                            <option value="{{$product->id}}" {{old('product_id') == $product->id ? 'selected' : ''}} >{{$product->name}}</option>
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
    <table id="inventoryControlsTable" class="table table-hover table-inventory-controls" style="width:100%">
        <thead>
            <tr>
                <th>Quantity Order</th>
                <th>Product Name</th>
                <th style="border-bottom: none">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if (count($order_details) > 0)
                @foreach ($order_details as $order_detail)
                    <tr>
                        <td>{{ $order_detail->quantity_order }}</td>
                        <td>{{ $order_detail->product_id }}</td>
                        <td>
                            <a href="{{route('admin-edit-order_details', ['id' => $order_detail->id])}}">
                                <i class="mdi mdi-pencil text-success"></i>
                            </a>
                            <form action="{{route('admin-delete-order_details', $order_detail->id)}}" method="POST" class="d-inline">
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
