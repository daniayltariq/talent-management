@extends('web.layouts.app')


@section('styles')
<style type="text/css">
.btn-half {
    width: 50%;
    float: unset !important;
    margin: auto;
    margin-top: 15px !important;
    padding: 15px 30px;
}
</style>
@endsection
@section('content')
<section class="page__img" style="background-image: url('{{ asset('web/img/apply_bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="title__wrapp">
                <div class="{{-- page__subtitle --}} title__grey">Apply</div>
                <h1 class="page__title">Work with us</h1>
            </div>
        </div>
    </div>
</section>


<section class="section apply">                    
        <div class="container">
            <div class="row">
                <h3 class="text__quote centered">Sign in</h3>
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                    <form class="apply-form form-horizontal" method="POST" action="{{ route('login') }}" >
                        @csrf
                        <div class="form-block">
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">E-Mail Address <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-4 control-label">Password <span class="req">*</span></label>
                                <div class="col-sm-8">
                                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-default btn__red {{-- animation --}} btn-half pull-right">Sign in</button>
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                </div>
                            </div>
                      
                         
                        </div>
                        
                        
                    </form>
                </div>

            </div>
        </div>
    </section>

@endsection