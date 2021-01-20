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
                {{-- <div class="page__subtitle title__grey">Apply</div> --}}
                <h1 class="page__title">Work with us</h1>
            </div>
        </div>
    </div>
</section>


<section class="section apply">                    
        <div class="container">
            <div class="row">
                <h3 class="text__quote centered">Sign Up</h3>
                @if(count($errors)>0)
                    <div class="alert alert-danger mt-4">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                    <form class="apply-form form-horizontal" method="POST" id="register_form" action="{{ route('register') }}" >
                        @csrf
                        <input type="hidden" name="account_type" value="candidate">
                        <div class="form-block">
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">E-Mail Address <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-4 control-label">Create Password <span class="req">*</span></label>
                                <div class="col-sm-8">
                                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-sm-4 control-label">Confirm Password <span class="req">*</span></label>
                                <div class="col-sm-8">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <button type="button" id="register_btn" class="btn btn-default btn__red {{-- animation --}} btn-half pull-right">Sign Up</button>
                                    
                                </div>
                            </div>
                      
                         
                        </div>
                        
                        
                    </form>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#register_btn').click(function(){
                $('#register_form').submit();
            })
        })
    </script>
@endsection