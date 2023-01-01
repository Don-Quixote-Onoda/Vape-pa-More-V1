<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">

<head>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Mono - Responsive Admin & Dashboard Template</title>

        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
        <link href="{{ asset('admin-assets/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin-assets/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />

        <!-- PLUGINS CSS STYLE -->
        <link href="{{ asset('admin-assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />

        <!-- MONO CSS -->
        <link id="main-css-href" rel="stylesheet" href="{{ asset('admin-assets/css/style.css') }}" />




        <!-- FAVICON -->
        <link href="{{ asset('admin-assets/images/favicon.png') }}" rel="shortcut icon" />

        <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
        <script src="{{ asset('admin-assets/plugins/nprogress/nprogress.js') }}"></script>
    </head>

</head>

<body class="bg-light-gray my-5" id="body">
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
        <div class="d-flex flex-column justify-content-between">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="card card-default mb-0">
                        <div class="card-header pb-0">
                            <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                                <a class="w-auto pl-0" href="/index.html">
                                    <img src="{{ asset('admin-assets/images/logo.png') }}" alt="Mono">
                                    <span class="brand-name text-dark">Vape Pa More</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body px-5 pb-5 pt-0">

                            <h4 class="text-dark mb-6 text-center">Vape Pa More Inventory System</h4>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12 mb-4">
                                        <input type="text"
                                            class="form-control input-lg @error('firstname') is-invalid @enderror"
                                            name="firstname" value="{{ old('firstname') }}" required autocomplete="name"
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
                                            name="lastname" value="{{ old('lastname') }}" required autocomplete="name"
                                            autofocus placeholder="Last Name">
                                        @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 mb-4">
                                        <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                            <input type="radio" id="customRadio1" name="sex" value="1" {{ old('role') == 1 ? 'checked' : ''  }}
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
                                                required {{ old('sex') == 2 ? 'checked' : ''  }}>
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
                                            <input type="date" class="form-control @error('birthdate') is-invalid @enderror" value="{{ old('birthdate') }}"  name="birthdate"
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
                                            <input type="number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}"  data-mask="(999) 999-9999">
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
                                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}"  data-mask="(999) 999-9999">
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
                                                <option value="1" {{ old('role') == 1 ? 'selected' : ''  }}>Administrator</option>
                                                <option value="2" {{ old('role') == 2 ? 'selected' : ''  }}>Employee</option>
                                                <option value="3" {{ old('role') == 3 ? 'selected' : ''  }}>Customer</option>
                                            </select>
                                            @error('role')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    <div class="form-group col-md-12 mb-4">
                                        <input type="email"
                                            class="form-control input-lg @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                            name="email" required autocomplete="email"
                                            placeholder="Email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 ">
                                        <input type="password"
                                            class="form-control input-lg @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password"
                                            placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 ">
                                        <input type="password" class="form-control input-lg" id="cpassword"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="Confirm Password">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-between mb-3">

                                            <div class="custom-control custom-checkbox mr-3 mb-3">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">I Agree the
                                                    terms and conditions.</label>
                                            </div>

                                        </div>

                                        <button type="submit"
                                            class="btn btn-primary btn-pill mb-4">{{ __('Sign Up') }}</button>

                                        <p>Already have an account?
                                            @guest
                                                @if (Route::has('login'))
                                                    <a class="text-blue" href="{{ route('login') }}">Login</a>
                                                @endif
                                            @endguest
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
