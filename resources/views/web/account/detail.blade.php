@extends('web.layouts.app')


@section('styles')
<style type="text/css">
.btn-share {
    padding: 16px 32px;
    font-size: 15px;
    margin-left: 10px;
}

.single-talent {
    padding: 40px;
    background: #f7f7f7;
}

.profile-sec {
    height: 180px;
    width: 180px;
    border-radius: 50%;
    padding: 5px;
    background: #f8b248;
}

.skills .label-default {
    background-color: #e0e0e0;
    color: #565656;
    font-weight: 400;
    font-size: 15px;
}

.tal-profile{
    height: 100%;
    width: 100%;
    object-fit: cover;
}

.w-4{
    width: 40%;
}

.w-3{
    width: 30%;
}

.talent-specs th {
    width: 70%;
}
</style>
@endsection


@section('content')
<!-- Slider Section Start -->
<section class="page__img" style="background-image: url('{{ asset('web/img/blog_bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="title__wrapp">
                <h1 class="page__title">{{$profile->legal_first_name ?? ''}} {{$profile->legal_last_name ?? ''}}</h1>
            </div>
        </div>
    </div>
</section>
<!-- Slider Section End -->
<!-- Blog Section Start -->
<div class="section blog picklist">
    <div class="container">
        <div class="row">
            <div class="blog__posts col-md-12">
                <div class="blog__list">
                    
                    <div class="row mb-5">
                        <div class="col-sm-10 col-centered">
                            <div >
                                <button class="ml-0 btn btn-share"><i class="mdi mdi-message-outline"></i>  Send Message</button>
                                <button class="btn btn-share pull-right"><i class="mdi mdi-download"></i>  Download</button>
                            </div>
                        </div>
                    </div>

                    


                    <div class="row ">
                        <div class="col-sm-10 col-centered">
                            <div class="single-talent mb-5">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div>
                                            <div class="profile-sec mx-auto ml-5">
                                                <img src="{{ asset(is_null($profile) || is_null($profile->profile_img) ? 'web/img/user.png': ('storage/uploads/profile/'.$profile->profile_img)) }}" class="img img-responsive tal-profile">

                                            </div>
                                            <div class="talent-intro text-center">
                                                <h2 class="mb-0">{{$profile->legal_first_name ?? ''}} {{$profile->legal_last_name ?? ''}}</h2>
                                                @if (isset($profile->custom_link))
                                                    <p>{{url('/').'/models/'.$profile->custom_link}}</p>
                                                @endif
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        
                                        <div class="talent-specs">
                                            <table>
                                                <tr>
                                                    <th>Height</th>
                                                    <td>{{$profile->height  ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Weight</th>
                                                    <td>{{$profile->weight ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Waist</th>
                                                    <td>{{$profile->waist ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Shoe</th>
                                                    <td>{{$profile->shoes ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Hair</th>
                                                    <td>{{$profile->hairs ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Eyes</th>
                                                    <td>{{$profile->eyes ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Neck</th>
                                                    <td>{{$profile->neck ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Sleves</th>
                                                    <td>{{$profile->sleves ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Chest</th>
                                                    <td>{{$profile->chest ?? ''}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        
                                        <div class="talent-specs">
                                            <table class="pull-right">
                                                <tr>
                                                    <th class="text-right">{{$profile->address_1 ?? $profile->address_2 ?? auth()->user()->h_adress_1 ?? auth()->user()->h_adress_2 ??''}} {{$profile->city ?? ''}}</th>
                                                     
                                                </tr>
                                                <tr>
                                                    <th class="text-right">{{$profile->state ?? auth()->user()->state ?? ''}}, {{$profile->country ?? auth()->user()->country ?? ''}} {{$profile->zipcode ?? auth()->user()->zipcode ?? ''}}</th>
                                                    
                                                </tr>
                                                <tr>
                                                    <th class="text-right">{{$profile->telephone ?? auth()->user()->phone ?? ''}}</th>
                                                    
                                                </tr>
                                                <tr>
                                                    <th class="text-right">{{$profile->mobile ?? ''}}</th>
                                                     
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                <hr class="hr">
                                
                                @php
                                    $expr=array();
                                    $expr=!is_null($profile) ? ($profile->user->experience()->exists() ? $profile->user->experience->where('type','theater') : null):null;
                                @endphp
                                @if (!is_null($expr)&&  count($expr)>0)
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="text__quote font-primary">Theater</h4>
                                            <div class="">
                                                <table class="w-100">
                                                    {{-- <tr>
                                                        <th>Name</th>
                                                        <th>Role</th>
                                                        <th>Director or Venue</th>
                                                    </tr>--}}
                                                    @if ( !is_null($expr))
                                                        @foreach ($expr as $key => $exp)
                                                            <tr>
                                                                <td class="w-4">{{$exp->name ?? ''}}</td>
                                                                <td class="w-3">{{$exp->role ?? ''}}</td>
                                                                <td class="w-3">{{$exp->production ?? ''}}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    
                                                    
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="hr">
                                @endif
                                
                                @php
                                    $expr=array();
                                    $expr=!is_null($profile) ? ($profile->user->experience()->exists() ? $profile->user->experience->where('type','films') : null):null;
                                @endphp

                                @if (!is_null($expr)&&  count($expr)>0)
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="text__quote font-primary">Films</h4>
                                            <div class="">
                                                <table class="w-100">
                                                    {{-- <tr>
                                                        <th>Name</th>
                                                        <th>Role</th>
                                                        <th>Director or Production Company</th>
                                                    </tr>--}}
                                                    @if (!is_null($expr))
                                                        @foreach ($expr as $key => $exp)
                                                            <tr>
                                                                <td class="w-4">{{$exp->name ?? ''}}</td>
                                                                <td class="w-3">{{$exp->role ?? ''}}</td>
                                                                <td class="w-3">{{$exp->production ?? ''}}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="hr">
                                @endif
                                
                                @php
                                    $expr=array();
                                    $expr=!is_null($profile) ? ($profile->user->experience()->exists() ? $profile->user->experience->where('type','television') : null):null;
                                @endphp

                                @if (!is_null($expr)&&  count($expr)>0)
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="text__quote font-primary">Telivision</h4>
                                            <div class="">
                                                <table class="w-100">
                                                    {{-- <tr>
                                                        <th>Name</th>
                                                        <th>Role</th>
                                                        <th>Production</th>
                                                    </tr>--}}
                                                    @if (!is_null($expr))
                                                        @foreach ($expr as $key => $exp)
                                                            <tr>
                                                                <td class="w-4">{{$exp->name ?? ''}}</td>
                                                                <td class="w-3">{{$exp->role ?? ''}}</td>
                                                                <td class="w-3">{{$exp->production ?? ''}}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="hr">
                                @endif

                                @php
                                    $expr=array();
                                    $expr=!is_null($profile) ? ($profile->user->experience()->exists() ? $profile->user->experience->where('type','commercials') : null):null;
                                @endphp

                                @if (!is_null($expr)&&  count($expr)>0)
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="text__quote font-primary">Commercials</h4>
                                            <div class="">
                                                <table class="w-100">
                                                    {{-- <tr>
                                                        <th>Name of Commercial</th>
                                                        <th>Role Played</th>
                                                        <th>Director or Production Company</th>
                                                        
                                                    </tr>--}}
                                                    @if (!is_null($expr))
                                                        @foreach ($expr as $key => $exp)
                                                            <tr>
                                                                <td class="w-4">{{$exp->name ?? ''}}</td>
                                                                <td class="w-3">{{$exp->role ?? ''}}</td>
                                                                <td class="w-3">{{$exp->production ?? ''}}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="hr">
                                @endif

                                @php
                                    $expr=array();
                                    $expr=!is_null($profile) ? ($profile->user->experience()->exists() ? $profile->user->experience->where('type','training') : null):null;
                                @endphp

                                @if (!is_null($expr) &&  count($expr)>0)
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="text__quote font-primary">Traning</h4>
                                            <div class="">
                                                <table class="w-100">
                                                    {{-- <tr>
                                                        <th>Training Class</th>
                                                        <th>Instructor</th>
                                                        <th>Training Company</th>
                                                        
                                                    </tr>--}}
                                                    @if (!is_null($expr))
                                                        @foreach ($expr as $key => $exp)
                                                            <tr>
                                                                <td class="w-4">{{$exp->name ?? ''}}</td>
                                                                <td class="w-3">{{$exp->role ?? ''}}</td>
                                                                <td class="w-3">{{$exp->production ?? ''}}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="hr">
                                @endif
                                
                                @php
                                    $skills=array();
                                    $skills=!is_null($profile) ? ($profile->user->skills()->exists() ? $profile->user->skills : null):null;
                                @endphp

                                @if (!is_null($skills) && count($skills)>0)
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="text__quote font-primary">Special Skills</h4>
                                            <div class="skills">
                                                
                                                @if (!is_null($skills))
                                                    @foreach ($skills as $skill)
                                                        @if ($skill->skill()->exists())
                                                            <span class="label label-default">{{$skill->skill->title ?? ''}}</span>
                                                        @endif
                                                        
                                                    @endforeach
                                                @endif
                                                
                                                {{-- <span class="label label-default">Baseball</span>
                                                <span class="label label-default">Golf</span>
                                                <span class="label label-default">Rollerblading</span>
                                                <span class="label label-default">Juggling</span>
                                                <span class="label label-default">Scuba (PADI certified)</span>
                                                <span class="label label-default">Valid Driver’s License and U.S. Passport.</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                

                            </div>
                             
                            
                            
                        </div>
                    </div>
                    
                    
                </div>
               
            </div>
            
        </div>
    </div>
</div>
<!-- Blog Section End -->
@endsection