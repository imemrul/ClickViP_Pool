<!DOCTYPE html>
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
                @if (Session::has('message'))
                         <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
  
                      <form action="{{ route('forget.password.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Send Password Reset Link
                              </button>
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