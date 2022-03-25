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
                        FACILITY
                        <a href="#" class="pull-right" data-toggle="modal" data-target="#myModal">CREATE NEW FACILITY</a>

                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Service Location</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{!! url('module/location') !!}">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-condensed">
                                                        <thead>
                                                        <tr>
                                                            <th>Location</th>
                                                            <th>Description</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr v-for="(row, index) in timing_arr">
                                                            <td>
                                                                <input v-model="row.name" type="text" name="name" class="form-control" placeholder="Name.." required>
                                                            </td>
                                                            <td>
                                                                <div class="form-line">
                                                                    <input v-model="row.description" type="text" class="form-control" name="description" required>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <td colspan="5">
                                                                <input type="submit" value="CREATE" class="btn btn-block btn-info" name="post_session_timing">
                                                            </td>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="body table-responsive">
                        <p>TOTAL SESSION TIME SLOT: {!! $results->count(); !!}</p>
                        <table class="table table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $i=>$result)
                                <tr>
                                    <td>{!! $i+1 !!}</td>
                                    <td><?php echo $result->name ?></td>
                                    <td><?php echo $result->status; ?></td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#edit_session_timing_<?= $result->id ?>"  class="btn btn-info btn-xs btn-group-xs"><i class="material-icons">edit</i></a>

                                        <!-- Modal -->
                                        <div id="edit_session_timing_<?= $result->id ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog modal-lg">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Update Location</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="{!! url('module/location',$result->id) !!}">
                                                            {!! csrf_field() !!}
                                                            <input type="hidden" name="_method" value="put">
                                                            <input type="hidden" name="id" value="<?= $result->id ?>">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Location</th>
                                                                            <th>Status</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr v-for="(row, index) in timing_arr_edit">
                                                                            <td>
                                                                                <input v-model="row.name ='<?= $result->name ?>'" type="text" name="name" class="form-control" placeholder="Location.." required>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <input v-model="row.status ='<?= $result->status ?>'" type="text" class="form-control" name="status" required>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                        <tfoot>
                                                                        <tr>
                                                                            <td colspan="5">
                                                                                <input type="submit" value="UPDATE" class="btn btn-block btn-info" name="update_session_timing">
                                                                            </td>
                                                                        </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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


