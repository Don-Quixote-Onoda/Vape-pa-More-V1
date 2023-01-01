@extends('layouts.app')
@section('content')

    <!-- Form Modal -->
    <button type="button" class="btn btn-info btn-pill" data-toggle="modal" data-target="#customerModal">
        Add Customer
    </button>

    <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="productModalTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Add New Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin-store-customers') }}" method="post">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control @error('firstname')  border-danger @enderror "
                                name="firstname" id="firstname" placeholder="First name" value="{{ old('firstname') }}"
                                required>
                            @error('firstname')
                                <div class="text-daborder-danger text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control @error('lastname')  border-danger @enderror "
                                name="lastname" id="lastname" placeholder="Last name" value="{{ old('lastname') }}"
                                required>
                            @error('lastname')
                                <div class="text-daborder-danger text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="age">Age</label>
                            <input type="number" class="form-control @error('age')  border-danger @enderror "
                                name="age" id="age" placeholder="Age" value="{{ old('age') }}"
                                required>
                            @error('age')
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
    <table id="customersTable" class="table table-hover table-payment" style="width:100%">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th style="border-bottom: none">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if (count($customers) > 0)
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->firstname }}</td>
                        <td>{{ $customer->lastname }}</td>
                        <td>{{ $customer->age }}</td>
                        <td>
                            <a href="{{route('admin-edit-customers', ['id' => $customer->id])}}">
                                <i class="mdi mdi-pencil text-success"></i>
                            </a>
                            <form action="{{route('admin-delete-customers', $customer->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method("DELETE")
                                <button type="submit"><i class="mdi mdi-delete text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <h2>No customers available.</h2>
            @endif
        </tbody>
    </table>
@endsection
