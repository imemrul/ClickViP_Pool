﻿<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Medicine CRM</title>
    <!-- Favicon-->
    <link rel="icon" href="{!! URL::to('public/favicon.ico') !!}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{!! URL::to('public/plugins/bootstrap/css/bootstrap.css') !!}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{!! URL::to('public/plugins/node-waves/waves.css') !!}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{!! URL::to('public/plugins/animate-css/animate.css') !!}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{!! URL::to('public/css/style.css') !!}" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">ClickViPool<b> - BMS</b></a>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="{!! URL::to('login') !!}">
                    {!! Form::token() !!}
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xs-6">
                            <button class="btn btn-block bg-teal waves-effect" type="submit">SIGN IN</button>
                        </div>
                        <div class="col-xs-6">
                             <a href="{{ route('forget.password.get') }}">Reset Password</a>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{!! URL::to('public/plugins/jquery/jquery.min.js') !!}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{!! URL::to('public/plugins/bootstrap/js/bootstrap.js') !!}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{!! URL::to('public/plugins/node-waves/waves.js') !!}"></script>

    <!-- Validation Plugin Js -->
    <script src="{!! URL::to('public/plugins/jquery-validation/jquery.validate.js') !!}"></script>

    <!-- Custom Js -->
    <script src="{!! URL::to('public/js/admin.js') !!}"></script>
    <script src="{!! URL::to('public/js/pages/examples/sign-in.js') !!}"></script>
</body>

</html>