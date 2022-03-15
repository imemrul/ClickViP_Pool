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
            <a href="{!! URL::to('module/client') !!}">
                <strong>Patient lists</strong>
            </a>
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
                        <a href="{!! URL::to('module/client/create') !!}" class="btn btn-xs btn-primary"> <i class="material-icons">add_circle_outline</i> Create new patient</a>

                    </div>
                    <div class="body table-responsive">
                        {!! Form::open(['url'=>URL::to('module/client/search'),'method'=>'post']) !!}
                        <div class="row clearfix">

                            <div class="col-xs-3">
                                <div class="input-group" style="margin-bottom:0px;">
                                    <span class="input-group-addon">
                                        <i class="material-icons">perm_identity</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('name',$request->name,['class'=>'form-control','placeholder'=>'Patient name']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="input-group" style="margin-bottom:0px;">
                                    <span class="input-group-addon">
                                        <i class="material-icons">perm_identity</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::select('agent_id[]',\App\User::where('roll_id',2)->pluck('full_name','id'),$request->agent_id ? $request->agent_id : null,['class'=>'form-control selectpicker','title'=>'--Agent--','multiple'=>'true']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="input-group">
                                    {!! Form::submit('SEARCH',['class'=>'btn btn-success btn-block']) !!}
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                        {!! Form::open(['url'=>URL::to('module/member/table_action'),'id'=>'table_form']) !!}
                        <p>TOTAL CLIENT: {!! $clients->total(); !!}</p>
                        <table class="table table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th style="width:250px;">Name</th>
                                <th style="width: 115px">On-board Date</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Disease</th>
                                <th>Agent</th>
                                <th style="width:150px;">Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $i=>$client)
                            <tr class="font-12">
                                <td>P-{!! $client->id !!}</td>
                                <td style="width:250px;">
                                    <a href="{!! URL::to('module/client',$client->id) !!}" data-toggle="tooltip" data-title="View member details">{!! $client->name !!}</a>
                                </td>
                                <td>
                                    <p class="margin-0">{!! $client->created_at->toDateString() !!}</p>
                                    <p><small><strong>{!! \Carbon\Carbon::parse($client->created_at)->diffForHumans() !!}</strong></small></p>
                                </td>
                                <td>{!! $client->age !!}</td>
                                <td>{!! $client->address !!}</td>
                                <td>{!! $client->disease_type !!}</td>
                                <td>
                                    <p class="m-b-0">{!! $client->agent->full_name or 'N/A' !!}</p>
                                </td>
                                <td>
                                    <a data-toggle="tooltip" data-title="Medicine Requisition" class="btn btn-xs btn-default" href="{!! URL::to('module/client/medicine_requisition',$client->id) !!}"><i class="material-icons">local_pharmacy</i></a>
                                    <a data-toggle="tooltip" data-title="Manage Prescription" class="btn btn-xs btn-success" href="{!! URL::to('module/client/prescription',$client->id) !!}"><i class="material-icons">book</i></a>
                                    <a data-toggle="tooltip" data-title="Edit" class="btn btn-xs btn-warning" href="{!! URL::to('module/client/'.$client->id,'edit') !!}"><i class="material-icons">edit</i></a>
                                    <a data-toggle="tooltip" data-title="Delete" class="btn btn-xs btn-danger delete_with_swal" href="{!! URL::to('module/client',$client->id) !!}"><i class="material-icons">remove</i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! Form::close() !!}
                        {!! $clients->appends($request->except(['_token']))->links() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Striped Rows -->
    </div>
@endsection
@section('custom_page_script')
    <script type="text/javascript">

        $(document).ready(function(){
            $('#select_all').change(function() {
                $('[name="member_id[]"]').click();

            });

            $('#executive_allocation').click(function(e){
                e.preventDefault();
                //$('#table_form').submit();
            })
        })

    </script>
@endsection


