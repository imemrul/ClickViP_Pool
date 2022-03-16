<?php $__env->startSection('custom_page_style'); ?>
    <style>
        .contact_person_created_by{
            position: absolute;
            bottom: 5px;
            right: 5px;
            font-size: 12px;
            font-style: italic;
            background: #dbdbdb;
            padding: 2px 10px;
            border-radius: 23px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="block-header">
            <a href="<?php echo URL::to('module/setting'); ?>" class="btn btn-sm btn-primary"> <i class="material-icons">list</i> Setting</a>
            <?php if(Session::has('message')): ?>
                <div class="alert alert-success alert-dismissible show" role="alert">
                    <strong>Congratulation</strong> <?php echo Session::get('message'); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
        </div>
        <!-- Color Pickers -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Setting
                        </h2>
                        
                    </div>
                    <div class="body" id="app">
                        <div class="row clearfix">
                            <?php echo Form::model($setting,['url'=>URL::to('module/setting',$setting->id),'class'=>'form','files'=>'true','method'=>'patch']); ?>

                            <div class="col-xs-6">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="card-title">System Setting Information</h4>
                                    </div>
                                    <div class="body">
                                        <label for="">App Name</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::text('name',null,['class'=>'form-control','placeholder'=>'App Name..','autocomplete'=>'off','required'=>'true']); ?>

                                            </div>
                                        </div>
                                        <label for="">App Logo</label>
                                        <div class="input-group">
                                                <span id="" class="input-group-addon">
                                                    <i class="material-icons">add_a_photo</i>
                                                </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::file('image',null,['class'=>'btn btn-md']); ?>

                                                <img src="uploads/<?php echo e($setting->image); ?>" class="rounded avatar-lg" alt="" />
                                            </div>
                                        </div>
                                        <label for="">Based Url</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::text('url',null,['class'=>'form-control','placeholder'=>'Url..','autocomplete'=>'off','required'=>'true']); ?>

                                            </div>
                                        </div>
                                        <strong>SMS Setting</strong>
                                        <hr>
                                        <label for="">SMS Username</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::text('username',null,['class'=>'form-control','placeholder'=>'SMS User','autocomplete'=>'off','required'=>'true']); ?>

                                            </div>
                                        </div>
                                        <label for="">SMS Password</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::text('password',null,['class'=>'form-control','placeholder'=>'SMS Password','autocomplete'=>'off','required'=>'true']); ?>

                                            </div>
                                        </div>

                                        <label for="">SMS SenderID</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::text('senderid',null,['class'=>'form-control','placeholder'=>'SMS SenderID','autocomplete'=>'off','required'=>'true']); ?>

                                            </div>
                                        </div>

                                        <label for="">SMS PEID</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::text('peid',null,['class'=>'form-control','placeholder'=>'SMS PEID','autocomplete'=>'off','required'=>'true']); ?>

                                            </div>
                                        </div>
                                        <label for="">Phone</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">store</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::text('mobile',null,['class'=>'form-control','placeholder'=>'Contact No..','autocomplete'=>'off','required'=>'true']); ?>

                                            </div>
                                        </div>
                                        <label for="">Whatsapp No</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">store</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::text('whatsapp',null,['class'=>'form-control','placeholder'=>'Whatsapp No..','autocomplete'=>'off','required'=>'true']); ?>

                                            </div>
                                        </div>
                                        <label for="">Email ID</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">store</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::text('email',null,['class'=>'form-control','placeholder'=>'Email ID..','autocomplete'=>'off','required'=>'true']); ?>

                                            </div>
                                        </div>
                                        <label for="">Facebook link</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">store</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::text('facebook',null,['class'=>'form-control','placeholder'=>'Facebook link..','autocomplete'=>'off','required'=>'true']); ?>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="UPDATE" class="btn btn-success btn-block">
                                </div>

                            </div>
                           <div class="col-xs-6">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="card-title">Withdraw</h4>
                                    </div>
                                    <div class="body">
                                        <label for="">Normal Withdraw Amount</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">money</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::text('normal_charges',null,['class'=>'form-control','placeholder'=>'Normal delivery charges..','autocomplete'=>'off','required'=>'true']); ?>

                                            </div>
                                        </div>
                                        <label for="">Normal Withdraw message</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">message</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::text('normal_message',null,['class'=>'form-control','placeholder'=>'Normal delivery message..','autocomplete'=>'off','required'=>'true']); ?>

                                            </div>
                                        </div>
                                        <label for="">Host Withdraw Notice</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">home</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::textarea('normal_message',null,['class'=>'form-control','placeholder'=>'System Message','rows'=>'2','cols'=>'1','autocomplete'=>'off','required'=>'true']); ?>

                                            </div>
                                        </div>
                                        <label for="">System Version</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">money</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::text('version',null,['class'=>'form-control','placeholder'=>'System Servion..','autocomplete'=>'off','required'=>'true']); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                           </div>
                            <?php echo Form::close(); ?>


                        <!-- Default Size -->
                            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="defaultModalLabel">Add new prescription of this patient.</h4>
                                        </div>
                                        <div class="modal-body">

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
    </div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_page_style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_page_script'); ?>
    <script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.5/dist/latest/bootstrap-autocomplete.min.js"></script>

    <script type="text/javascript">


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>