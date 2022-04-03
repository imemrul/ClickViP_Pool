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
                    <div class="body table-responsive">
                        <p>TOTAL: {!! $executives->total(); !!}</p>
                        <table class="table table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th style="width:250px;">Name</th>
                                <th style="width: 115px">On-board Date</th>
                                <th>Address</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($executives as $i=>$client)
                                <tr class="font-12">
                                    <td>H-{!! $client->id !!}</td>
                                    <td style="width:250px;">
                                        {!! $client->full_name !!}
                                    </td>
                                    <td>
                                        <p class="margin-0">{!! $client->created_at->toDateString() !!}</p>
                                        <p><small><strong>{!! \Carbon\Carbon::parse($client->created_at)->diffForHumans() !!}</strong></small></p>
                                    </td>
                                    <td>{!! $client->address !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $executives->appends($request->except(['_token']))->links() !!}
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


