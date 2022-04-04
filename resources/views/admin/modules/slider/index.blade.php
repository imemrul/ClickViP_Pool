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
                        <strong>All Slider</strong>
                        <a href="#" class="pull-right" data-toggle="modal" data-target="#myModal">Create New Slider</a>
                        
                    </div>
                    <div class="body table-responsive">
                        <p>TOTAL Slider: {!! $sliders->total(); !!}</p>
                        <table class="table table-striped table-bordered table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>Slider ID</th>
                                <th style="width:250px;">Title</th>
                                <th>Active To</th>
                                <th>Published</th>
                                <th>Update</th>
                                <th style="width:100px;">Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $i=>$row)
                            <tr class="font-12">
                                <td>SID_{!! $row->id !!}</td>
                                <td style="width:250px;position:relative;">
                                    {!! $row->title !!}
                                </td>
                                <th>{!! $row->activeTo !!}</th>
                                <td>{!! $row->created_at !!}</td>
                                <td>{!! $row->updated_at !!}</td>
                                <td style="width:100px;">
                                    <a data-toggle="tooltip" data-title="Edit & Update" class="btn btn-xs btn-primary" href="{!! URL::to('module/slider/'.$row->id,'edit') !!}"><i class="material-icons">edit</i></a>
                                    {{-- <a data-toggle="tooltip" target="_blank" data-title="View Slider" class="btn btn-xs btn-warning" href="{!! URL::to(''.$row->slug) !!}"><i class="material-icons">visibility</i></a> --}}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $sliders->appends(request()->except(['_token']))->links() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Striped Rows -->
    </div>
@endsection
@section('custom_page_script')
    <script type="text/javascript">
        let vueApp = new Vue({
            el:'#app',
            data:{
                submitting:false,
                timing_arr:[{
                    week_day:'Sun',
                    title:null,
                    start_from:null,
                    end_at:null
                }],
                timing_arr_edit:[{
                    week_day:'Sun',
                    title:null,
                    start_from:null,
                    end_at:null
                }],
            },
            methods:{
                setSubmitting:function(){
                    this.submitting = true;
                },

                addRow:function(){
                    this.timing_arr.push({
                        week_day:'Sun',
                        title:null,
                        start_from:null,
                        end_at:null
                    });
                },
                removeRow:function(index){
                    console.log(index);
                    this.timing_arr.splice(index,1);
                },
                handleInput:function($event,row){
                    let input = $($event.target);
                    input.autoComplete({
                        resolver:'custom',
                        events: {
                            search: function (qry, callback) {
                                let url = '{!! url("item_suggestion") !!}' + '?q='+input.val();
                                axios.get(url).then(function (res) {
                                    callback(res.data)
                                });
                            }
                        },
                        minLength:2,
                        preventEnter:true
                    }).on('autocomplete.select', function (evt, item) {
                        console.log(item);
                        row.unit = item.unit.unit_name;
                        row.product_name = item.product_name;
                        row.product_code = item.product_code;
                        return false;
                    });
                },

                submit:function(){
                    $('#disposition_form').submit();
                },
            }
        });

        $('button.saveChange').click(function(){
            if (!$('form')[0].checkValidity()) {
                $('form').find('input[type="submit"]').click();
                return false;
            }
        });

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


