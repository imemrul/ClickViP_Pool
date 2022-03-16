<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo Auth::user()->full_name; ?></div>
                <div class="email"><?php echo Auth::user()->email; ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="<?php echo URL::to('logout'); ?>"><i class="material-icons">input</i>Sign Out</a></li>
                        <li role="seperator" class="divider"></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active">
                    <a href="<?php echo URL::to('/'); ?>">
                        <i class="material-icons">home</i>
                        <span>HOME</span>
                    </a>
                </li>
                <?php $__currentLoopData = menu_array(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item['roll_id'] == Auth::user()->roll_id): ?>
                    <?php if(isset($item['sub'])): ?>
                        <li class="">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons"><?php echo $item['icon']; ?></i>
                                <span><?php echo $item['label']; ?></span>
                            </a>
                            <ul class="ml-menu">
                                <?php $__currentLoopData = $item['sub']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="">
                                        <a href="<?php echo $sub_item['link']; ?>"><?php echo $sub_item['label']; ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                        <?php else: ?>
                        <li class="<?= ($i==0) ? 'active': '' ?>">
                            <a href="<?php echo $item['link']; ?>">
                                <i class="material-icons"><?php echo $item['icon']; ?></i>
                                <span><?php echo $item['label']; ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2018 <a href="https://bikroy.com/">Bikroy.com</a>
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>