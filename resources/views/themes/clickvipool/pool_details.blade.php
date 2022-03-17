
@include('themes.clickvipool.header')


<section class="page">

    <!-- ===  Page header === -->

    <div class="page-header" style="background-image:url({!! asset('public/images/page_header_background.jpg') !!})">
        <div class="container">
            <h2 class="title">Make a booking</h2>
            <p>Proceed to booking step 2</p>
        </div>
    </div>

    <!-- ===  Checkout steps === -->

    <div class="step-wrapper">
        <div class="container">
            <div class="stepper">
                <ul class="row">
                    <li class="col-md-4 active">
                        <a href="#"><span data-text="Room & rates"></span></a>
                    </li>
                    <li class="col-md-4">
                        <a href="{!! url('pool/payment',$result->slug) !!}"><span data-text="Reservation"></span></a>
                    </li>
                    <li class="col-md-4">
                        <a href="{!! url('pool/payment/confirmation',$result->slug) !!}"><span data-text="Checkout"></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- ===  Checkout === -->

    <div class="checkout">

        <div class="container">

            <div class="clearfix">

                <!-- ========================  Cart wrapper ======================== -->

                <div class="cart-wrapper">

                    <!--cart header -->

                    <div class="cart-block cart-block-header clearfix">
                        <div>
                            <span>Pool type</span>
                        </div>
                        <div class="text-right">
                            <span>Price</span>
                        </div>
                    </div>

                    <!--cart items-->

                    <div class="clearfix">

                        <div class="cart-block cart-block-item clearfix">
                            <div class="image">
                                <a href="#" @click.prevent><img src="{!! asset('public/uploads/'.$result->images->first()->name) !!}" alt=""/></a>
                            </div>
                            <div class="title">
                                <div class="h2"><a href="#">{!! $result->title !!}</a></div>
                                <p>
                                    <strong>Arrival date</strong> <br/> <a href="#">(September 22, 2017)</a>
                                </p>
                                <p>
                                    <strong>Guests</strong> <br/> 2 Adults, 1 Child
                                </p>
                                <p>
                                    <strong>Nights</strong> <br/> 7
                                </p>
                            </div>
                            <div class="price">
                                <span class="final h3">$ 1.998</span>
                                <span class="discount">$ 2.666</span>
                            </div>
                            <!--delete-this-item-->
                            <span class="icon icon-cross icon-delete"></span>
                        </div>

                    </div>

                    <!--cart prices -->

                    <div class="clearfix">
                        <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>Discount 15%</strong>
                            </div>
                            <div>
                                <span>$ 159,00</span>
                            </div>
                        </div>

                        <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>TAX</strong>
                            </div>
                            <div>
                                <span>$ 59,00</span>
                            </div>
                        </div>
                    </div>

                    <!--cart final price -->

                    <div class="clearfix">
                        <div class="cart-block cart-block-footer cart-block-footer-price clearfix">
                            <div>
                                        <span class="checkbox">
                                            <input type="checkbox" id="couponCodeID">
                                            <label for="couponCodeID">Promo code</label>
                                            <input type="text" class="form-control form-coupon" value=""
                                                   placeholder="Enter your coupon code"/>
                                        </span>
                            </div>
                            <div>
                                <div class="h2 title">$ 1259,00</div>
                            </div>
                        </div>
                    </div>

                    <!-- ========================  Cart navigation ======================== -->

                    <div class="clearfix">
                        <div class="cart-block cart-block-footer cart-block-footer-price clearfix">
                            <div>
                                <a href="#" class="btn btn-clean-dark">Change</a>
                            </div>
                            <div>
                                <a href="reservation-2.html" class="btn btn-main">Reservation <span
                                            class="icon icon-chevron-right"></span></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div> <!--/container-->
    </div> <!--/checkout-->

</section>

        <!-- ========================  Subscribe ======================== -->

        <section class="subscribe">
            <div class="container">
                <div class="box">
                    <h2 class="title">Subscribe</h2>
                    <div class="text">
                        <p>& receive free premium gifts</p>
                    </div>
                    <div class="form-group">
                        <input type="text" value="" placeholder="Subscribe" class="form-control" />
                        <button class="btn btn-sm btn-main">Go</button>
                    </div>
                </div>
            </div>
        </section> 

        <!-- ================== Footer  ================== -->

        <footer>
            <div class="container">

                <!--footer links-->
                <div class="footer-links">
                    <div class="row">
                        <div class="col-sm-6 footer-left">
                            <a href="#">Sitemap</a> &nbsp; | &nbsp; <a href="#">Privacy policy</a> | &nbsp; <a href="#">Guest book</a>
                        </div>
                        <div class="col-sm-6 footer-right">
                            <a href="#">Gallery</a> &nbsp; | &nbsp; <a href="#">Reservations</a> | &nbsp; <a href="#">Help center</a>
                        </div>
                    </div>
                </div>

                <!--footer social-->

                <div class="footer-social">
                    <div class="row">
                        <div class="col-sm-12 text-center hidden">
                            <a href="#" class="footer-logo"><img src="{{ asset('public/themes/clickvipool/assets/images/logo.png')}}" alt="Alternate Text" /></a>
                        </div>
                        <div class="col-sm-12 icons">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-sm-12 copyright">
                            <small>Copyright &copy; 2022 &nbsp; | &nbsp; <a href="#">By Click ViP Pool</a></small>
                        </div>
                        <div class="col-sm-12 text-center">
                            <img src="{{ asset('public/themes/clickvipool/assets/images/logo-footer.png')}}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </footer>

@include('themes.clickvipool.footer')