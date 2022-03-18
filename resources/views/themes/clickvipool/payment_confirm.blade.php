
@include('themes.clickvipool.header')
<section class="page">

    <!-- ===  Page header === -->

    <div class="page-header" style="background-image:url({!! asset('public/images/page_header_background.jpg') !!})">

        <div class="container">
            <h2 class="title">Reservation completed</h2>
            <p>Thank you!</p>
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
                    <li class="col-md-4 active">
                        <a href="#"><span data-text="Checkout"></span></a>
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

                                <div class="white-block">

                                    <div class="h4">Guest information</div>

                                    <hr>

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
                                                <span>{!! auth()->user()->full_name !!}</span>
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

                                </div> <!--/col-md-6-->

                            </div>

                            <!-- === right content === -->

                            <div class="col-md-6">
                                <div class="white-block">

                                    <div class="h4">Reservation details</div>

                                    <hr>

                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>Booking ID</strong> <br>
                                                <a href="{!! url('pool_details',$result->slug) !!}">PBS-{!! $result->id; !!}</a>
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <strong>Transaction ID</strong> <br>
                                                <span>{!! $result->payment_details->transaction_id !!}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>Booking date</strong> <br>
                                                <span>{!! $result->pool->session_wise_price()->find($result->session_wise_pool_id)->date !!}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <strong>Time slot</strong> <br>
                                                <span>
                                                    {!! $booking_session_time_slot->title .'-'.$booking_session_time_slot->week_day.'-('. date('h:i a',strtotime($booking_session_time_slot->start_from)) . '-'. date('h:i a',strtotime($booking_session_time_slot->end_at)) .')' !!}
                                                </span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="h4">Payment details</div>

                                    <hr>

                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>Transaction time</strong> <br>
                                                <span>{!! $result->payment_details->created_at->toDateTimeString() !!}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <strong>Amount</strong><br>
                                                <span>{!! $result->payment_details->amount !!}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>#Receipt url</strong> <br>
                                                <span>
                                                    <a target="_blank" href="{!! $result->payment_details->receipt_url !!}">Click here</a>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <strong>Paid status</strong><br>
                                                <span class="badge">{!! $result->payment_details->paid_status ? 'Paid' : 'Due' !!}</span>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!--/container-->
    </div> <!--/checkout-->

</section>


@include('themes.clickvipool.footer')