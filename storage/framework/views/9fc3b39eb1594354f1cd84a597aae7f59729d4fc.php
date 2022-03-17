<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Mobile Web-app fullscreen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">

    <!-- Meta tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo e(asset('public/themes/clickvipool/favicon.ico')); ?>">

    <!--Title-->
    <title>Rent Privet Pool in Dubai</title>

    <!--CSS styles-->
    <link rel="stylesheet" media="all" href="<?php echo e(asset('public/themes/clickvipool/css/bootstrap.css')); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo e(asset('public/themes/clickvipool/css/animate.css')); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo e(asset('public/themes/clickvipool/css/font-awesome.css')); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo e(asset('public/themes/clickvipool/css/linear-icons.css')); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo e(asset('public/themes/clickvipool/css/hotel-icons.css')); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo e(asset('public/themes/clickvipool/css/magnific-popup.css')); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo e(asset('public/themes/clickvipool/css/owl.carousel.css')); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo e(asset('public/themes/clickvipool/css/datepicker.css')); ?>" />
    <link rel="stylesheet" media="all" href="<?php echo e(asset('public/themes/clickvipool/css/theme.css')); ?>" />

    <!--Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&amp;subset=latin-ext" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="page-loader"></div>

    <div class="wrapper" id="app">

        <header>

            <!-- ======================== Navigation ======================== -->

            <div class="container">

                <!-- === navigation-top === -->

                <nav class="navigation-top clearfix">

                    <!-- navigation-top-left -->

                    <div class="navigation-top-left">
                        <a class="box" href="#">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a class="box" href="#">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a class="box" href="#">
                            <i class="fa fa-youtube"></i>
                        </a>
                    </div>

                    <!-- navigation-top-right -->

                    <div class="navigation-top-right">
                        <a class="box" href="#">
                            <i class="icon icon-star"></i> 
                            Special offers
                        </a>
                        <a class="box" href="mailto:info@clickvipool.com">
                            <i class="icon icon-envelope"></i> 
                            info@clickvipool.com
                        </a>
                    </div>
                </nav>

                <!-- === navigation-main === -->

                <nav class="navigation-main clearfix">

                    <!-- logo -->

                    <div class="logo animated fadeIn">
                        <a href="/">
                            <img class="logo-desktop" src="<?php echo e(asset('public/themes/clickvipool/assets/images/logo.png')); ?>" alt="Alternate Text" />
                            <img class="logo-mobile" src="<?php echo e(asset('public/themes/clickvipool/assets/images/logo.png')); ?>" alt="Alternate Text" />
                        </a>
                    </div>

                    <!-- toggle-menu -->

                    <div class="toggle-menu"><i class="icon icon-menu"></i></div>

                    <!-- navigation-block -->

                    <div class="navigation-block clearfix">

                        <!-- navigation-left -->

                        <ul class="navigation-left">
                            <li>
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <a href="#">Pool List</a>
                            </li>
                        </ul>

                        <!-- navigation-right -->

                        <ul class="navigation-right">
                            <?php if(!auth()->check()): ?>
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#login_form">Login</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#registration_form">Registration</a>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href="#">My profile</a>
                                </li>
                                <li>
                                    <a href="<?php echo url('logout'); ?>">Logout</a>
                                </li>
                            <?php endif; ?>
                        </ul>

                    </div> <!--/navigation-block-->

                </nav>
            </div> <!--/container-->

        </header>

        <?php if(session()->has('success_message')): ?>
        <section class="container" id="success_message">
            <div class="row">
                <div class="col-xs-12">
                    <h4 class="alert alert-success"><?php echo session()->get('success_message'); ?></h4>
                </div>
            </div>

        </section>
        <?php endif; ?>

        <!-- Registration Modal -->
        <div class="modal fade" id="registration_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo Form::open(['url'=>url('registration'),'class'=>'form','id'=>'registration_form','@submit'=>"setSubmitting"]); ?>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label for="first_name">First name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label for="first_name">Last name</label>
                                    <input type="text" name="first_name" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label for="first_name">Phone</label>
                                    <input type="text" name="phone" id="first_name" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label for="first_name">Login ID / Email address</label>
                                    <input type="text" name="email" id="email" class="form-control" autocomplete="off" @blur="checkEmailAvailibility" v-model="email" required>
                                    <div v-if="error_mes_duplicate_email" class="alert alert-danger" role="alert">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <span class="sr-only">Error:</span>
                                        <span v-text="error_mes_duplicate_email"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label for="first_name">Password</label>
                                    <input type="password" name="password" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6">
                                <button :disabled="submitting" type="submit" name="submission_type" value="guest" class="btn btn-md btn-block btn-primary" role="button">Register as a guest</button>
                            </div>
                            <div class="col-xs-6">
                                <button :disabled="submitting" type="submit" name="submission_type" value="host" class="btn btn-md btn-block btn-primary">Register as a host</button>
                            </div>
                        </div>

                        <?php echo Form::close(); ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Login Modal -->
        <div class="modal fade" id="login_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo Form::open(['url'=>url('login'),'class'=>'form','id'=>'login_form']); ?>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label for="first_name">Login ID / Email address</label>
                                    <input type="text" name="email" id="first_name" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label for="first_name">Password</label>
                                    <input type="password" name="password" id="first_name" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6">
                                <button type="submit" name="submission_type" value="guest" class="btn btn-md btn-block btn-primary" role="button">Guest Login</button>
                            </div>
                            <div class="col-xs-6">
                                <button type="submit" name="submission_type" value="host" class="btn btn-md btn-block btn-primary">Host Login</button>
                            </div>
                        </div>

                        <?php echo Form::close(); ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </div>
        </div>