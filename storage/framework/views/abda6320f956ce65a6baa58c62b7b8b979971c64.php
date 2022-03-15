<?php $__env->startSection('custom_page_style'); ?>
    <style>
        table td{
            vertical-align: middle!important;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="block-header">
            <?php if(Session::has('message')): ?>
                <div class="alert bg-teal alert-dismissible m-t-20 animated fadeInDownBig" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <?php echo Session::get('message'); ?>

                </div>
            <?php endif; ?>
        </div>

        <!-- Striped Rows -->
        <div class="row clearfix" id="app">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        Weekly session timing
                        <a href="#" class="pull-right" data-toggle="modal" data-target="#myModal">CREATE NEW SESSION</a>

                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Weekly session timing</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="<?php echo url('module/weekly_session_time'); ?>">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-condensed">
                                                        <thead>
                                                        <tr>
                                                            <th style="width: 120px;">Week Day</th>
                                                            <th>Title</th>
                                                            <th>Start from</th>
                                                            <th>End at</th>
                                                            <th>
                                                                <a @click.prevent="addRow" href="#" class="btn btn-xs btn-success">
                                                                    <i class="material-icons">add</i>
                                                                </a>
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr v-for="(row, index) in timing_arr">
                                                            <td>
                                                                <select name="week_day[]" class="form-control" v-model="row.week_day" required>
                                                                    <option value="Sun">Sun</option>
                                                                    <option value="Mon">Mon</option>
                                                                    <option value="Tue">Tue</option>
                                                                    <option value="Wed">Wed</option>
                                                                    <option value="Thu">Thu</option>
                                                                    <option value="Fri">Fri</option>
                                                                    <option value="Sat">Sat</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input v-model="row.title" type="text" name="title[]" class="form-control" placeholder="Title.." required>
                                                            </td>
                                                            <td>
                                                                <div class="form-line">
                                                                    <input v-model="row.start_from" type="time" class="form-control" name="start_from[]" id="validationCustom03"  required>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-line">
                                                                    <input v-model="row.end_at" type="time" class="form-control" name="end_at[]" id="validationCustom03"  required>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a @click.prevent="removeRow(index)" href="#" class="btn btn-xs btn-danger">
                                                                    <i class="material-icons">remove</i>
                                                                </a>
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
                        <?php echo Form::open(['url'=>URL::to('module/member/table_action'),'id'=>'table_form']); ?>

                        <p>TOTAL SESSION TIME SLOT: <?php echo $results->count();; ?></p>
                        <table class="table table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Week-day</th>
                                <th>Title</th>
                                <th>Start from</th>
                                <th>End at</th>
                                <th>Duration</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo $i+1; ?></td>
                                    <td><?php echo $result->week_day ?></td>
                                    <td><?php echo $result->title; ?></td>
                                    <td><?php echo date('h:i a',strtotime($result->start_from)) ?></td>
                                    <td><?php echo date('h:i a',strtotime($result->end_at)) ?></td>
                                    <td>
                                        <?php
                                        $start = \Carbon\Carbon::createFromFormat('H:i:s',$result->start_from)->format('h:i:s');
                                        $startParse = \Carbon\Carbon::parse($start);
                                        $end = \Carbon\Carbon::createFromFormat('H:i:s',$result->end_at)->format('h:i:s');
                                        $endParse = \Carbon\Carbon::parse($end);
                                        //$totalDuration = $result->end_at->diff($result->start_from)->format('%H:%I:%S');
                                        echo $endParse->diff($startParse)->format('%H:%I:%S');
                                        ?>
                                    </td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#edit_session_timing_<?= $result->id ?>"  class="btn btn-info btn-xs btn-group-xs"><i class="fa fa-edit icon-only"></i></a>

                                        <!-- Modal -->
                                        <div id="edit_session_timing_<?= $result->id ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog modal-lg">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Update weekly session timing</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="<?php echo url('module/weekly_session_time',$result->id); ?>" me>
                                                            <input type="hidden" name="weekly_session_timing_id" value="<?= $result->id ?>">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                        <tr>
                                                                            <th style="width: 120px;">Week Day</th>
                                                                            <th>Title</th>
                                                                            <th>Start from</th>
                                                                            <th>End at</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr v-for="(row, index) in timing_arr_edit">
                                                                            <td>
                                                                                <?php $week_day = $result->week_day == '' ? 'Sun' : $result->week_day ?>
                                                                                <select name="week_day" class="form-control" v-model="row.week_day='<?= $week_day ?>'" required>
                                                                                    <option value="Sun">Sun</option>
                                                                                    <option  value="Mon">Mon</option>
                                                                                    <option  value="Tue">Tue</option>
                                                                                    <option  value="Wed">Wed</option>
                                                                                    <option  value="Thu">Thu</option>
                                                                                    <option  value="Fri">Fri</option>
                                                                                    <option  value="Sat">Sat</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input v-model="row.title ='<?= $result->title ?>'" type="text" name="title" class="form-control" placeholder="Title.." required>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <input v-model="row.start_from ='<?= $result->start_from ?>'" type="time" class="form-control" name="start_from" id="validationCustom03"  required>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <input v-model="row.end_at='<?= $result->end_at ?>'" type="time" class="form-control" name="end_at" id="validationCustom03"  required>
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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php echo Form::close(); ?>

                        <?php echo $results->appends(request()->except(['_token']))->links(); ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Striped Rows -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_page_script'); ?>


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
                                let url = '<?php echo url("item_suggestion"); ?>' + '?q='+input.val();
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

    </script>


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
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>