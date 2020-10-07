@extends('web.layouts.app')


@section('styles')
<style type="text/css">
  article {
  width:100%;
  max-width:1000px;
  margin:0 auto;
  margin-bottom: 5rem;
  position:relative;
}
ul {
  display:flex;
  top:0px;
  z-index:10;
  padding-bottom:14px;
}
li {
  list-style:none;
  flex:1;
}
li:last-child {
  border-right:1px solid #DDD;
}
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
.bg-purple {
  border-top:3px solid #A32362;
}
.bg-blue {
  border-top:3px solid #0097CF;
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
  ul {
    display:none;
  }
  td,th {
    display:table-cell !important;
  }
  td,th {
    width: 330px;
  
  }
  td+td, th+th {
    width: auto;
  }
}

.btn {
  padding: 19px 50px;
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

</style>
@endsection

@section('content')

<!-- Slider Section Start -->
  <section class="page__img" style="background-image: url('{{ asset('web/img/blog_bg.jpg') }}')">
    <div class="container">
      <div class="row">
        <div class="title__wrapp">
          <div class="page__subtitle title__grey">Try premiuim</div>
          <h1 class="page__title">Pricing plans</h1>
        </div>
      </div>
    </div>
  </section><!-- Slider Section End -->


<article class="mt-5">

<ul>
  <li class="bg-purple">
    <button>Basic</button>
  </li>
  <li class="bg-blue">
    <button>Standard </button>
  </li>
  <li class="bg-blue active">
    <button>Professional</button>
  </li>
  <li class="bg-blue">
    <button>Plus</button>
  </li>
</ul>  

<table class="pricing">
  <thead>
    <tr>
      <th ></th>
      <th class="bg-purple">Basic</th>
      <th class="bg-blue">Standard</th>
      <th class="bg-blue default">Professional</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Yearly price</td>
      <td><span class="txt-top">&dollar;</span><span class="txt-l">19.99 USD</span></td>
      <td><span class="txt-top">&dollar;</span><span class="txt-l">39.99 USD</span></td>
      <td class="default"><span class="txt-top">&dollar;</span><span class="txt-l">59.99 USD</span></td>
      
    </tr>
    <tr>
      <td colspan="4" class="sep">Profile</td>
    </tr>
    <tr>
      <td>Unique URL based on legal name</td>
      <td><span class="tick">&#10004;</span></td>
      <td><span class="tick">&#10004;</span></td>
      <td class="default"><span class="tick">&#10004;</span></td>
      
    </tr>
    <tr>
      <td>Contact Info</td>
      <td><span class="tick">&#10004;</span></td>
      <td><span class="tick">&#10004;</span></td>
      <td class="default"><span class="tick">&#10004;</span></td>
      
    </tr>
     
    <tr>
      <td>Pictures</td>
      <td><span class="tick">2</span></td>
      <td><span class="tick">5</span></td>
      <td class="default"><span class="tick">15</span></td>
      
    </tr>

    <tr>
      <td>Resume</td>
      <td><span class="tick">&#10004;</span></td>
      <td><span class="tick">&#10004;</span></td>
      <td class="default"><span class="tick">Resume Builder Wizard with onscreen formatted resume and generated .pdf resume available for download.</span></td>
      
    </tr>

    <tr>
      <td colspan="4" class="sep">Communications</td>
    </tr>
    <tr>
      <td>Link to Social Media</td>
      <td><span class="tick"></span></td>
      <td><span class="tick">&#10004; (1)</span></td>
      <td><span class="tick">&#10004; (unlimited)</span></td>
      
    </tr>
    <tr>
      <td>Profile includes Email Me button</td>
      <td><span class="tick">&#10004;</span></td>
      <td><span class="tick">&#10004;</span></td>
      <td><span class="tick">&#10004;</span></td>
      
    </tr>
    <tr>
      <td>Ability to send a short professional message including you’re your profile URL to a list of comma delimited email addresses</td>
      <td><span class="tick"></span></td>
      <td><span class="tick">&#10004;</span></td>
      <td><span class="tick">&#10004;</span></td>
      
    </tr>
    <tr>
      <td>Access to Community Forum</td>
      <td><span class="tick"></span></td>
      <td><span class="tick">&#10004;</span></td>
      <td><span class="tick">&#10004;</span></td>
      
    </tr>
    <tr>
      <td>Apply Now button on casting Community Posts</td>
      <td><span class="tick"></span></td>
      <td><span class="tick"></span></td>
      <td><span class="tick">&#10004;</span></td>
      
    </tr>
    <tr>
      <td>Agent-specific email me button. Agents can contact you directly for opportunities</td>
      <td><span class="tick"></span></td>
      <td><span class="tick"></span></td>
      <td><span class="tick">&#10004;</span></td>
      
    </tr>

    <tr>
      <td colspan="4" class="sep">Professional Development </td>
    </tr>

    <tr>
      <td>Free “The Talent Guide” with 3 referrals ($50 value)</td>
      <td><span class="tick">&#10004;</span></td>
      <td><span class="tick">&#10004;</span></td>
      <td><span class="tick">&#10004;</span></td>
      
    </tr>
    <tr>
      <td>Invitations to live, online training sessions (Cost = $4.99 per session)</td>
      <td><span class="tick"></span></td>
      <td><span class="tick">&#10004;</span></td>
      <td><span class="tick">&#10004;</span></td>
      
    </tr>
    <tr>
      <td>Invitations to live, online training sessions (Cost = $4.99 per session)</td>
      <td><span class="tick"></span></td>
      <td><span class="tick"></span></td>
      <td><span class="tick">&#10004;</span></td>
      
    </tr>
    <tr>
      <td></td>
      <td><button class="cd-btn btn btn__red secondary">Subscribe</button></td>
      <td><button class="cd-btn btn btn__red secondary">Subscribe</button></td>
      <td><button class="cd-btn btn btn__red secondary">Subscribe</button></td>
      
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
</script>
@endsection