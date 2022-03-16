@extends('admin.layouts.form')
@section('custom_page_style')
    <style>
        .contact_person_created_by{
            position: absolute;
            bottom: 5px;
            right: 5px;
            font-size: 12px;
            font-style: italic;
            background: #dbdbdb;
            padding: 2px 10px;
            border-radius: 23px;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <a href="{!! URL::to('module/client') !!}" class="btn btn-sm btn-primary"> <i class="material-icons">list</i> Client lists</a>
            <a href="{!! URL::to('module/client/create') !!}" class="btn btn-sm btn-success"> <i class="material-icons">list</i> Create New Client</a>
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
                            Create new client
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body" id="app">
                        <div class="row clearfix">
                            {!! Form::model($client,['url'=>URL::to('module/client',$client->id),'class'=>'form','files'=>'true','method'=>'patch']) !!}
                            <div class="col-xs-8 col-xs-offset-2">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="card-title">Patient information</h4>
                                    </div>
                                    <div class="body">
                                        <label for="">Name</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Name..','autocomplete'=>'off','required'=>'true']) !!}
                                            </div>
                                        </div>

                                        <label for="">Address</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">home</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                {!! Form::textarea('address',null,['class'=>'form-control','placeholder'=>'Address','rows'=>'2','cols'=>'1','autocomplete'=>'off','required'=>'true']) !!}
                                            </div>
                                        </div>

                                        <label for="">Phone</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">store</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                {!! Form::text('contact_no',null,['class'=>'form-control','placeholder'=>'Contact No..','autocomplete'=>'off','required'=>'true']) !!}
                                            </div>
                                        </div>
                                        <label for="">Age</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">store</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                {!! Form::text('age',null,['class'=>'form-control','placeholder'=>'Age..','autocomplete'=>'off']) !!}
                                            </div>
                                        </div>

                                        <label for="">Disease type</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">store</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                {!! Form::text('disease_type',null,['class'=>'form-control','placeholder'=>'Details of the disease..','autocomplete'=>'off']) !!}
                                            </div>
                                        </div>

                                        <label for="">Owner/Agent</label>
                                        <div class="input-group">
                                            {!! Form::select('agent_id',\App\User::where('roll_id',2)->pluck('full_name','id'),null,['class'=>'selectpicker','title'=>'--Agent--']) !!}
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


    </script>
@endsection
