
<?php echo $__env->make('themes.clickvipool.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('themes.clickvipool.slider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('themes.clickvipool.recent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- ========================  Stretcher widget ======================== -->

        <section class="stretcher-wrapper">

            <!-- === stretcher header === -->

            <div class="section-header">
                <div class="container">
                    <h2 class="title">Pool facilities <a href="#" class="btn btn-sm btn-clean-dark">Explore more</a></h2>
                    <p>
                        With the best luxury spa, salon and fitness experiences
                    </p>
                </div>
            </div>

            <!-- === stretcher === -->

            <ul class="stretcher">
                <?php $__currentLoopData = $facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- === stretcher item === -->
  
                <li class="stretcher-item" style="background-image:url(<?php echo e(asset('public/uploads/'.$facility->image)); ?>);">
                    <!--logo-item-->
                    <div class="stretcher-logo">
                        <div class="text">
                            <span class="text-intro h4"><?php echo e($facility->name); ?></span>
                        </div>
                    </div>
                    <!--main text-->
                    <figure>
                        <h4><?php echo e($facility->name); ?></h4>
                        <figcaption><?php echo e($facility->description); ?></figcaption>
                    </figure>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </section>

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
                        <a href="blog-item.html">
                            <article>
                                <div class="image">
                                    <img src="<?php echo e(asset('public/themes/clickvipool/assets/images/activity-3.jpg')); ?>" alt="" />
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
                                    <img src="<?php echo e(asset('public/themes/clickvipool/assets/images/activity-4.jpg')); ?>" alt="" />
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
                                    <img src="<?php echo e(asset('public/themes/clickvipool/assets/images/activity-5.jpg')); ?>" alt="" />
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

        <section class="quotes quotes-slider" style="background-image:url(<?php echo e(asset('public/themes/clickvipool/assets/images/header-1.jpg')); ?>)">
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
                            <a href="#" class="footer-logo"><img src="<?php echo e(asset('public/themes/clickvipool/assets/images/logo.png')); ?>" alt="Alternate Text" /></a>
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
                            <img src="<?php echo e(asset('public/themes/clickvipool/assets/images/logo-footer.png')); ?>" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div> <!--/wrapper-->

    <!--JS files-->
    <script src="<?php echo e(asset('public/themes/clickvipool/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/themes/clickvipool/js/jquery-ui.js')); ?>"></script>
    <script src="<?php echo e(asset('public/themes/clickvipool/js/jquery.bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('public/themes/clickvipool/js/jquery.magnific-popup.js')); ?>"></script>
    <script src="<?php echo e(asset('public/themes/clickvipool/js/jquery.owl.carousel.js')); ?>"></script>
    <script src="<?php echo e(asset('public/themes/clickvipool/js/main.js')); ?>"></script>
</body>

</html>