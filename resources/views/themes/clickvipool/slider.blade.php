        <!-- ========================  Header content ======================== -->

        <section class="frontpage-slider">
            <div class="owl-slider owl-slider-header owl-slider-fullscreen">

                <!-- === slide item === -->

                <div class="item" style="background-image:url({{ asset('public/themes/clickvipool/assets/images/slide-2.jpg')}})">
                    <!-- <div class="box text-center">
                        <div class="container">
                            <div class="rating animated" data-animation="fadeInDown">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <h2 class="title animated h1" data-animation="fadeInDown">
                                A moment of <br /> <span>pure prestige</span>
                            </h2>
                            <div class="desc animated" data-animation="fadeInUp">
                                Lavish social and business events
                            </div>
                            <div class="desc animated" data-animation="fadeInUp">
                                and unforgettable weddings.
                            </div>
                            <div class="animated" data-animation="fadeInUp">
                                <a href="#" class="btn btn-clean">Buy this template</a>
                            </div>
                        </div>
                    </div> -->
                </div>

                <!-- === slide item === -->

                <div class="item" style="background-image:url({{ asset('public/themes/clickvipool/assets/images/slide-1.jpg')}})">
                    <!-- <div class="box text-center">
                        <div class="container">
                            <h2 class="title animated h1" data-animation="fadeInDown">
                                The privacy and <br />
                                individuality of a custom
                            </h2>
                            <div class="desc animated" data-animation="fadeInUp">
                                The Residences have their own dedicated private entrance as well <br />
                                as an anonymous "celebrity" entrance, for ultimate privacy.
                            </div>
                            <div class="animated" data-animation="fadeInUp">
                                <a href="#" class="btn btn-clean">Virtual tour</a>
                            </div>
                        </div>
                    </div> -->
                </div>

                <!-- === slide item === -->

                <div class="item" style="background-image:url({{ asset('public/themes/clickvipool/assets/images/slide-3.jpg')}})">
                    <!-- <div class="box text-center">
                        <div class="container">
                            <div class="rating animated" data-animation="fadeInDown">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <h2 class="title animated h1" data-animation="fadeInDown">Fairmont managed!</h2>
                            <div class="desc animated" data-animation="fadeInUp">The elegant Champagne Bar, the stylish Colina Club.</div>
                            <div class="desc animated" data-animation="fadeInUp">Guestrooms and luxurious suites</div>
                            <div class="animated" data-animation="fadeInUp">
                                <a href="#" class="btn btn-clean">Get insipred</a>
                            </div>
                        </div>
                    </div> -->
                </div>

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
                            </div>
                        </div>

                        <!--=== date departure ===-->

                        <div class="col-xs-4 col-sm-4">
                            <div class="location" data-text="Location">
                                <strong>Select Location</strong>
                            <div class="form-group">
                                <input type="text" value="" id="location" name="address" class="form-control" style="margin-top: 10px;margin-left: -10px;background: #cccccc6e;">
                            </div>
                            </div>
                        </div>

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

                        <div class="col-xs-12 col-sm-4">
                            <a href="#" class="btn btn-clean">
                                Find Your Pool
                                <small>Best Prices Guaranteed</small>
                            </a>
                        </div>

                    </div> <!--/row-->
                </div><!--/booking-wrapper-->
            </div> <!--/container-->
        </section>