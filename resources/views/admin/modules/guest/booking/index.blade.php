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
                    <strong>My Booking</strong>
                </div>
                <div class="body table-responsive">
                <table class="table table-fixed">
                    <thead>
                        <tr>
                            <th class="col-xs-2">Date</th>
                            {{-- <th class="col-xs-2">Transaction Id</th> --}}
                            <th class="col-xs-2">Guest Name</th>
                            <th class="col-xs-2">Amount</th>
                            <th class="col-xs-2">Book Status</th>
                            <th class="col-xs-2">Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($booking)
                        @foreach($booking as $book)
                        <tr>
                            <td>{!!$book->created_at!!}</td>
                            {{-- <td></td> --}}
                            <td>{!!auth()->user()->full_name!!}</td>
                            <td>AED {!!$book->total!!}</td>
                            <td>{!!$book->booking_status!!}</td>
                            <td>{!!$book->payment_status!!}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td style="text-align:center;color:red;" colspan="6">No Bookings Found</td>
                        </tr>
                        @endif                                        
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

</script>
@endsection