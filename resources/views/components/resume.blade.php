<div class="row mb-5">
    <div class="col-sm-10 col-centered">
        <div >
            <a href="{{route('account.resume')}}" target="_blank" class="btn btn-primary pull-right" ><i class="mdi mdi-download"></i>  Download</a>
        </div>
    </div>
</div>




<div class="row " id="resume_div">
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
                            
                        </div> 
                        {{-- <div class="talent-intro text-center">
                            <h2 class="mb-0">{{$profile->legal_first_name ?? ''}} {{$profile->legal_last_name ?? ''}}</h2>
                            @if (isset($profile->custom_link))
                                <p>{{url('/').'/models/'.$profile->custom_link}}</p>
                            @endif
                            
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <table class="w-100">
                        <tr>
                          <th class="w-25">Height: </th>
                          <td class="pb-1 pt-1">{{!is_null($profile) && $profile->feet ? \Str::finish($profile->feet, "'") : ''}} {{!is_null($profile) && $profile->height ? \Str::finish($profile->height,"''") : ''}}</td>
                        </tr>
                    </table>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <table class="w-100">
                        <tr>
                          <th class="w-25">Hair: </th>
                          <td class="pb-1 pt-1">{{!is_null($profile) && $profile->hairs ?? ''}}</td>
                        </tr>
                    </table>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <table class="w-100">
                        <tr>
                          <th class="w-25">Weight: </th>
                          <td class="pb-1 pt-1">{{!is_null($profile) && $profile->weight ?? ''}}</td>
                        </tr>
                    </table>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <table class="w-100">
                        <tr>
                          <th class="w-25">Eyes: </th>
                          <td class="pb-1 pt-1">{{!is_null($profile) && $profile->eyes ?? ''}}</td>
                        </tr>
                    </table>
                  </div>
                {{-- <div class="col-sm-12">
                    
                    <div class="talent-specs">
                        <table>
                            <tr>
                                <th>Height</th>
                                <td>{{$profile->feet ? \Str::finish($profile->feet, "'") : ''}} {{$profile->height ? \Str::finish($profile->height,"''") : ''}}</td>

                                <th>Hair</th>
                                <td>{{$profile->hairs ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Weight</th>
                                <td>{{$profile->weight ?? ''}}</td>

                                <th>Eyes</th>
                                <td>{{$profile->eyes ?? ''}}</td>
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
                </div> --}}

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
                                </tr> --}}
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
                                </tr> --}}

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
                                </tr> --}}

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
                                    
                                </tr> --}}

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
                                    
                                </tr> --}}

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
                                        <span class="label label-default" style="line-height: 35px;">{{$skill->skill->title ?? ''}}</span>
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