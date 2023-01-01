@extends('layouts.app')
@section('content')

    <!-- Form Modal -->
    <button type="button" class="btn btn-info btn-pill" data-toggle="modal" data-target="#inventoryControlModal">
        Add Payment
    </button>

    <div class="modal fade" id="inventoryControlModal" tabindex="-1" role="dialog" aria-labelledby="inventoryControlModalTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Add New Inventory Control</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin-store-inventory_controls') }}" method="post">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <label for="quantity_stock">Quantiy Stock</label>
                            <input type="number" class="form-control @error('quantity_stock')  border-danger @enderror "
                                name="quantity_stock" id="quantity_stock" placeholder="Quantity stock" value="{{ old('quantity_stock') }}"
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
                <th>Quantity Stock</th>
                <th>Product Name</th>
                <th style="border-bottom: none">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if (count($inventory_controls) > 0)
                @foreach ($inventory_controls as $inventory_control)
                    <tr>
                        <td>{{ $inventory_control->quantity_stock }}</td>
                        <td>{{ $inventory_control->product_id }}</td>
                        <td>
                            <a href="{{route('admin-edit-inventory_controls', ['id' => $inventory_control->id])}}">
                                <i class="mdi mdi-pencil text-success"></i>
                            </a>
                            <form action="{{route('admin-delete-inventory_controls', $inventory_control->id)}}" method="POST" class="d-inline">
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
