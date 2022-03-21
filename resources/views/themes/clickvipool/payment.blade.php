@include('themes.clickvipool.header')
<section class="page">

    <!-- ===  Page header === -->

    <div class="page-header" style="background-image:url({!! asset('public/images/page_header_background.jpg') !!})">
        <div class="container">
            <h2 class="title">Confirm your reservation</h2>
            <p>Guest information</p>
        </div>
    </div>

    <!-- ===  Step wrapper === -->

    <div class="step-wrapper">
        <div class="container">
            <div class="stepper">
                <ul class="row">
                    <li class="col-md-4 active">
                        <a href="#"><span data-text="Room & rates"></span></a>
                    </li>
                    <li class="col-md-4 active">
                        <a href="#"><span data-text="Reservation"></span></a>
                    </li>
                    <li class="col-md-4">
                        <a href="#"><span
                                    data-text="Checkout"></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- ===  Checkout === -->

    <div class="checkout">

        <div class="container">

            <div class="clearfix">

                <!-- ========================  Note block ======================== -->

                <div class="cart-wrapper">

                    <div class="note-block">

                        <div class="row">

                            <!-- === left content === -->

                            <div class="col-md-6">

                                <!-- === login-wrapper === -->

                                <div class="login-wrapper">

                                    <div class="white-block">

                                        <div class="login-block login-block-signup">

                                            <div class="h4">Guest details</div>

                                            <hr/>

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <strong>Name</strong> <br>
                                                        <span>{!! auth()->user()->full_name !!}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <strong>Email</strong><br>
                                                        <span>{!! auth()->user()->email !!}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <strong>Phone</strong><br>
                                                        <span>{!! auth()->user()->phone !!}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <strong>Address</strong><br>
                                                        <span>{!! auth()->user()->address !!}</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div> <!--/signup-->
                                    </div>
                                </div> <!--/login-wrapper-->
                            </div> <!--/col-md-6-->
                            <!-- === right content === -->

                            <div class="col-md-6">

                                <div class="white-block">

                                    <div class="h4">Payment section</div>

                                    <hr/>
                                    <div class="row">

                                        <div class="col-xs-12">
                                            <strong>Powered by Stripe</strong> <br/>
                                            <p>
                                                <small>(MasterCard, Maestro, Visa, Visa Electron, JCB and American Express)</small>
                                            </p>
                                        </div>

                                        <div class="col-md-12">

                                            <div class="panel panel-default credit-card-box">

                                                <div class="panel-heading display-table">

                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                            <h3 class="panel-title display-td">Payment Details</h3>
                                                        </div>
                                                        <div class="col-xs-6 text-right">
                                                            <div class="display-td">

                                                                <div>
                                                                    <i class="fa fa-cc-visa"></i>
                                                                    <i class="fa fa-cc-mastercard"></i>
                                                                    <i class="fa fa-cc-discover"></i>
                                                                    <i class="fa fa-cc-amex"></i>
                                                                    <i class="fa fa-cc-diners-club"></i>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="panel-body">

                                                    @if (Session::has('error_message'))

                                                        <div class="alert alert-danger text-center">

                                                            <a href="#" class="close" data-dismiss="alert"
                                                               aria-label="close">×</a>

                                                            <p>{{ Session::get('error_message') }}</p>
                                                            @if(Session::has('transaction_error'))
                                                                <p>{!! Session::get('transaction_error') !!}</p>
                                                            @endif

                                                        </div>

                                                    @endif

                                                    <form role="form" action="{!! url('booking/post_payment') !!}"
                                                          method="post" class="require-validation"

                                                          data-cc-on-file="false"

                                                          data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"

                                                          id="payment-form">
                                                        {!! Form::hidden('booking_id',$result->id) !!}
                                                        <div class='form-row row'>

                                                            <div class='col-xs-12 form-group required'>

                                                                <label class='control-label'>Name on Card</label> <input class='form-control' size='4' type='text' value="Demo account for payment testing">

                                                            </div>

                                                        </div>


                                                        <div class='form-row row'>

                                                            <div class='col-xs-12 form-group card required'>

                                                                <label class='control-label'>Card Number</label>
                                                                <input autocomplete='off' class='form-control card-number' size='20' value="4242424242424242 " type='text'>

                                                            </div>

                                                        </div>


                                                        <div class='form-row row'>

                                                            <div class='col-xs-12 col-md-4 form-group cvc required'>

                                                                <label class='control-label'>CVC</label>
                                                                <input
                                                                        autocomplete='off'

                                                                        class='form-control card-cvc'
                                                                        placeholder='ex. 311' size='4'
                                                                        value="111"
                                                                        type='text'>

                                                            </div>

                                                            <div class='col-xs-12 col-md-4 form-group expiration required'>

                                                                <label class='control-label'>Expiration Month</label>
                                                                <input

                                                                        class='form-control card-expiry-month'
                                                                        placeholder='MM' size='2'
                                                                        value="12"
                                                                        type='text'>

                                                            </div>

                                                            <div class='col-xs-12 col-md-4 form-group expiration required'>

                                                                <label class='control-label'>Expiration Year</label>
                                                                <input

                                                                        class='form-control card-expiry-year'
                                                                        placeholder='YYYY' size='4'
                                                                        value="2025"
                                                                        type='text'>

                                                            </div>

                                                        </div>


                                                        <div class='form-row row'>

                                                            <div class='col-md-12 error form-group hide'>

                                                                <div class='alert-danger alert'>Please correct the
                                                                    errors and try

                                                                    again.
                                                                </div>

                                                            </div>

                                                        </div>


                                                        <div class="row">

                                                            <div class="col-xs-12">

                                                                <button class="btn btn-primary btn-lg btn-block"
                                                                        type="submit">Pay Now (AED 100)
                                                                </button>

                                                            </div>

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
                </div>

                <!-- ========================  Cart wrapper ======================== -->



            </div>

        </div> <!--/container-->
    </div> <!--/checkout-->

</section>






@include('themes.clickvipool.footer')

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>



<script type="text/javascript">

    $(function() {

        var $form         = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {

            var $form         = $(".require-validation"),

                inputSelector = ['input[type=email]', 'input[type=password]',

                    'input[type=text]', 'input[type=file]',

                    'textarea'].join(', '),

                $inputs       = $form.find('.required').find(inputSelector),

                $errorMessage = $form.find('div.error'),

                valid         = true;

            $errorMessage.addClass('hide');



            $('.has-error').removeClass('has-error');

            $inputs.each(function(i, el) {

                var $input = $(el);

                if ($input.val() === '') {

                    $input.parent().addClass('has-error');

                    $errorMessage.removeClass('hide');

                    e.preventDefault();

                }

            });



            if (!$form.data('cc-on-file')) {

                e.preventDefault();

                Stripe.setPublishableKey($form.data('stripe-publishable-key'));

                Stripe.createToken({

                    number: $('.card-number').val(),

                    cvc: $('.card-cvc').val(),

                    exp_month: $('.card-expiry-month').val(),

                    exp_year: $('.card-expiry-year').val()

                }, stripeResponseHandler);

            }



        });



        function stripeResponseHandler(status, response) {

            if (response.error) {

                $('.error')

                    .removeClass('hide')

                    .find('.alert')

                    .text(response.error.message);

            } else {

                var token = response['id'];

                $form.find('input[type=text]').empty();

                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");

                $form.get(0).submit();

            }

        }



    });

</script>