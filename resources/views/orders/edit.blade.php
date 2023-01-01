@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('admin-update-order', ['id' => $order->id]) }}" method="post">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <label class="text-dark font-weight-medium">Customer Name</label>
                            <div class="form-group">
                                <select class=" form-control" name="customer_id" required>
                                    <option value="">Select customer name</option>
                                    @if (count($customers) > 0)
                                        @foreach ($customers as $customer)
                                            <option value="{{$customer->id}}" {{$order->customer_id == $customer->id ? 'selected' : ''}} >{{$customer->firstname}} {{$customer->lastname}}</option>
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
                                            <option value="{{$payment->id}}" {{$order->payment_id == $payment->id ? 'selected' : ''}} >{{$payment->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary ml-3">Add</button>
                    </form>
        </div>
    </div>
@endsection
