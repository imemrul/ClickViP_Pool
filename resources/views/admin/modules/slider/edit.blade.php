@extends('admin.layouts.form')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <a href="{!! URL::to('module/slider') !!}" class="btn btn-sm btn-primary"> <i class="material-icons">list</i> lists of Slider</a>
            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible show" role="alert">
                    <strong>Congratulation</strong> {!! Session::get('message') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <!-- Color Pickers -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                           Update Slider
                        </h2>
                    </div>
                    <div class="body" id="app">
                        <div class="row clearfix">
                            {!! Form::model($slide,['url'=>URL::to('module/slider',$slide->id),'class'=>'form','files'=>'true','method'=>'patch']) !!}
                            <div class="col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="card-title">Update Slider</h4>
                                    </div>
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label for="">Title</label>
                                                <div class="input-group">
                                                    <span id="" class="input-group-addon">
                                                        <i class="material-icons">title</i>
                                                    </span>
                                                    <div class="form-line focused" style="margin-bottom: 0px;">
                                                        {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Title','autocomplete'=>"off",'required'=>'required']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <label for="">Desc One</label>
                                                <div class="input-group">
                                                    <span id="" class="input-group-addon">
                                                        <i class="material-icons">input</i>
                                                    </span>
                                                    <div class="form-line focused" style="margin-bottom: 0px;">
                                                        {!! Form::text('descOne',null,['class'=>'form-control','placeholder'=>'Desc One','autocomplete'=>"off",'required'=>'required']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <label for="">Desc Two</label>
                                                <div class="input-group">
                                                    <span id="" class="input-group-addon">
                                                        <i class="material-icons">title</i>
                                                    </span>
                                                    <div class="form-line focused" style="margin-bottom: 0px;">
                                                        {!! Form::text('descTwo',null,['class'=>'form-control','placeholder'=>'Title','autocomplete'=>"off",'required'=>'required']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <label for="">Button Url</label>
                                                <div class="input-group">
                                                    <span id="" class="input-group-addon">
                                                        <i class="material-icons">link</i>
                                                    </span>
                                                    <div class="form-line focused" style="margin-bottom: 0px;">
                                                        {!! Form::text('btnUrl',null,['class'=>'form-control','placeholder'=>'Title','autocomplete'=>"off",'required'=>'required']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <label for="">Slider Image</label>
                                                <div class="input-group">
                                                    <span id="" class="input-group-addon">
                                                        <i class="material-icons">photo</i>
                                                    </span>
                                                    <div class="form-line focused" style="margin-bottom: 0px;">
                                                        <img src="/public/{!!$slide->slide_image!!}" width="200px"><input type="file" name="slide_image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="UPDATE" class="btn btn-success btn-block">
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_page_style')
@endsection
@section('custom_page_script')
    <script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.5/dist/latest/bootstrap-autocomplete.min.js"></script>
    <script type="text/javascript">
        let app = new Vue({
            el:'#app',
            data:{
                contact_persons:[],
                client_id:0
            },
            methods:{
            }
        });
    </script>
@endsection