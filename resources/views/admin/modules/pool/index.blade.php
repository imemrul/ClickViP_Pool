@extends('admin.layouts.form')
@section('custom_page_style')
    <style>
        table td{
            vertical-align: middle!important;
        }
        .activity_tag{
            position: absolute;
            top: 0;
            right: 0;
            font-size: 9px;
            font-style: italic;
            background: #009877;
            color: #fff;
            padding: 2px;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <a href="{!! URL::to('module/pool') !!}"><strong>My pool list</strong></a>
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
                        <a href="{!! URL::to('module/pool/create') !!}" class=""> <i class="material-icons" style="vertical-align: middle">add_circle_outline</i> Create new pool</a>
                    </div>
                    <div class="body table-responsive">
                        <p>TOTAL POOL: {!! $results->total(); !!}</p>
                        <table class="table table-striped table-bordered table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>Pool ID</th>
                                <th style="width:250px;">Title</th>
                                <th>Location</th>
                                <th>Occupancy</th>
                                <th>Status</th>
                                <th style="width:100px;">Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $i=>$row)
                            <tr class="font-12">
                                <td>PID-{!! $row->id !!}</td>
                                <td style="width:250px;position:relative;">
                                    {!! $row->title !!}
                                </td>
                                <td>{!! $row->location->name or 'N/A' !!}</td>
                                <td>{!! $row->occupancy !!}</td>
                                <th>{!! $row->status !!}</th>
                                <td style="width:100px;">
                                    <a data-toggle="tooltip" data-title="Edit & Update" class="btn btn-xs btn-primary" href="{!! URL::to('module/pool/'.$row->id,'edit') !!}"><i class="material-icons">edit</i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $results->appends(request()->except(['_token']))->links() !!}
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


