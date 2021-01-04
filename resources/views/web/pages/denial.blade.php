@extends('web.layouts.app')

@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<style type="text/css">


</style>
@endsection

@section('content')
<section class="page__img" style="background-image: url('{{ asset('web/img/apply_bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="title__wrapp">
                {{-- <div class="page__subtitle title__grey">Looking for talent ?</div> --}}
                <h1 class="page__title">404</h1>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="section how-it-works">
        <div class="container">
        	<div class="text-center">
        		<h2 class="text-dark">{{$message ?? ''}}</h2>
        	</div>
        </div>
    </div>
</section>

@endsection