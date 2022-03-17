        <!-- ========================  Rooms ======================== -->

        <section class="rooms rooms-widget">

            <!-- === rooms header === -->

            <div class="section-header">
                <div class="container">
                    <h2 class="title">Recent Listed Pool <a href="#" class="btn btn-sm btn-clean-dark">View all</a></h2>
                    <p>Designed as a privileged almost private place where you'll feel right at home</p>
                </div>
            </div>

            <!-- === rooms content === -->

            <div class="container">

                <div class="owl-rooms owl-theme">

                    <!-- === rooms item === -->
                    <?php $__currentLoopData = $recentPools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentpool): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <article>
                            <div class="image">
                                <a href="<?php echo url('pool_details',$recentpool->id); ?>">
                                    <img src="<?php echo e(asset('public/uploads/'.$recentpool->images->first()->name)); ?>" alt="" />
                                </a>
                            </div>
                            <div class="details">
                                <div class="text">
                                    <h3 class="title"><a href="#"><?php echo e($recentpool->title); ?></a></h3>
                                    <p>Total Session: <?php echo e($recentpool->session_wise_price->count()); ?></p>
                                </div>
                                <div class="book">
                                    <div>
                                        <a href="<?php echo url('pool_details',$recentpool->uri); ?>" class="btn btn-main">Book now</a>
                                    </div>
                                    <div>
                                        <span class="price h4">AED <?php echo e($recentpool->session_wise_price->first()->price); ?></span>
                                        <span>Occupancy: <?php echo e($recentpool->occupancy); ?></span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div><!--/owl-rooms-->
            </div> <!--/container-->
        </section>
