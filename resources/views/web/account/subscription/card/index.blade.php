@extends('web.layouts.app')
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
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin: 10rem">
        <div class="col-md-offset-3 col-md-6 mt-5 mb-3">
            <div class="">
                <p>You will be charged ${{ number_format($plan->cost, 2) }} for {{ $plan->name }} Plan</p>
            </div>
            <div class="card" style="box-shadow: 0 0 0 1px #e3e8ee;">
              <div class="row">
                <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="card-header" style="text-align: center;background: #fafcfe;">
                          <img src="{{asset('images/stripe2.png')}}" style="width: 11%" alt="">
                        </div>
                        @if (count($paymentMethods) > 0)
                          <div class="pay-tabs">
                            <div id="payment-head"><h3 class="mx-auto">Select Payment Method</h3></div> 
                              <ul class="row resp-tabs-list">
                                @foreach ($paymentMethods as $method)
                                  <li class="resp-tab-item {{$loop->first ? 'resp-tab-active':''}}" data-paymentid="{{$method->id}}" id="payment-option" aria-controls="tab_item-0" role="tab"><span><label class="pic">{{$method->card->brand}}</label>**** {{$method->card->last4}}</span></li>
                                @endforeach
                              </ul>	
                          </div>
                        @endif
                      </div>
                    </div>
                  
                    <div class="row">
                        <div class="col-md-12">
                        <form action="{{ route('subscription.store') }}" method="post" id="payment-form">
                            @csrf                    
                            <div class="form-group">
                                <div class="card-body">
                                <div class="form-group">
                                    <input class="form-control" id="card-holder-name" placeholder="Card Holder name" type="text">
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
@endsection
@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
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
const cardHolderName = document.getElementById('card-holder-name');
const cardButton = document.getElementById('card-button');
const clientSecret = cardButton.dataset.secret;
cardButton.addEventListener('click', async (e) => {
  event.preventDefault();
  const { setupIntent, error } = await stripe.confirmCardSetup(
        clientSecret, {
            payment_method: {
                card: card,
                billing_details: { name: cardHolderName.value }
            }
        }
    );
	  if (error) {
        var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
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
  form.submit();
}
</script>

<script>
  $(document).on('click','#payment-option', function () {
    /* alert($(this).data('paymentid')); */
    fullPageLoader(true);
    $.get( "{{ route('account.subscription.getPaymentMethod') }}",{
            payment_id: $(this).data('paymentid'),
            plan: $('[name="plan"]').val(),
            _token : "{{ csrf_token() }}"
          }, function( res ) {
            fullPageLoader(true);
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
@endsection