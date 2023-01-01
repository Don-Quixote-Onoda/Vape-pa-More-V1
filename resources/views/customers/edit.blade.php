@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <form action="{{ route('admin-update-customers',['id'=>$customer->id]) }}" method="post">
                @csrf
                <div class="col-md-12 mb-3">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control @error('firstname')  border-danger @enderror "
                        name="firstname" id="firstname" placeholder="First name" value="{{ $customer->firstname }}"
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
                        name="lastname" id="lastname" placeholder="Last name" value="{{ $customer->lastname }}"
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
                        name="age" id="age" placeholder="Age" value="{{ $customer->age }}"
                        required>
                    @error('age')
                        <div class="text-daborder-danger text-danger small mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary ml-3">Save</button>
            </form>
        </div>
    </div>
@endsection
