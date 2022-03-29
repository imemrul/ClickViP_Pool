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
                        {!! Form::open(['url'=>URL::to('module/admin_payment_report'),'method'=>'post']) !!}
                        <div class="row clearfix">
                            <div class="col-xs-4">
                                <div class="input-group" style="margin-bottom:0px;">
                                    <span class="input-group-addon">
                                        <i class="material-icons">date_range</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('from',request()->from ? request()->from : null,['class'=>'form-control datepicker','placeholder'=>'From']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="input-group" style="margin-bottom:0px;">
                                    <span class="input-group-addon">
                                        <i class="material-icons">date_range</i>
                                    </span>
                                    <div class="form-line">
                                        {!! Form::text('to',request()->to ? request()->to : null,['class'=>'form-control datepicker','placeholder'=>'To date']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
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
                                <th style="width: 50px;">SL</th>
                                <th style="width: 180px;">Pool</th>
                                <th>Guest</th>
                                <th class="">Amount</th>
                                <th>Strip TXN</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $i=>$item)
                                <tr>
                                    <td>{!! $i+1 !!}</td>
                                    <td>
                                        {!! $item->booking->pool->title !!} <br>
                                        <small class="font-italic">MR.{!! $item->booking->pool->host->full_name  !!} <br></small>
                                    </td>
                                    <td>
                                        {!! $item->booking->guest->full_name  !!} <br>
                                        <small class="font-italic">Booking ID: BID-{!! $item->booking->id !!}</small>
                                    </td>
                                    <td class="font-bold">
                                        {!! $item->amount !!} {!! $item->currency !!}
                                    </td>
                                    <td>
                                        <span class="font-italic">{!! $item->transaction_id !!}</span>
                                    </td>
                                    <td>{!! $item->created_at !!}</td>
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