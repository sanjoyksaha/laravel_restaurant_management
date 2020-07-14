{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>{{ __('Login') }}</h4></div>
                <hr>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-light" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('title', 'Login')

@push('css')

@endpush

@section('content')

  <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-8 col-md-offset-1">
                
                @include('layouts.include.msg')
                

                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title ">Login</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row py-2">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="bmd-label-floating">Email</label>
                              <input type="email" class="form-control" name="email" value={{ old('email') }}>
                            </div>
                          </div>
                        </div>
                        <div class="row py-2">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="bmd-label-floating">Password</label>
                              <input type="password" class="form-control" name="password" required="required">
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="{{ route('welcome') }}" class="btn btn-danger">Back</a>
                        
                    </form>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
  </div>

@endsection

@push('scripts')


@endpush
