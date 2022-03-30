@extends('admin.layouts.form')
@section('custom_page_style')
    <style>
        table td{
            vertical-align: middle!important;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            @if(Session::has('message'))
                <div class="alert bg-teal alert-dismissible m-t-20 animated fadeInDownBig" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    {!! Session::get('message') !!}
                </div>
            @endif
        </div>

        <!-- Striped Rows -->
        <div class="row clearfix" id="app">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <div class="media" style="margin-bottom: 0">
                            <div class="media-left">
                                <a href="javascript:void(0);">
                                    <img class="media-object img-thumbnail" src="{!! auth()->user()->photo ? url('public/uploads/'.auth()->user()->photo) : url('public/uploads/no_image.webp') !!}" width="100">
                                </a>
                            </div>
                            <div class="media-body" style="padding-left: 20px; vertical-align: middle">
                                <h2 class="media-heading" style="margin-bottom: 10px" > MR. {{$profile->full_name}}</h2>
                                <p class="font-italic" style="margin-bottom: 3px;">LOGIN ID: {{$profile->phone}}</p>
                                <p class="font-italic">Email: {{$profile->address}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="body table-responsive">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#basic_info" data-toggle="tab" aria-expanded="false">
                                    <i class="material-icons">home</i> BASIC PROFILE
                                </a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#update_login_id" data-toggle="tab">
                                    <i class="material-icons">vpn_key</i> LOGIN ID
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#update_login_password" data-toggle="tab">
                                    <i class="material-icons">lock</i> PASSWORD
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="basic_info">
                                <div class="row">
                                    <div class="col-xs-7 col-xs-offset-2">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <form class="form-horizontal" action="{!! url('profile_update',auth()->user()->id) !!}" method="post" enctype="multipart/form-data">
                                                    <div class="row clearfix">
                                                        <div class="col-xs-3 form-control-label">
                                                            <label for="email_address_2">Full name</label>
                                                        </div>
                                                        <div class="col-xs-9">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input value="{!! auth()->user()->full_name !!}" type="text" name="full_name" class="form-control" placeholder="Enter your full name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-xs-3 form-control-label">
                                                            <label for="email_address_2">Phone number</label>
                                                        </div>
                                                        <div class="col-xs-9">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input value="{!! auth()->user()->phone !!}" type="text" name="phone" class="form-control" placeholder="Enter your full name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-xs-3 form-control-label">
                                                            <label for="email_address_2">Address</label>
                                                        </div>
                                                        <div class="col-xs-9">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <textarea name="address" class="form-control" rows="2" placeholder="Address....">{!! auth()->user()->address !!}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-xs-3 form-control-label">
                                                            <label for="email_address_2">Profile picture</label>
                                                        </div>
                                                        <div class="col-xs-9">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="file" name="photo" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-xs-12">
                                                            <input type="submit" class="btn btn-primary btn-block m-t-15 waves-effect" value="UPDATE"/>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="update_login_id">
                                <div class="row">
                                    <div class="col-xs-7 col-xs-offset-2">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <form class="form-horizontal" action="{!! url('login_id_update',auth()->user()->id) !!}" method="post">
                                                    <div class="row clearfix">
                                                        <div class="col-xs-3 form-control-label">
                                                            <label for="">LOGIN ID</label>
                                                        </div>
                                                        <div class="col-xs-9">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input value="{!! auth()->user()->email !!}" type="text" name="email" class="form-control" placeholder="Login ID">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-xs-12">
                                                            <input type="submit" class="btn btn-primary btn-block m-t-15 waves-effect" value="UPDATE" />
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="update_login_password">
                                <div class="row">
                                    <div class="col-xs-7 col-xs-offset-2">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <form class="form-horizontal" action="{!! url('password_update',auth()->user()->id) !!}" method="post">
                                                    <div class="row clearfix">
                                                        <div class="col-xs-3 form-control-label">
                                                            <label for="email_address_2">PASSWORD</label>
                                                        </div>
                                                        <div class="col-xs-9">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input value="" type="password" name="password" class="form-control" placeholder="Password" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-xs-12">
                                                            <input type="submit" class="btn btn-primary btn-block m-t-15 waves-effect" value="UPDATE" />
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Striped Rows -->
    </div>
@endsection
@section('custom_page_script')
    <script type="text/javascript">

    </script>
@endsection


