@extends('layouts.app')
@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
    <div class="d-flex flex-column justify-content-between">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="card card-default mb-0">
                    <div class="card-body px-5 pb-5 pt-5">
                        <form method="POST" action="/admin/users/{{$user->id}}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12 mb-4">
                                    <input type="text"
                                        class="form-control input-lg @error('firstname') is-invalid @enderror"
                                        name="firstname" value="{{ $user->firstname }}" required autocomplete="name"
                                        autofocus placeholder="First Name">
                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <input type="text"
                                        class="form-control input-lg @error('lastname') is-invalid @enderror"
                                        name="lastname" value="{{ $user->lastname }}"  required autocomplete="name"
                                        autofocus placeholder="Last Name">
                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                        <input type="radio" id="customRadio1" name="sex" value="1" {{ $user->role == 1 ? 'checked' : ''  }}
                                            class="custom-control-input @error('sex') is-invalid @enderror" checked
                                            required>
                                        <label class="custom-control-label" for="customRadio1">Male</label>
                                        @error('sex')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                        <input type="radio" id="customRadio2" name="sex" value="2"
                                            class="custom-control-input @error('sex') is-invalid @enderror"
                                            required {{ $user->sex == 2 ? 'checked' : ''  }}>
                                        <label class="custom-control-label" for="customRadio2">Female</label>
                                        @error('sex')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <!-- Date Input -->
                                    <label class="text-dark font-weight-medium" for="">Birth Date</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-calendar"
                                                id="basic-addon1"></span>
                                        </div>
                                        <input type="date" class="form-control @error('birthdate') is-invalid @enderror" value="{{ $user->birthdate }}"  name="birthdate"
                                            data-mask="00/00/0000" required>
                                            @error('birthdate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <!-- Phone input -->
                                    <label class="text-dark font-weight-medium">Phone Number</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-phone" id="basic-addon1"></span>
                                        </div>
                                        <input type="number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ $user->phone_number }}"  data-mask="(999) 999-9999">
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <!-- Phone input -->
                                    <label class="text-dark font-weight-medium">Address</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $user->address }}"  data-mask="(999) 999-9999">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                    <div class="form-group col-md-12 mb-4">
                                        <label for="exampleFormControlSelect12">User Role</label>
                                        <select class="form-control" name="role"
                                            id="exampleFormControlSelect12" required>
                                            <option value="" selected>Select User Role</option>
                                            <option value="1" {{ $user->role == 1 ? 'selected' : ''  }}>Administrator</option>
                                            <option value="2" {{ $user->role == 2 ? 'selected' : ''  }}>Employee</option>
                                            <option value="3" {{ $user->role == 3 ? 'selected' : ''  }}>Customer</option>
                                        </select>
                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                <div class="form-group col-md-12 mb-4">
                                    <input type="email"
                                        class="form-control input-lg @error('email') is-invalid @enderror" value="{{ $user->email }}"
                                        name="email" required autocomplete="email"
                                        placeholder="Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <button type="submit"
                                        class="btn btn-primary btn-pill mb-4">{{ __('Update') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
