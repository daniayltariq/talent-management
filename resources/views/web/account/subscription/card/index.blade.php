@extends('web.layouts.app')
@section('title', 'Subscription')
@section('styles')
    <style>
      .btn-stripe{
        color: white;
        background-color: #e77929;
        border-color: #e77929;
        border-radius: 0.4rem;
      }
      
      .pay-tabs {
          margin: 0 0 2em 0;
          padding: 1em 1em 1.5em 1em;
          background: #fff;
          border: 1px solid #e7ebee;
      }

      #payment-head{
        border-top: 1px solid #e77929;
      }

      #payment-head h3 {
          width:53%; 
          font-size: 14px;
          text-align: center;
          margin-bottom: 25px;
          margin-top: 0;
          padding: 2px;
          color: #ffffff;
          text-transform: uppercase;
          background: #e77929;
          border-radius: 0 0 6px 6px;
          font-weight: 500;
          font-family: 'Alegreya Sans', sans-serif;
      }

      .resp-tabs-list {
          list-style: none;
          margin: 0 0 0em 0;
          padding: 0;
      }

      .resp-tab-active {
          color: #B3E03F;
      }

      li.resp-tab-item.resp-tab-active span label {
        border: 3px solid #e77929;
      }

      li.resp-tab-item span .pic {
          width: 100%;
          height: 45px;
          display: block;
          font-size: 1.2rem;
          font-style: italic;
          font-weight: 700;
          color: #e77929;

          border: 1px solid #e7ebee;
          padding: 9px 0px;
          margin-bottom: 15px;
          cursor: pointer;
      }

      

      .resp-tab-item {
          font-size: 14px;
          text-decoration: none;
          color: #a9acb1;
          font-weight: 600;
          cursor: pointer;
          text-align: center;
          list-style: none;
          outline: none;
          -webkit-transition: all 0.3s ease-out;
          -moz-transition: all 0.3s ease-out;
          -ms-transition: all 0.3s ease-out;
          -o-transition: all 0.3s ease-out;
          transition: all 0.3s ease-out;
          text-transform: capitalize;
          display: inline-block;
          margin: 0 4%;
          float: left;
          width: 17%;
      }

      .header {
        background: #000000cf;
      }

     /*  otp modal */

    .digit-group{
      padding: 1.2rem;
    }

    .digit-group input {
      width: 50px;
      height: 50px;
      background-color: white;
      border: 2px solid;
      /* box-shadow: 0px 1px 4px 0px #4e9fe4; */
      line-height: 50px;
      text-align: center;
      font-size: 24px;
      font-family: 'Raleway', sans-serif;
      font-weight: 200;
      color: #777373;
      margin: 0 2px;
    }
    .digit-group .splitter {
      padding: 0 5px;
      color: #404040;
      font-size: 24px;
    }

    .digit-group input:focus{
      box-shadow: 0px 1px 4px 0px #4e9fe4;
    }
    .prompt {
      margin-bottom: 20px;
      font-size: 20px;
      padding: 1.5rem;
      color: #404040;
    }

    .success_otp{
      margin-bottom: 20px;
      font-size: 20px;
      padding: 1.5rem;
      color: #df691a;
    }
 
    .bg-disabled{
      background: #eae7e7 !important;
    }

    .otp__tries{
      text-align: center;
      padding: 1rem 17rem !important;
      margin-top: 2rem;
    }

    #card-errors{
      color: red !important;
    }
    /*.popup-contact-wrapper {
        border-radius: 8px;
        border: unset !important;
        border-top: unset !important;
    }*/

    .popup-close:hover {
          background: #df691a !important;
          border-color: #ffffff !important;
      }
      .popup-close {
          border: solid 4px #ffffff !important;
      }

    .popup-inner{
      max-width: 744px;
    }

    .td-color{
      color: #df691a;
      border-bottom: 1px solid;
      cursor: pointer;
    }
    /*  end otp modal */
    </style>
@endsection
@section('content')
@include('web.partials.loader')
<div class="container">
    <div class="row justify-content-center" style="margin-top: 20rem;margin-bottom: 15rem">
        <div class="col-md-offset-3 col-md-6 mt-5 mb-3 pt-5">
            
            <div class="card" style="box-shadow: 0 0 0 1px #e3e8ee; padding: 3rem">
              <div class="row">
                <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="card-header" style="text-align: center;background: #fafcfe;">
                         <p>You will be charged ${{ number_format($plan->cost, 2) }} for {{ $plan->name }} Plan</p>
                          <a href="#" pd-popup-open="popupOTP"></a>
                        </div>
                        {{-- @if (count($paymentMethods) > 0)
                          <div class="pay-tabs">
                            <div id="payment-head"><h3 class="mx-auto">Select Payment Method</h3></div> 
                              <ul class="row resp-tabs-list">
                                @foreach ($paymentMethods as $method)
                                  <li class="resp-tab-item {{$loop->first ? 'resp-tab-active':''}}" data-paymentid="{{$method->id}}" id="payment-option" aria-controls="tab_item-0" role="tab"><span><label class="pic">{{$method->card->brand}}</label>**** {{$method->card->last4}}</span></li>
                                @endforeach
                              </ul>	
                          </div>
                        @endif --}}
                      </div>
                    </div>
                  
                    <div class="row">
                        <div class="col-md-12">
                        <form action="{{ route('subscription.store') }}" method="post" id="payment-form">
                            @csrf                    
                            <div class="form-group">
                                <div class="card-body">
                                <div class="form-group">
                                    {{-- <input class="form-control" id="card-holder-name" placeholder="Card Holder name" type="text"> --}}
                                    <input class="form-control" id="card-holder-email" name="card_holder_email" placeholder="Card Holder email" type="email">
                                </div>
                                
                                    <div id="card-element" class="form-control">
                                    <!-- A Stripe Element will be inserted here. -->
                                    </div>
                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>
                                    <input type="hidden" name="plan" value="{{ $plan->id }}" />
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button class="btn btn-stripe form-control" style="padding: 0px 50px;" id="card-button" type="button" data-secret="{{ $intent->client_secret }}">Pay</button>
                            </div>
                        </form>
                        </div>
                    </div>
                  
                </div>
              </div>
                
            </div>
        </div>
    </div>
</div>
<div class="popup" pd-popup="popupOTP">
  <div class="popup-inner">
     <div class="popup-contact-wrapper">
        {{-- <h4 class="popup-header mx-auto">dw dwwd</h4> --}}

          <div class="row">
              <div class="col-md-12">
                <div class="prompt">
                  A verification code was sent to <span><b id="otp_mail"></b></span>. <br>
                  Please enter the verification code to validate and activate your account.
                </div>
                <div class="success_otp" id="success_otp">
                  Please wait while we build your account.
                </div>
                <form method="get" class="digit-group" data-group-name="digits" data-autosubmit="false" autocomplete="off">
                  <input type="text" id="digit-1" name="digit-1" data-next="digit-2" />
                  <input type="text" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" />
                  <input type="text" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" />
                  <span class="splitter">&ndash;</span>
                  <input type="text" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3" />
                  <input type="text" id="digit-5" name="digit-5" data-next="digit-6" data-previous="digit-4" />
                  <input type="text" id="digit-6" name="digit-6" data-previous="digit-5" />
                  <br>
                  <p class="otp__tries">Please enter the 6 digit code here. <br>There is a limit of <span id="otp_tries">3</span> attempts.</p>
                  <p>Not recieved ?<a class="td-color" id="resend_email" onclick="resendOtp()">Resend email</a></p>
                </form>
              </div>
          </div>
        <a class="popup-close" pd-popup-close="popupOTP" href="#"> </a>
     </div>
     
  </div>
</div>

@endsection
@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
  $(document).ready(function(){
    $('#success_otp').hide();
  })
</script>
<script>
    // Create a Stripe client.
    var stripe = Stripe('{{config('app.STRIPE_KEY')}}');
    console.log(stripe);
    // Create an instance of Elements.
    var elements = stripe.elements();
    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
      base: {
        color: '#32325d',
        lineHeight: '18px',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
          color: '#aab7c4'
        }
      },
      invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
      }
    };
    // Create an instance of the card Element.
    var card = elements.create('card', {style: style});
    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');
    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function(event) {
      var displayError = document.getElementById('card-errors');
      if (event.error) {
        displayError.textContent = event.error.message;
      } else {
        displayError.textContent = '';
      }
    });
    // Handle form submission.
    var form = document.getElementById('payment-form');
    const cardHolderName = document.getElementById('card-holder-email');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;
    cardButton.addEventListener('click', async (e) => {
      event.preventDefault();
      fullPageLoader(true);
      const { setupIntent, error } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: card,
                    billing_details: { name: cardHolderName.value }
                }
            }
        );
        if (error) {
          
          fullPageLoader(false);
            var errorElement = document.getElementById('card-errors');
            if (error.code=='parameter_invalid_empty') {
              toastr.error('email not valid');
              location.reload();
            }
            else if (error.code=='setup_intent_unexpected_state') {
              toastr.error('Please try again');
              location.reload();
            } else {
              errorElement.textContent = error.message;
            }
            
        } else {
            stripeTokenHandler(setupIntent);
        }

      /* stripe.createToken(card).then(function(result) {
        if (result.error) {
        // Inform the user if there was an error.
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
        } else {
        // Send the token to your server.
        stripeTokenHandler(setupIntent);
        }
      }); */
    });
    // Submit the form with the token ID.
    function stripeTokenHandler(setupIntent) {
      // Insert the token ID into the form so it gets submitted to the server
      var form = document.getElementById('payment-form');
      var hiddenInput = document.createElement('input');
      hiddenInput.setAttribute('type', 'hidden');
      hiddenInput.setAttribute('name', 'paymentMethod');
      hiddenInput.setAttribute('value', setupIntent.payment_method);
      form.appendChild(hiddenInput);
      // Submit the form
      /* form.submit(); */
      sendOtpOnEmail();
    }
</script>

{{-- GET paymentMethods --}}
<script>
  $(document).on('click','#payment-option', function () {
    /* alert($(this).data('paymentid')); */
    fullPageLoader(true);
    $.get( "{{ route('account.subscription.getPaymentMethod') }}",{
            payment_id: $(this).data('paymentid'),
            plan: $('[name="plan"]').val(),
            _token : "{{ csrf_token() }}"
          }, function( res ) {
            fullPageLoader(false);
            if (res.status=='success') {
                toastr.success(res.message)
            } else if(res.status=='error') {
                toastr.error(res.message)
            }

            window.location.replace("{{route('/')}}");
        /* updateCartByRes(data); */
    });
  });
</script>
{{-- End GET paymentMethods --}}

{{-- OTP modal --}}
<script>
  $('.digit-group').find('input').each(function() {
    $(this).attr('maxlength', 1);
    $(this).on('keyup', function(e) {
      var parent = $($(this).parent());
      
      if(e.keyCode === 8 || e.keyCode === 37) {
        var prev = parent.find('input#' + $(this).data('previous'));
        console.log('if');
        if(prev.length) {
          $(prev).select();
        }
      } 
      else if((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
        var next = parent.find('input#' + $(this).data('next'));
        console.log('elseif');
        if(next.length) {
          console.log('elseif if');
          $(next).select();
        } else {
          console.log('elseif else');
          $(".digit-group input[type=text]").each(function() {
              $(this).prop('disabled',true);
              $(this).addClass('bg-disabled');
          });
          verifyOtp();
          /* if(parent.data('autosubmit')) {
            console.log('elseif else if');
            parent.submit();
          } */
        }
      }
    });
  });
</script>
{{-- End OTP modal --}}

{{-- Send OTP --}}
<script>
  var otpSent=false;

  function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }
 function sendOtpOnEmail()
 {
   if (validateEmail($('#card-holder-email').val())) {
     $.get( "{{ route('subscription.sendOtp') }}",{
        email: $('#card-holder-email').val(),
        _token : "{{ csrf_token() }}"
      }, function( res ) {
        fullPageLoader(false);
        if (res.status=='success') {
            toastr.success(res.message)
            $('#otp_mail').text($('#card-holder-email').val());
            $('[pd-popup-open]').click();
            $('#otp_tries').text(3);
            if (otpSent) {
              $(".digit-group input[type=text]").each(function() {
                $(this).prop('disabled',false);
                $(this).removeClass('bg-disabled');
              });
            }
        } else if(res.status=='error') {
            toastr.error(res.message)
        }
      });
   }
   else{
    fullPageLoader(false);
    toastr.error('email not valid');
    location.reload();
   }
  
 }
</script>
{{-- End Send OTP --}}

{{-- Verify OTP --}}
<script>
  function verifyOtp()
  {
    var otp='';
    $(".digit-group input[type=text]").each(function() {
        otp=otp+$(this).val();
    });
    console.log(otp);
    
    $.get( "{{ route('subscription.verifyOtp') }}",{
      otp: otp,
      _token : "{{ csrf_token() }}"
    }, function( res ) {
      if (res.status=='success') {
        console.log('form submit');
        $('#success_otp').show();
        form.submit();
      } else if(res.status=='error') {
        toastr.error(res.message)
        if (res.tries !=null && res.tries >=0) {
          $('#otp_tries').text(res.tries);
        }
        
        $(".digit-group input[type=text]").each(function() {
            $(this).val('');
            if (res.tries !=null && res.tries <=0) {
              $(this).prop('disabled', true);
              $(this).addClass('bg-disabled');
            }
            else{
              $(this).prop('disabled', false);
              $(this).removeClass('bg-disabled');
            }
            
        });
      }
    });
    
  }
</script>
{{-- End Verify OTP --}}

{{-- resend OTP --}}
<script>
  function resendOtp()
  {
    $(".digit-group input[type=text]").each(function() {
      $(this).val('');
      $(this).prop('disabled',true);
      $(this).addClass('bg-disabled');
    });
    otpSent=true;
    sendOtpOnEmail();
    
  }
</script>
{{-- End R esend OTP --}}
@endsection