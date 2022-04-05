        <!-- ========================  Header content ======================== -->

        <section class="frontpage-slider">
            <div class="owl-slider owl-slider-header owl-slider-fullscreen">
                <!-- === slide item === -->
                @foreach($sliders as $slider)
                <div class="item" style="background-image:url({{ asset($slider->slide_image)}})">
                    <div class="box text-center">
                        <div class="container">
                            {{-- <div class="rating animated" data-animation="fadeInDown">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div> --}}
                            <div class="col-xs-8 col-sm-8"></div>
                            <div class="col-xs-4 col-sm-4" style="background:rgb(0 0 0 / 50%);padding:50px 0">
                                <h2 class="title animated h1" data-animation="fadeInDown">
                                   {!!$slider->title!!}
                                </h2>
                                <div class="desc animated" data-animation="fadeInUp">
                                    {!!$slider->descOne!!}
                                </div>
                                <div class="desc animated" data-animation="fadeInUp">
                                    {!!$slider->descYwo!!}
                                </div>
                                <div class="animated" data-animation="fadeInUp">
                                    <a href="{!!$slider->btnUrl!!}" class="btn btn-clean">Read More..</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- === slide item === -->
            </div> <!--/owl-slider-->
        </section>
        <!-- ======================== Booking ======================== -->
        <section class="booking booking-inner">
            <div class="section-header hidden">
                <div class="container">
                    <h2 class="title">Booking & reservations</h2>
                </div>
            </div>
            <div class="booking-wrapper">
                <div class="container">
                    <div class="row">
                        <!--=== date arrival ===-->
                        <div class="col-xs-4 col-sm-2">
                            <div class="date" id="dateArrival" data-text="Select Date">
                                <input class="datepicker" readonly="readonly" />
                                <div class="date-value"></div>
                                <input type="hidden" id="bookingDate" name="booking_date" value="">
                            </div>
                        </div>
                        <!--=== date departure ===-->
                        <div class="col-xs-4 col-sm-4">
                            <div class="location" data-text="Location">
                                <strong>Select Location</strong>
                            <div class="form-group">
                                <input type="text" value="" id="location" name="haddress" class="typeahead form-control" style="margin-top: 10px;margin-left: -10px;background: #00000000;font-size:16px">
                            </div>
                            <div id="suggesstion-box"></div> 
                            </div>
                        </div>
                        <script type="application/javascript">
                            // To select Location
                            function selectPoolAdd(val) {
                                $("#location").val(val);
                                $("#suggesstion-box").hide();
                                }
                        </script>
                        <!--=== guests ===-->
                        <div class="col-xs-4 col-sm-2">
                            <div class="guests" data-text="Guests">
                                <div class="result">
                                    <input class="qty-result" type="text" value="2" id="qty-result" readonly="readonly" />
                                    <div class="qty-result-text date-value" id="qty-result-text"></div>
                                </div>
                                <!--=== guests list ===-->
                                <ul class="guest-list">
                                    <li class="header">
                                        Please choose number of guests <span class="qty-apply"><i class="icon icon-cross"></i></span>
                                    </li>
                                    <!--=== adults ===-->
                                    <li class="clearfix">
                                        <!--=== Adults value ===-->
                                        <div>
                                            <input class="qty-amount" value="2" type="text" id="ticket-adult" data-value="2" readonly="readonly" />
                                        </div>
                                        <div>
                                            <span>Select <small>Person</small></span>
                                        </div>
                                        <!--=== Add/remove quantity buttons ===-->
                                        <div>
                                            <input class="qty-btn qty-minus" value="-" type="button" data-field="ticket-adult" />
                                            <input class="qty-btn qty-plus" value="+" type="button" data-field="ticket-adult" />
                                        </div>
                                    </li>
                                    <!--=== chilrens ===-->
                                    <li class="clearfix">
                                        <!--=== Adults value ===-->
                                        <div>
                                            <input class="qty-amount" value="0" type="text" id="ticket-children" data-value="0" readonly="readonly" />
                                        </div>
                                        <!--=== Label ===-->
                                        <div>
                                            <span>Children <small>2-11 years</small></span>
                                        </div>
                                        <!--=== Add/remove quantity buttons ===-->
                                        <div>
                                            <input class="qty-btn qty-minus" value="-" type="button" data-field="ticket-children" />
                                            <input class="qty-btn qty-plus" value="+" type="button" data-field="ticket-children" />
                                        </div>
                                    </li>
                                    <!--=== Infants ===-->
                                    <li class="clearfix">
                                        <!--=== Adults value ===-->
                                        <div>
                                            <input class="qty-amount" value="0" type="text" id="ticket-infants" data-value="0" readonly="readonly" />
                                        </div>
                                        <!--=== Label ===-->
                                        <div>
                                            <span>Infants <small>Under 2 years</small></span>
                                        </div>
                                        <!--=== Add/remove quantity buttons ===-->
                                        <div>
                                            <input class="qty-btn qty-minus" value="-" type="button" data-field="ticket-infants" />
                                            <input class="qty-btn qty-plus" value="+" type="button" data-field="ticket-infants" />
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--=== button ===-->
                        {!! Form::open(['url'=>URL::to('findpool'),'class'=>'form','files'=>'false']) !!}
                        <input type="hidden" id="date" name="booking_date">
                        <input type="hidden" id="address" name="address">
                        <input type="hidden" id="guest" name="guest">
                        <div class="col-xs-12 col-sm-4">
                            <button class="btn btn-clean" id="findPool">Find Your Pool
                                <small>Best Prices Guaranteed</small></button>
                            {{-- <a href="#" class="btn btn-clean" id="findPool">
                                Find Your Pool
                                <small>Best Prices Guaranteed</small>
                            </a> --}}
                        </div>
                        {!! Form::close() !!}
                    </div> <!--/row-->
                </div><!--/booking-wrapper-->
            </div> <!--/container-->
        </section>