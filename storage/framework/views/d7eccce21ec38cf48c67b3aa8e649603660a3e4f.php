
<?php $__env->startSection('custom_page_style'); ?>
    <style>
        .contact_person_created_by{
            position: absolute;
            right: 5px;
            font-size: 12px;
            font-style: italic;
            background: #dbdbdb;
            padding: 2px 10px;
            border-radius: 23px;
        }
        table td{
            vertical-align: middle!important;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="block-header">
            <a href="<?php echo URL::to('module/client'); ?>">Patient list</a>
        </div>
        <!-- Color Pickers -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-xs-4">
                                <p class="m-b-0"><?php echo $client->name; ?> <small><strong> - <?php echo $client->phone; ?></strong></small></p>
                                <small><?php echo $client->address; ?></small>
                            </div>
                            <div class="col-xs-4">
                                <p class="m-b-0"><strong>Agent</strong></p>
                                <?php echo isset($client->agent->full_name) ? $client->agent->full_name : 'Not available'; ?>

                            </div>
                            <div class="col-xs-4">
                                <p class="text-right">Onboard: <?php echo $client->created_at; ?></p>
                                <span class="contact_person_created_by">Created by: <?php echo isset($client->creator->full_name) ? $client->creator->full_name : 'N/A'; ?></span>
                            </div>
                        </div>

                    </div>
                    <div class="body" id="app">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="card">
                                    <div class="header clearfix">
                                        <p class="pull-left">Medicine Requisition</p>
                                        <a href="#" data-toggle="modal" data-target="#prescription_modal" class="pull-right">+ Requisition request form</a>
                                    </div>
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label for="">Requisition Date / Filter</label>
                                                <div class="input-group" style="margin-bottom: 0">
                                                    <?php echo Form::select('selected_date',\App\Client_medicine_requisition::where('client_id',$client->id)->groupBy('date_of_requisition')->pluck('date_of_requisition','date_of_requisition'),request()->selected_date ? request()->selected_date : null,['class'=>'selectpicker','title'=>'--Date of requisition--','@change'=>'filter_by_date','id'=>'date_of_requisition']); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <?php if(count($medicine_requisitions_filter_by_date) ==0): ?>
                                                <table class="table table-bordered table-responsive margin-0 font-12">
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Remarks</th>
                                                        <th>Total amount</th>
                                                        <th>Total Discount</th>
                                                        <th class="text-center" style="width: 85px">#</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $__currentLoopData = $client->medicine_requisition()->orderBy('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $item->date_of_requisition; ?>

                                                            </td>
                                                            <td>
                                                                <p class="m-b-0"><?php echo $item->remarks; ?></p>
                                                            </td>
                                                            <td>
                                                                <?php echo $item->requisition_details->sum('after_discount'); ?> ৳
                                                            </td>
                                                            <td><?php echo $item->requisition_details->sum('discount'); ?> ৳</td>
                                                            <td>
                                                                <a data-toggle="tooltip" data-title="Edit" class="btn btn-xs btn-warning" href="#"><i class="material-icons">edit</i></a>
                                                                <a data-toggle="tooltip" data-title="Delete" class="btn btn-xs btn-danger delete_with_swal" href="#"><i class="material-icons">remove</i></a>

                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                                <?php else: ?>
                                                    <?php $__currentLoopData = $medicine_requisitions_filter_by_date; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <p><strong>Remarks</strong>: <span class="font-italic"><?php echo $item->remarks; ?></span></p>
                                                    <table class="table table-bordered text-center" id="medicine_requisition_table">
                                                        <thead>
                                                        <tr>
                                                            <th style="width:220px">Medicine</th>
                                                            <th colspan="3" class="text-center">
                                                                Medicine Dose in a day
                                                                <br>
                                                                M+E+N
                                                            </th>
                                                            <th style="width: 73px">Quantity</th>
                                                            <th style="width: 73px">Price</th>
                                                            <th style="width: 93px">Discount (%)</th>
                                                            <th>After Discount</th>
                                                            <th>Next Purchase</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $__currentLoopData = $item->requisition_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td class="text-left" style="position: relative">
                                                                <?php echo $detail->medicine_name; ?>

                                                            </td>
                                                            <td style="width: 65px;"><?php echo isset($detail->day) ? $detail->day : 0; ?></td>
                                                            <td style="width: 65px;"><?php echo isset($detail->evening) ? $detail->evening : 0; ?></td>
                                                            <td style="width: 65px;"><?php echo isset($detail->night) ? $detail->night : 0; ?></td>
                                                            <td><?php echo $detail->order_qty; ?></td>
                                                            <td><?php echo $detail->total_amount; ?></td>
                                                            <td><?php echo $detail->discount; ?></td>
                                                            <td><?php echo $detail->after_discount; ?></td>
                                                            <td><?php echo $detail->next_purchase_date; ?></td>
                                                        </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                    </table>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Default Size -->
                        <div class="modal fade" id="prescription_modal" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg" style="width: 1024px" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="defaultModalLabel">Add new requisition</h4>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo Form::open(['url'=>URL::to('module/client/save_medicine_requisition',$client->id),'class'=>'form','files'=>'true']); ?>


                                        <label for="">Date of requisition</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::text('date_of_requisition',\Carbon\Carbon::now()->toDateString(),['class'=>'form-control datepicker','id'=>'date_of_prescription','placeholder'=>'Date of prescription..','autocomplete'=>"off"]); ?>

                                            </div>

                                        </div>
                                        <label for="">Remarks</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::textarea('remarks',null,['class'=>'form-control','id'=>'date_of_prescription','placeholder'=>'Remarks..','rows'=>"2"]); ?>

                                            </div>

                                        </div>
                                        <table class="table table-bordered" id="medicine_requisition_table">
                                            <thead>
                                            <tr>
                                                <th style="width:220px">Medicine</th>
                                                <th colspan="3" class="text-center">
                                                    Medicine Dose in a day
                                                    <br>
                                                    M+E+N
                                                </th>
                                                <th style="width: 73px">Quantity</th>
                                                <th style="width: 73px">Price</th>
                                                <th style="width: 93px">Discount (%)</th>
                                                <th>After Discount</th>
                                                <th>N. Purchase</th>
                                                <th>
                                                    <a href="#" @click.prevent="add_medicine_item_arr()"><i class="material-icons">add</i></a>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="(item, i) in medicine_item_arr">
                                                <td class="" style="position: relative">
                                                    <div class="form-line autoCompleter">
                                                        <input type="hidden" name="medicine_id[]" v-model="item.medicine_id" >
                                                        <?php echo Form::text('name[]',null,['class'=>'form-control','@keyup'=>'search_medicine_name(item)','autocomplete'=>'off','placeholder'=>'Name..' ,'v-model'=>'item.medicine_name']); ?>

                                                    </div>
                                                </td>
                                                <td style="width: 65px;"><input type="text" name="morning[]" class="form-control"></td>
                                                <td style="width: 65px;"><input type="text" name="evening[]" class="form-control"></td>
                                                <td style="width: 65px;"><input type="text" name="night[]" class="form-control" ></td>
                                                <td><input type="text" name="order_qty[]" class="form-control" placeholder="Qty"></td>
                                                <td><input type="text" name="total_amount[]" class="form-control" placeholder="Total"></td>
                                                <td><input type="text" name="discount[]" class="form-control" placeholder="Discount"></td>
                                                <td><input type="text" name="after_discount[]" class="form-control" placeholder="After discount"></td>
                                                <td><input type="text" name="next_purchase_date[]" class="form-control datepicker" placeholder="Next purchase date"></td>
                                                <td>
                                                    <a href="#"><i @click.prevent="removeRow(i)" class="material-icons">remove</i></a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="form-group">
                                            <input type="submit" name="submit" value="CREATE" class="btn btn-success btn-block">
                                        </div>
                                        <?php echo Form::close(); ?>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn bg-pink waves-effect" data-dismiss="modal">CLOSE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
     
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_page_style'); ?>
    <style>
        .table .dropdown-menu{
            left:0!important;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_page_script'); ?>
    <script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.5/dist/latest/bootstrap-autocomplete.min.js"></script>

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
                filter_by_date:function(){
                    var selected_date = $('#date_of_requisition').val();
                    var url = '<?php echo url('module/client/medicine_requisition',$client->id); ?>?selected_date='+selected_date
                    window.location.href = url;
                },
                add_medicine_item_arr:function(){
                  this.medicine_item_arr.push({
                      medicine_id:0,
                      medicine_name: null,
                  });
                  setTimeout(function () {
                      $('#medicine_requisition_table').find('tr:last').find('input[name="next_purchase_date[]"]').bootstrapMaterialDatePicker({
                          format: 'Y-MM-DD',
                          clearButton: true,
                          weekStart: 1,
                          time: false
                      });
                  },100);
                },
                removeRow:function (index) {
                    this.medicine_item_arr.splice(index,1)
                },
                search_medicine_name:function(_item){
                    $(event.target).autoComplete({
                        resolverSettings: {
                            url: '<?php echo URL::to('module/client/search_medicine'); ?>'
                        },
                        minLength:2,
                        preventEnter:true
                    }).on('autocomplete.select', function (evt, item) {
                        if(item){
                            _item.medicine_name = item.text
                            _item.medicine_id = item.value
                        }
                    }).on('autocomplete.freevalue',function(evt,value){
                        $('bootstrap-autocomplete .disabled').remove();

                    }).on('focusout, blur',function(){
                        $('bootstrap-autocomplete .disabled').remove();
                    })
                }
            }
        });


    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            // $('body').on('focus',".datepicker", function(){
            //     $(this).datepicker();
            // });​
            $('.datetimepicker').bootstrapMaterialDatePicker({
                format: 'Y-MM-DD HH:mm:ss',
                clearButton: true,
                weekStart: 1
            });
        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>