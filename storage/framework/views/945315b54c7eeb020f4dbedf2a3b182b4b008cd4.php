
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
                                        <p class="pull-left">Prescriptions</p>
                                        <a href="#" data-toggle="modal" data-target="#prescription_modal" class="pull-right">+ Add prescription</a>
                                    </div>
                                    <div class="body">
                                        <table class="table table-bordered table-responsive margin-0 font-12">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Doctor</th>
                                                <th>Prescription Details</th>
                                                <th>Attachment</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $client->prescriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prescription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php echo $prescription->prescription_date; ?>

                                                </td>
                                                <td>
                                                    <p class="m-b-0"><?php echo $prescription->name_of_doctor; ?> - <span class="font-italic"><?php echo $prescription->speciality; ?></span></p>
                                                </td>
                                                <td>
                                                    <?php echo $prescription->description; ?>

                                                </td>
                                                <td>
                                                    <?php if($prescription->attachment && file_exists('public/uploads/'.$prescription->attachment)): ?>
                                                    <a href="<?php echo asset('public/uploads/'.$prescription->attachment); ?>">
                                                        <img style="width: 100px; height: 100px;" src="<?php echo asset('public/uploads/'.$prescription->attachment); ?>" alt="">
                                                    </a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Default Size -->
                    <div class="modal fade" id="prescription_modal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="defaultModalLabel">Add new prescription</h4>
                                </div>
                                <div class="modal-body">
                                    <?php echo Form::open(['url'=>URL::to('module/client/create_prescription',$client->id),'class'=>'form','files'=>'true']); ?>


                                    <label for="">Date of prescription</label>
                                    <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                        <div class="form-line autoCompleter" style="margin-bottom: 0px;">
                                            <?php echo Form::text('prescription_date',null,['class'=>'form-control datepicker','id'=>'date_of_prescription','placeholder'=>'Date of prescription..','autocomplete'=>"off"]); ?>

                                        </div>

                                    </div>
                                    <label for="">Name</label>
                                    <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                        <div class="form-line autoCompleter" style="margin-bottom: 0px;">
                                            <?php echo Form::text('name_of_doctor',null,['class'=>'form-control','placeholder'=>'Name of doctor..','autocomplete'=>"off",'v-model'=>'name_of_doctor']); ?>

                                        </div>

                                    </div>
                                    <label for="">Speciality</label>
                                    <div class="input-group">
                                                <span id="" class="input-group-addon">
                                                    <i class="material-icons">folder_special</i>
                                                </span>
                                        <div class="form-line" style="margin-bottom: 0px;">
                                            <?php echo Form::text('speciality',null,['class'=>'form-control','placeholder'=>'Cardiac, Medicine, etc..','v-model'=>'speciality']); ?>

                                        </div>
                                    </div>
                                    <label for="">Phone</label>
                                    <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">phone</i>
                                            </span>
                                        <div class="form-line" style="margin-bottom: 0px;">
                                            <?php echo Form::text('phone',null,['class'=>'form-control','placeholder'=>'Phone..(Comma sepereted for multiple)','v-model'=>'phone']); ?>

                                        </div>
                                    </div>
                                    <label for="">Prescription Details</label>
                                    <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">description</i>
                                            </span>
                                        <div class="form-line" style="margin-bottom: 0px;">
                                            <textarea class="form-control" name="description" id="" cols="30" rows="3"  placeholder="Prescription Details"></textarea>
                                        </div>
                                    </div>
                                    <label for="">Attachment</label>
                                    <div class="input-group">
                                                <span id="" class="input-group-addon">
                                                    <i class="material-icons">add_a_photo</i>
                                                </span>
                                        <div class="form-line" style="margin-bottom: 0px;">
                                            <?php echo Form::file('file',null,['class'=>'btn btn-md']); ?>

                                        </div>
                                    </div>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_page_script'); ?>
    <script type="text/javascript">
        var app = new Vue({
            el:'#app',
            data:{

            },
            methods:{
                submit_invoice_search:function(){
                    $('#invoice_search').submit();
                }
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.datetimepicker').bootstrapMaterialDatePicker({
                format: 'Y-MM-DD HH:mm:ss',
                clearButton: true,
                weekStart: 1
            });
        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>