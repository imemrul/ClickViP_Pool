
<?php echo $__env->make('themes.clickvipool.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<section class="page">

    <!-- ===  Page header === -->

    <div class="page-header" style="background-image:url(<?php echo e(asset('public/themes/clickvipool/assets/images/header-1.jpg')); ?>)">

        <div class="container">
            <h2 class="title"><?php echo $result->title; ?></h2>
        </div>

    </div>

    <!-- ===  Page wrapper === -->

    <div class="image-blocks image-blocks-category">
        <div class="container">
            <div class="about">
                <div class="text-block">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <?php echo $result->post; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="subscribe">
    <div class="container">
        <div class="box">
            <h2 class="title">Subscribe</h2>
            <div class="text">
                <p>&amp; receive free premium gifts</p>
            </div>
            <div class="form-group">
                <input type="text" value="" placeholder="Subscribe" class="form-control">
                <button class="btn btn-sm btn-main">Go</button>
            </div>
        </div>
    </div>
</section>



<?php echo $__env->make('themes.clickvipool.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>