@extends('admin.layouts.form')
@section('custom_page_style')
    <style>
        table td {
            vertical-align: middle !important;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            @if(Session::has('message'))
                <div class="alert bg-teal alert-dismissible m-t-20 animated fadeInDownBig" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    {!! Session::get('message') !!}
                </div>
            @endif
        </div>

        <!-- Striped Rows -->
        <div class="row clearfix" id="app">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        {!! Form::open(['url'=>URL::to('module/host/revenue_report'),'method'=>'post']) !!}
                        <div class="row clearfix">
                            <div class="col-xs-2">
                                <div class="input-group" style="margin-bottom:0px;">
                                    <span class="input-group-addon">
                                        <i class="material-icons">date_range</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('from',request()->from ? request()->from : null,['class'=>'form-control datepicker','placeholder'=>'From']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div class="input-group" style="margin-bottom:0px;">
                                    <span class="input-group-addon">
                                        <i class="material-icons">date_range</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('to',request()->to ? request()->to : null,['class'=>'form-control datepicker','placeholder'=>'To date']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">pool</i>
                                    </span>
                                    <div class="">
                                        {!! Form::select('pool_id',\App\Pool::where('host_id',auth()->user()->id)->orderBy('title','desc')->pluck('title','id'),request()->pool_id ? request()->pool_id : null,['class'=>'form-control selectpicker','title'=>'--Pool--','placeholder'=>'--Pool--']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">add_location</i>
                                    </span>
                                    <div class="">
                                        <?php
                                            $location_ids = \App\Pool::where('host_id',auth()->user()->id)->orderBy('id','desc')->groupBy()->pluck('emirates');
                                            $emirates  = \App\Location::whereIn('id', $location_ids)->pluck('name','id');
                                        ?>
                                        {!! Form::select('emirates',$emirates,request()->emirates ? request()->emirates : null,['class'=>'form-control selectpicker','title'=>'--Location--','placeholder'=>'--Location--']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <div class="input-group">
                                    {!! Form::submit('SEARCH',['class'=>'btn btn-success btn-block']) !!}
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-condensed table-hover table-condensed font-13">
                            <thead>
                            <tr>
                                <th style="width: 100px;">ID</th>
                                <th style="width: 180px;">Pool</th>
                                <th style="width: 250px;">Location</th>
                                <th class="">Revenue</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($results as $item)
                                    <tr>
                                        <td>PID-{!! $item->id !!}</td>
                                        <td>{!! $item->title !!}</td>
                                        <td>
                                            {!! $item->location !!} <br>
                                            <small>{!! $item->address !!}</small>
                                        </td>
                                        <td class="font-bold">{!! $item->total_revenue !!} AED</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Striped Rows -->
    </div>
@endsection
@section('custom_page_script')
    <script type="text/javascript">
        var app = new Vue({
            el:'#app',
            data:{
                medicine_item_arr:[
                    {
                        medicine_id:null,
                        medicine_name: null,
                    }
                ]
            },
            methods:{
                invoice_status_update:function(_invoice_id,_status_of,_status){
                    $('#'+_status_of+'_'+_invoice_id).html('<span style="font-weight: bold">Please wait....</span>');
                    axios.get('{!! url('module/invoice/status_update') !!}/'+_invoice_id+'?status_of='+_status_of+'&status='+_status).then(function (res) {
                        $('#'+_status_of+'_'+_invoice_id).html('<span style="font-weight: bold">'+_status+'</span>');
                    })
                }

            }
        });
    </script>
@endsection