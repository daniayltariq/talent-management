@extends('web.layouts.app')

@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<style type="text/css">

#over img {
  margin-left: auto;
  margin-right: auto;
  display: block;
}

.refresh{
    color: #df691a;
}

.refresh:hover{
    border-bottom:2px solid #df691a;
}
</style>
@endsection

@section('content')
<section class="page__img" style="background-image: url('{{ asset('web/img/apply_bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="title__wrapp">
                {{-- <div class="page__subtitle title__grey">Looking for talent ?</div> --}}
                <h1 class="page__title">Error 419</h1>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="section how-it-works">
        <div class="container">
        	<div class="text-center">
        		<h2 class="text-dark">Sorry your page expired.<br>Please <span><a class="refresh" href="{{route('login')}}">Refresh</a></span> and try again.</h2>
			</div>
			<div class="row">
				<div id="over" style=" width:100%; height:100%">
					<img src="{{asset('web/img/errors/419.jpeg')}}" style="width: 25%" alt="">
				</div>
			</div>
        </div>
    </div>
</section>

@endsection