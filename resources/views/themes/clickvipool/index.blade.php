
@include('themes.clickvipool.header')

@include('themes.clickvipool.slider')

@include('themes.clickvipool.recent')

        <!-- ========================  Stretcher widget ======================== -->


        <!-- ========================  Blog ======================== -->

        <section class="blog blog-widget">

            <!-- === stretcher header === -->

            <div class="section-header">
                <div class="container">
                    <h2 class="title">Latest Blogs <a href="#" class="btn btn-sm btn-clean-dark">Explore more</a></h2>
                    <p>
                        Events, place to go, tour info & more
                    </p>
                </div>
            </div>

            <div class="container">
                <div class="row">

                    <!-- === article item === -->

                    <div class="col-sm-4">
                        <a href="#">
                            <article>
                                <div class="image">
                                    <img src="{{ asset('public/themes/clickvipool/assets/images/activity-3.jpg')}}" alt="" />
                                </div>
                                <div class="text">
                                    <div class="time">
                                        <span>15</span>
                                        <span>03</span>
                                        <span>2022</span>
                                    </div>
                                    <h2 class="h4 title">
                                        What to do when holidays go wrong
                                    </h2>
                                </div>
                            </article>
                        </a>
                    </div>

                    <!-- === article item === -->

                    <div class="col-sm-4">
                        <a href="#">
                            <article>
                                <div class="image">
                                    <img src="{{ asset('public/themes/clickvipool/assets/images/activity-4.jpg')}}" alt="" />
                                </div>
                                <div class="text">
                                    <div class="time">
                                        <span>15</span>
                                        <span>03</span>
                                        <span>2022</span>
                                    </div>
                                    <h2 class="h4 title">
                                        Everything you need to know about vaccinations
                                    </h2>
                                </div>
                            </article>
                        </a>
                    </div>

                    <!-- === article item === -->

                    <div class="col-sm-4">
                        <a href="#">
                            <article>
                                <div class="image">
                                    <img src="{{ asset('public/themes/clickvipool/assets/images/activity-5.jpg')}}" alt="" />
                                </div>
                                <div class="text">
                                    <div class="time">
                                        <span>15</span>
                                        <span>03</span>
                                        <span>2022</span>
                                    </div>
                                    <h2 class="h4 title">
                                        Six simple ways to save money on airport car parking
                                    </h2>
                                </div>
                            </article>
                        </a>
                    </div>
                </div> <!--/row-->
            </div> <!--/container-->
        </section>
        <!-- ======================== Quotes ======================== -->
        <section class="quotes quotes-slider" style="background-image:url({{ asset('public/themes/clickvipool/assets/images/header-1.jpg')}})">
            <div class="container">
                <!-- === Quotes header === -->
                <div class="section-header">
                    <h2 class="title">Testimonials</h2>
                    <p>What other think about us</p>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="quote-carousel">
                            <!-- === quoute item === -->
                            <div class="quote">
                                <div class="text">
                                    <h4>Jenna Hale</h4>
                                    <p>Ipsum dolore eros dolore <br />dolor dolores sit iriure</p>
                                </div>
                                <div class="more">
                                    <div class="rating">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- === quoute item === -->
                            <div class="quote">
                                <div class="text">
                                    <h4>Glen Jordan</h4>
                                    <p>Ipsum dolore eros dolore <br />dolor dolores sit iriure</p>
                                </div>
                                <div class="more">
                                    <div class="rating">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- === quoute item === -->
                            <div class="quote">
                                <div class="text">
                                    <h4>Lea Nils</h4>
                                    <p>Ipsum dolore eros dolore <br />dolor dolores sit iriure</p>
                                </div>
                                <div class="more">
                                    <div class="rating">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- === quoute item === -->
                            <div class="quote">
                                <div class="text">
                                    <h4>Nora Star</h4>
                                    <p>Ipsum dolore eros dolore <br />dolor dolores sit iriure</p>
                                </div>
                                <div class="more">
                                    <div class="rating">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- === quoute item === -->
                            <div class="quote">
                                <div class="text">
                                    <h4>Glen Jordan</h4>
                                    <p>Ipsum dolore eros dolore <br />dolor dolores sit iriure</p>
                                </div>
                                <div class="more">
                                    <div class="rating">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                            </div>
                        </div> <!--/quote-carousel-->
                    </div>
                </div> <!--/row-->
            </div> <!--/container-->
        </section>
@include('themes.clickvipool.footer')