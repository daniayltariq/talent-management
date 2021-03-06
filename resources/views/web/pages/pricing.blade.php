@extends('web.layouts.app')

@section('title', 'Memberships')
@section('styles')
<style type="text/css">
  article {
  width:100%;
  max-width:1000px;
  margin:0 auto;
  margin-bottom: 5rem;
  position:relative;
}
.ul-pricing {
  display:flex;
  top:0px;
  z-index:10;
  padding-bottom:14px;
}
li {
  list-style:none;
  flex:1;
}
/* li:last-child {
  border-right:1px solid #DDD;
} */
button {
  width:100%;
  border: 1px solid #DDD;
  border-right:0;
  border-top:0;
  padding: 10px;
  background:#FFF;
  font-size:14px;
  font-weight:bold;
  height:60px;
  color:#999
}
li.active button {
  background:#F5F5F5;
  color:#000;
}
table { border-collapse:collapse; table-layout:fixed; width:100%; }
th { background:#F5F5F5; display:none; }
td, th {
  height:53px
}
td,th { border:1px solid #DDD; padding:10px; empty-cells:show; }
td,th {
  text-align:left;
}
td+td, th+th {
  text-align:center;
  display:none;
}
td.default {
  display:table-cell;
}
.bg-pri {
    border-top: 10px solid #dddddd;
}
.bg-purple {
    border-top: 10px solid #ccdbb1;
}
.bg-blue {
    border-top: 10px solid #78a5de;
}
.bg-green {
  border-top:10px solid #00c1a1;
  border-right: 1px solid #dddddd;
}
.sep {
  background:#F5F5F5;
  font-weight:bold;
}
.txt-l { font-size:28px; font-weight:bold; }
.txt-top { position:relative; top:-9px; left:-2px; }
.tick { font-size:18px; color:#2CA01C; }
.hide {
  border:0;
  background:none;
}

@media (min-width: 640px) {
  .ul-pricing {
    display:none;
  }
  td,th {
    display:table-cell !important;
  }
  td,th {
    /* width: 330px; */
  
  }
  td+td, th+th {
    width: auto;
  }


  .ul-pricing {
      display: flex;
      width: 100%;
      padding-left: 0;
  }

}


@media (max-width: 640px) {
  .ul-pricing {
      display: flex;
      width: 100%;
      padding-left: 0;
  }

}

.btn {
  padding: 9px 50px;
  white-space: normal;
}
table.pricing td:nth-child(2) {
    background: #fcfff3;
}

table.pricing td:nth-child(3) {
    background: #fff0f0;
}

table.pricing td:nth-child(4) {
    background: #f2fbff;
}

.tw-4{
  font-weight: 400;
  text-align: left;
}

.btn-c-p{
  font-size: 11px;
  padding: 9px 7px;
}

.cd-btn{
  padding: 9px 25px !important;
}

.talent_color{
  color: #f37c2c ;
}
</style>
@endsection

@section('content')

<!-- Slider Section Start -->
  <section class="page__img" style="background-image: url('{{ asset('web/img/blog_bg.jpg') }}')">
    <div class="container">
      <div class="row">
        <div class="title__wrapp">
          {{-- <div class="page__subtitle title__grey">Try premiuim</div> --}}
          <h1 class="page__title">MEMBERSHIPS</h1>
        </div>
      </div>
    </div>
  </section><!-- Slider Section End -->


<article class="mt-5">

<ul class="ul-pricing">
  {{-- @foreach ($plans as $plan)
    <li class="bg-{{$loop->index==0 ? 'purple' :($loop->index==1 ? 'blue' :'green') }}">
      <button>{{$plan->name}}</button>
    </li>
  @endforeach --}}
  
  {{-- <li class="bg-blue">
    <button>Standard </button>
  </li>
  <li class="bg-green active">
    <button>Professional</button>
  </li> --}}
  
</ul>  

<table class="pricing">
  <thead>
    <tr>
      <th class="bg-pri text-center"><a href="{{route('how-it-works')}}" class="btn btn-primary btn-c-p">How it works</a></th>
      {{-- @foreach ($plans as $plan)
        <th class="bg-{{$loop->index==0 ? 'purple' :($loop->index==1 ? 'blue' :'green') }}">
          {{$plan->name ?? ''}} 
        </th>
        
      @endforeach --}}
      @foreach ($plans as $plan)
        <th class="bg-{{$loop->index==0 ? 'purple' :($loop->index==1 ? 'blue' :'green') }}">
          @if (url()->previous()== route('how-it-works'))
              <a class="cd-btn btn btn__red secondary" href="{{route('subscription.index',$plan->slug)}}">Subscribe to {{$plan->name}} </a>
          @else
              <span class="txt-l talent_color">{{$plan->name}}</span>
          @endif
          
        </th>
      @endforeach
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><b>Membership Fee</b><br>Auto-renews annually</td>
      @foreach ($plans as $plan)
        <td><span class="txt-top">&dollar;</span><span class="txt-l">{{$plan->cost ??''}}</span></td>
      @endforeach
      
      
    </tr>
    <tr>
      <td colspan="4" class="sep">Profile</td>
    </tr>
    <tr>
      <td>Unique URL based on legal name</td>
      @foreach ($plans as $plan)
        <td><span class="tick"><i class="fa fa-{{$plan->unique_url==1 ? 'check' : ''}}"></i> </span></td>
      @endforeach
      {{-- <td><span class="tick">&#10004;</span></td>
      <td class="default"><span class="tick">&#10004;</span></td> --}}
      
    </tr>
    <tr>
      <td>Contact Info</td>
      @foreach ($plans as $plan)
        <td><span class="tick"><i class="fa fa-{{$plan->contact_info==1 ? 'check' : ''}}"></i> </span></td>
      @endforeach
      {{-- <td><span class="tick">&#10004;</span></td>
      <td><span class="tick">&#10004;</span></td>
      <td class="default"><span class="tick">&#10004;</span></td> --}}
      
    </tr>
     
    <tr>
      <td>Pictures</td>
      @foreach ($plans as $plan)
        <td><span class="tick">{{$plan->pictures ?? ''}}</span></td>
      @endforeach
      {{-- <td><span class="tick">2</span></td>
      <td><span class="tick">5</span></td>
      <td class="default"><span class="tick">15</span></td> --}}
      
    </tr>

    <tr>
      <td>Audios</td>
      @foreach ($plans as $plan)
        <td><span class="tick">{{$plan->audios ?? ''}}</span></td>
      @endforeach
      {{-- <td><span class="tick">2</span></td>
      <td><span class="tick">5</span></td>
      <td class="default"><span class="tick">15</span></td> --}}
      
    </tr>
    <tr>
      <td>Videos</td>
      @foreach ($plans as $plan)
        <td><span class="tick">{{$plan->videos ?? ''}}</span></td>
      @endforeach
      {{-- <td><span class="tick">2</span></td>
      <td><span class="tick">5</span></td>
      <td class="default"><span class="tick">15</span></td> --}}
      
    </tr>

    <tr>
      <td>Resume Builder Wizard with onscreen formatted resume and generated .pdf resume available for download.</td>
      @foreach ($plans as $plan)
        <td><span class="tick"><i class="fa fa-{{$plan->resume==1 ? 'check' : ''}}"></i> </span></td>
      @endforeach
     {{-- <td><span class="tick">&#10004;</span></td>
     <td><span class="tick">&#10004;</span></td> --}}
      
    </tr>

    <tr>
      <td colspan="4" class="sep">Communications</td>
    </tr>
    <tr>
      <td>Links to Social Media</td>
      @foreach ($plans as $plan)
        <td><span class="tick"><i class="fa fa-{{$plan->social_links==1 ? 'check' : ''}}"></i> {{$plan->social_links==1?($plan->social_limit=='unlimited'? '(unlimited)' : $plan->social_limit) : ''}}</span></td>
      @endforeach
      {{-- <td><span class="tick"></span></td>
      <td><span class="tick">&#10004; (2)</span></td>
      <td><span class="tick">&#10004; (unlimited)</span></td> --}}
      
    </tr>
    <tr>
      <td>Profile includes Email Me button</td>
      @foreach ($plans as $plan)
        <td><span class="tick"><i class="fa fa-{{$plan->email_me==1 ? 'check' : ''}}"></i> </span></td>
      @endforeach
      {{-- <td><span class="tick">&#10004;</span></td>
      <td><span class="tick">&#10004;</span></td>
      <td><span class="tick">&#10004;</span></td> --}}
      
    </tr>
    <tr>
      <td>Ability to send a short professional message including you???re your profile URL to a list of comma delimited email addresses</td>
      @foreach ($plans as $plan)
        <td><span class="tick"><i class="fa fa-{{$plan->short_message==1 ? 'check' : ''}}"></i> </span></td>
      @endforeach
      {{-- <td><span class="tick"></span></td>
      <td><span class="tick">&#10004;</span></td>
      <td><span class="tick">&#10004;</span></td> --}}
      
    </tr>
    <tr>
      <td>Access to Community Forums.</td>
      @foreach ($plans as $plan)
        <td><span class="tick"><i class="fa fa-{{$plan->community_access==1 ? 'check' : ''}}"></i> {{$plan->community_access==1?($plan->community_access_perm=='R'? '(Read)' : '(Read and Comment)') : ''}} </span></td>
      @endforeach
      {{-- <td><span class="tick"></span></td>
      <td><span class="tick">&#10004;</span></td>
      <td><span class="tick">&#10004;</span></td> --}}
      
    </tr>
    <tr>
      <td>Apply Now button on Casting Community Posts</td>
      @foreach ($plans as $plan)
        <td><span class="tick"><i class="fa fa-{{$plan->apply_now==1 ? 'check' : ''}}"></i> </span></td>
      @endforeach
      {{-- <td><span class="tick"></span></td>
      <td><span class="tick"></span></td>
      <td><span class="tick">&#10004;</span></td> --}}
      
      
    </tr>
    <tr>
      <td>Agents can contact you directly for opportunities TO Anyone looking for talent (casting agents, theater producers, directors) can contact you directly through the site.</td>
      @foreach ($plans as $plan)
        <td><span class="tick"><i class="fa fa-{{$plan->agent_contact==1 ? 'check' : ''}}"></i> </span></td>
      @endforeach
      {{-- <td><span class="tick"></span></td>
      <td><span class="tick"></span></td>
      <td><span class="tick">&#10004;</span></td> --}}
      
    </tr>

    <tr>
      <td colspan="4" class="sep">Professional Development </td>
    </tr>

    <tr>
      <td>Free ???The Talent Guide??? with 3 referrals ($50 value)</td>
      @foreach ($plans as $plan)
        <td><span class="tick"><i class="fa fa-{{$plan->free_guide==1 ? 'check' : ''}}"></i> </span></td>
      @endforeach
      {{-- <td><span class="tick">&#10004;</span></td>
      <td><span class="tick">&#10004;</span></td>
      <td><span class="tick">&#10004;</span></td> --}}
      
    </tr>
    <tr>
      <td>Invitations to live, online training sessions </td>
      @foreach ($plans as $plan)
        <td><span class="tick"><i class="fa fa-{{$plan->training_invitation==1 ? 'check' : ''}}"></i> </span></td>
      @endforeach
      {{-- <td><span class="tick"></span></td>
      <td><span class="tick">&#10004;</span></td>
      <td><span class="tick">&#10004;</span></td> --}}
      
    </tr>
    <tr>
      <td> Q&As (Cost = $9.99 per session)</td>
      @foreach ($plans as $plan)
        <td><span class="tick"><i class="fa fa-{{$plan->inductry_invitation==1 ? 'check' : ''}}"></i> </span></td>
      @endforeach
      {{-- <td><span class="tick"></span></td>
      <td><span class="tick"></span></td>
      <td><span class="tick">&#10004;</span></td> --}}
      
    </tr>
    <tr>
      <td></td>
      @foreach ($plans as $plan)
        <td><span class="txt-top">&dollar;</span><span class="txt-l">{{$plan->cost ??''}}</span></td>
      @endforeach
      
      
    </tr>
  
    <tr>
      <td></td>
      @foreach ($plans as $plan)
        
        <td>
          @if (url()->previous()== route('how-it-works'))
            <a class="cd-btn btn btn__red secondary" href="{{route('subscription.index',$plan->slug)}}">Subscribe to {{$plan->name}} </a>
          @else
            <span class="txt-l talent_color">{{$plan->name}}</span>
          @endif
           
        </td>
        
      @endforeach
      
      {{-- <td><button class="cd-btn btn btn__red secondary">Subscribe to Basic</button></td>
      <td><button class="cd-btn btn btn__red secondary">Subscribe to Standard</button></td>
      <td><button class="cd-btn btn btn__red secondary">Subscribe to Professional</button></td> --}}
      
    </tr>
 
    
  </tbody>
</table>
  
</article>

@endsection


@section('scripts')
<script type="text/javascript">
  // DIRTY Responsive pricing table JS

$( "ul" ).on( "click", "li", function() {
  var pos = $(this).index()+2;
  $("tr").find('td:not(:eq(0))').hide();
  $('td:nth-child('+pos+')').css('display','table-cell');
  $("tr").find('th:not(:eq(0))').hide();
  $('li').removeClass('active');
  $(this).addClass('active');
});

// Initialize the media query
  var mediaQuery = window.matchMedia('(min-width: 640px)');
  
  // Add a listen event
  mediaQuery.addListener(doSomething);
  
  // Function to do something with the media query
  function doSomething(mediaQuery) {    
    if (mediaQuery.matches) {
      $('.sep').attr('colspan',4);
    } else {
      $('.sep').attr('colspan',2);
    }
  }
  
  // On load
  doSomething(mediaQuery);



  $(document).ready(function () {    
      var width = $(window).width();
      $(window).resize(function () {
          if (width <= '720') {
              $('.bg-purple').click();
              $('article').addClass('p-3');
          }
      });

      if (width <= '720') {
          $('.bg-purple').click();
          $('article').addClass('p-3');
      }
  })
</script>
@endsection