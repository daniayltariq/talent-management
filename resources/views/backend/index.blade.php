@extends('backend.layouts.app')

@section('styles')
 <style>
     .post__cat{
        width: fit-content;
        background-color: #d7dbf0;
        border-radius: 17px;
        padding: 3px 10px;
     }

     .p_event_none{
         pointer-events: none !important;
     }
 </style>
@endsection

@section('content')

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Content Head -->
    <!-- end:: Content Head -->                 
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        
        <div class="row">
            <div class="col-xl-8 col-lg-12 order-lg-3 order-xl-1">
                <!--begin:: Widgets/Best Sellers-->
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Posts
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#kt_widget5_tab1_content" role="tab">
                                    Latest
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kt_widget5_tab2_content" role="tab">
                                    Most Viewed
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kt_widget5_tab3_content" role="tab">
                                    Most Liked
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
                                <div class="kt-widget5">
                                    @foreach ($latest as $item)
                                       <div class="kt-widget5__item">
                                            <div class="kt-widget5__content">
                                                <div class="kt-widget5__pic">
                                                    <img class="kt-widget7__img" src="{{asset($item->image ?? '')}}" alt="">
                                                </div>
                                                <div class="kt-widget5__section">
                                                    <a href="{{ route('single-post',['slug' => $item->slug]) }}" target="_blank" class="kt-widget5__title">
                                                        {{ $item->title ?? '' }}
                                                    </a>
                                                    <div class="kt-widget5__desc">
                                                        {{-- {{printTruncated(80, $item->content, $isUtf8=true)}} --}}  <p class="post__cat">{{$item->category->title ?? ''}}</p>
                                                    </div>
                                                    <div class="kt-widget5__info">
                                                        <span>Author:</span>
                                                        <span class="kt-font-info">{{$item->user->f_name ?? ''}} {{$item->user->l_name ?? ''}}</span>
                                                        <span>Posted at:</span>
                                                        <span class="kt-font-info">{{$item->created_at ?? ''}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-widget5__content">
                                                <div class="kt-widget5__stats">
                                                    <span class="kt-widget5__number">{{ $item->views ?? ''}}</span>
                                                    <span class="kt-widget5__sales">views</span>
                                                </div>
                                                <div class="kt-widget5__stats">
                                                    <span class="kt-widget5__number">{{ $item->likes()->exists() ? count($item->likes) : 0}}</span>
                                                    <span class="kt-widget5__votes">likes</span>
                                                </div>
                                            </div>
                                        </div> 
                                    @endforeach
                                    
                                </div>
                            </div>
                            <div class="tab-pane" id="kt_widget5_tab2_content">
                                <div class="kt-widget5">
                                    @foreach ($most_viewed as $item)
                                       <div class="kt-widget5__item">
                                            <div class="kt-widget5__content">
                                                <div class="kt-widget5__pic">
                                                    <img class="kt-widget7__img" src="{{asset($item->image ?? '')}}" alt="">
                                                </div>
                                                <div class="kt-widget5__section">
                                                    <a href="{{ route('single-post',['slug' => $item->slug]) }}" target="_blank" class="kt-widget5__title">
                                                        {{ $item->title ?? '' }}
                                                    </a>
                                                    <div class="kt-widget5__desc d-flex">
                                                        {{-- {{printTruncated(80, $item->content, $isUtf8=true)}} --}}  <p class="post__cat">{{$item->category->title ?? ''}}</p>
                                                    </div>
                                                    <div class="kt-widget5__info">
                                                        <span>Author:</span>
                                                        <span class="kt-font-info">{{$item->user->f_name ?? ''}} {{$item->user->l_name ?? ''}}</span>
                                                        <span>Posted at:</span>
                                                        <span class="kt-font-info">{{$item->created_at ?? ''}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-widget5__content">
                                                <div class="kt-widget5__stats">
                                                    <span class="kt-widget5__number">{{ $item->views ?? ''}}</span>
                                                    <span class="kt-widget5__sales">views</span>
                                                </div>
                                                <div class="kt-widget5__stats">
                                                    <span class="kt-widget5__number">{{ $item->likes()->exists() ? count($item->likes) : 0}}</span>
                                                    <span class="kt-widget5__votes">likes</span>
                                                </div>
                                            </div>
                                        </div> 
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane" id="kt_widget5_tab3_content">
                                <div class="kt-widget5">
                                    @foreach ($most_liked as $item)
                                        <div class="kt-widget5__item">
                                            <div class="kt-widget5__content">
                                                <div class="kt-widget5__pic">
                                                    <img class="kt-widget7__img" src="{{asset($item->image ?? '')}}" alt="">
                                                </div>
                                                <div class="kt-widget5__section">
                                                    <a href="{{ route('single-post',['slug' => $item->slug]) }}" target="_blank" class="kt-widget5__title">
                                                        {{ $item->title ?? '' }}
                                                    </a>
                                                    <div class="kt-widget5__desc">
                                                        {{-- {{printTruncated(80, $item->content, $isUtf8=true)}} --}} <p class="post__cat">{{$item->category->title ?? ''}}</p>
                                                    </div>
                                                    <div class="kt-widget5__info">
                                                        <span>Author:</span>
                                                        <span class="kt-font-info">{{$item->user->f_name ?? ''}} {{$item->user->l_name ?? ''}}</span>
                                                        <span>Posted at:</span>
                                                        <span class="kt-font-info">{{ $item->created_at->format('d M Y') ?? ''}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-widget5__content">
                                                <div class="kt-widget5__stats">
                                                    <span class="kt-widget5__number">{{ $item->views ?? ''}}</span>
                                                    <span class="kt-widget5__sales">views</span>
                                                </div>
                                                <div class="kt-widget5__stats">
                                                    <span class="kt-widget5__number">{{ $item->likes()->exists() ? count($item->likes) : 0}}</span>
                                                    <span class="kt-widget5__votes">likes</span>
                                                </div>
                                            </div>
                                        </div> 
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end:: Widgets/Best Sellers-->
            </div>
            <div class="col-xl-4 col-lg-6 order-lg-3 order-xl-1">
                <!--begin:: Widgets/New Users-->
                <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                New Users
                            </h3>
                        </div>
                        {{-- <div class="kt-portlet__head-toolbar">
                            <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-brand" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#kt_widget4_tab1_content" role="tab">
                                    Today
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kt_widget4_tab2_content" role="tab">
                                    Month
                                    </a>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                    <div class="kt-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_widget4_tab1_content">
                                <div class="kt-widget4">
                                    @foreach ($new_users as $item)
                                        <div class="kt-widget4__item">
                                            <div class="kt-widget4__pic kt-widget4__pic--pic">
                                                <img src="{{ $item->profile()->exists() && !is_null($item->profile->profile_img) && file_exists(public_path().'/storage/uploads/profile/'.$item->profile->profile_img) ? ('storage/uploads/profile/'.$item->profile->profile_img) :'web/img/user.png' }}" alt="">   
                                            </div>
                                            <div class="kt-widget4__info">
                                                <a href="{{ $item->hasRole('candidate') && $item->profile()->exists() ? route('model',$item->profile->custom_link ?? $item->profile->id) : '#' }}" class="kt-widget4__username">
                                                {{$item->f_name ?? ''}} {{$item->l_name ?? ''}}
                                                </a>
                                                <p class="kt-widget4__text">
                                                    {{$item->gender ?? $item->custom_gender ?? ''}}
                                                </p>
                                            </div>
                                            
                                            <a href="#" class="btn btn-sm btn-label-{{$item->roles[0]->alias=='provider' ? 'brand' : 'success'}} btn-bold p_event_none">
                                                @foreach ($item->roles as $role)
                                                    {{ $role->alias ?? '' }}
                                                    <br>
                                                @endforeach
                                            </a>                       
                                        </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end:: Widgets/New Users-->  
            </div>
            
        </div>
        <!--End::Row-->
        <!--End::Dashboard 1--> 
    </div>
    <!-- end:: Content -->              
</div>

@endsection