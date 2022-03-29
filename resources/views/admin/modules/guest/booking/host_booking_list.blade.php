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
                        {!! Form::open(['url'=>URL::to('module/host/booking_search'),'method'=>'post']) !!}
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
                                        <i class="material-icons">book</i>
                                    </span>
                                    <div class="">
                                        {!! Form::select('booking_status',['Reserved'=>'Reserved','Booked'=>'Booked'],request()->booking_status ? request()->booking_status : null,['class'=>'selectpicker','title'=>'--Payment Status--','placeholder'=>'--Payment Status--']) !!}
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
                                <th>ID</th>
                                <th style="width: 100px;">Date</th>
                                <th class="">Guest Name</th>
                                <th style="width: 100px;" class="text-center">Amount</th>
                                <th class="">Booking Status</th>
                                <th class="">Payment Status</th>
                                <th class="text-center" style="width: 15px"><i class="material-icons">settings</i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($booking)
                                @foreach($booking as $book)
                                    <tr>
                                        <td>BID-{!! $book->id !!}</td>
                                        <td>{!!$book->booking_session->date !!}</td>
                                        <td>{!! $book->guest->full_name !!}</td>
                                        <td class="text-center">AED {!!$book->total!!}</td>
                                        <td>{!!$book->booking_session->status or 'N/A'!!}</td>
                                        <td>
                                            @if(isset($book->payment_details->amount))
                                                @if($book->payment_details->amount == $book->total)
                                                    Done
                                                @else
                                                    Partial paid
                                                @endif
                                            @else
                                                Due
                                            @endif
                                        </td>
                                        <td style="width: 10px!important;" class="text-center header">
                                            <ul class="header-dropdown m-r--5" style="top:12px;">
                                                <li class="dropdown" style="list-style: none">
                                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                        <i class="material-icons">more_vert</i>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li><a href="{!! url('module/booking/print_view',$book->id) !!}" class=" waves-effect waves-block">Print View</a></li>
                                                        <li><a href="{!! url('module/booking/print_view',$book->id) !!}" class=" waves-effect waves-block">Cancel</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td style="text-align:center;color:red;" colspan="6">No Bookings Found</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        {!! $booking->appends(request()->except(['_token']))->links() !!}
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