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
                    </div>
                    <div class="body table-responsive">
                        <p>TOTAL POOL: {!! $results->total(); !!}</p>
                        <table class="table table-striped table-bordered table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>Pool ID</th>
                                <th style="width:250px;">Title</th>
                                <th>Host name</th>
                                <th>Location</th>
                                <th>Occupancy</th>
                                <th>Status</th>
                                <th class="text-center" style="width: 15px"><i class="material-icons">settings</i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $i=>$row)
                            <tr class="font-12">
                                <td>PID-{!! $row->id !!}</td>
                                <td style="width:250px;position:relative;">
                                    {!! $row->title !!}
                                </td>
                                <td>{!! $row->host->full_name !!}</td>
                                <td>{!! $row->location->name or 'N/A' !!}</td>
                                <td>{!! $row->occupancy !!}</td>
                                <th style="width: 150px;">
                                    <span id="status_{!! $row->id !!}">{!! $row->status !!}</span>
                                </th>
                                <td style="width: 10px!important;" class="text-center header">
                                    <ul class="header-dropdown m-r--5" style="top:12px;">
                                        <li class="dropdown" style="list-style: none">
                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a @click="status_update({!! $row->id !!},'Active')" href="#" class=" waves-effect waves-block">Active</a></li>
                                                <li><a @click="status_update({!! $row->id !!},'Pending')" href="#" class=" waves-effect waves-block">Pending</a></li>
                                            </ul>
                                        </li>
                                    </ul>
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
                status_update:function(_pool_id,_status){
                    $('#status_'+_pool_id).html('<span style="font-weight: bold">Please wait....</span>');
                    axios.get('{!! url('module/pool/status_update') !!}/'+_pool_id+'?status='+_status).then(function (res) {
                        $('#status_'+_pool_id).html('<span style="font-weight: bold">'+_status+'</span>');
                    })
                }

            }
        });


    </script>
@endsection


