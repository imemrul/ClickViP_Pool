@extends('admin.layouts.form')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <strong>Page lists</strong>
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
                        <a href="{!! URL::to('module/page/create') !!}" class="btn btn-xs btn-primary"> <i class="material-icons">add_circle_outline</i> Create New</a>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a id="executive_allocation" href="javascript:void(0);">Delete multiple</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body table-responsive">
                        <p>TOTAL Page: {!! $results->total(); !!}</p>
                        <table class="table table-striped table-bordered table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>Page ID</th>
                                <th style="width:250px;">Title</th>
                                <th>Published</th>
                                <th>Update</th>
                                <th>Status</th>
                                <th style="width:100px;">Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $i=>$row)
                            <tr class="font-12">
                                <td>PID_{!! $row->id !!}</td>
                                <td style="width:250px;position:relative;">
                                    {!! $row->title !!}
                                </td>
                                <td>{!! $row->created_at or 'N/A' !!}</td>
                                <td>{!! $row->updated_at !!}</td>
                                <th>{!! $row->status !!}</th>
                                <td style="width:100px;">
                                    <a data-toggle="tooltip" data-title="Edit & Update" class="btn btn-xs btn-primary" href="{!! URL::to('module/page/'.$row->id,'edit') !!}"><i class="material-icons">edit</i></a>
                                    <a data-toggle="tooltip" target="_blank" data-title="View Page" class="btn btn-xs btn-warning" href="{!! URL::to(''.$row->slug) !!}"><i class="material-icons">visibility</i></a>
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
 
        })
    </script>
@endsection