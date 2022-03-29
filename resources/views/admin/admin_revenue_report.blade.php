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

        <!-- Striped Rows -->
        <div class="row clearfix" id="app">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <a href="{!! url('module/admin_revenue_report') !!}">Revenue report</a> ||
                        <a href="{!! url('module/admin_payment_report') !!}">Payment report</a> ||
                        <a href="{!! url('module/admin_due_report') !!}">Due report</a>
                        {!! Form::open(['url'=>URL::to('module/admin_revenue_report'),'method'=>'post']) !!}
                        <div class="row clearfix">
                            <div class="col-xs-3">
                                <div class="input-group" style="margin-bottom:0px;">
                                    <span class="input-group-addon">
                                        <i class="material-icons">date_range</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('from',request()->from ? request()->from : null,['class'=>'form-control datepicker','placeholder'=>'From']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3">
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
                                        {!! Form::select('pool_id',\App\Pool::orderBy('title','desc')->pluck('title','id'),request()->pool_id ? request()->pool_id : null,['class'=>'form-control selectpicker','title'=>'--Pool--','placeholder'=>'--Pool--']) !!}
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
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-condensed table-hover table-condensed font-13">
                            <thead>
                            <tr>
                                <th style="width: 100px;">ID</th>
                                <th style="width: 180px;">Pool</th>
                                <th style="width: 250px;">Location</th>
                                <th class="">Revenue <small> ({!! \App\Setting::first()->commission !!}%)</small></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $item)
                                <tr>
                                    <td>PID-{!! $item->id !!}</td>
                                    <td class="font-bold">
                                        {!! $item->title !!} <br>
                                        <small class="font-bold">Host: {!! $item->host->full_name !!}</small>
                                    </td>
                                    <td>
                                        {!! $item->location !!} <br>
                                        <small class="font-italic">{!! $item->address !!}</small>
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

            },
            methods:{


            }
        });
    </script>
@endsection