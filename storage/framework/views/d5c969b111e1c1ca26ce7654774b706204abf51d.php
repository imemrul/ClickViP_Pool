
<?php echo $__env->make('themes.clickvipool.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


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
        <li>Test</li>
    </ul>
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

<?php echo $__env->make('themes.clickvipool.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>