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
                        <strong>My Profile</strong>
                    </div>
                    <div class="body table-responsive">

                        <div class="card profile-card">
                            <div class="profile-header">&nbsp;</div>
                            <div class="profile-body">
                                <div class="image-area">
                                    <img src="https://gurayyarar.github.io/AdminBSBMaterialDesign/images/user-lg.jpg" alt="AdminBSB - Profile Image">
                                </div>
                                <div class="content-area">
                                    <h3>{{$profile->full_name}}</h3>
                                    <p>{{$profile->email}}</p>
                                    <p>{{$profile->phone}}</p>
                                    <p>{{$profile->address}}</p>
                                </div>
                            </div>
                            <div class="profile-footer">
                                
                                <button class="btn btn-primary btn-sm waves-effect btn-block">Edit</button>
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


