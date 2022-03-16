﻿
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
            <a href="<?php echo URL::to('module/client/contact_person_list'); ?>">
                <strong>All contact person</strong>
            </a>
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
                        <h2><?php echo $contact_person->name; ?></h2>

                    </div>
                    <div class="body" id="app">
                        <div class="row clearfix">
                            <?php echo Form::model($contact_person,['url'=>URL::to('module/client/update_contact_person',$contact_person->id),'class'=>'form','files'=>'true','method'=>'patch']); ?>

                            <div class="col-xs-6 col-xs-offset-3">
                                <div class="card">
                                    <div class="body">
                                        <label for="">Name</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line autoCompleter" style="margin-bottom: 0px;">
                                                <?php echo Form::text('name',null,['class'=>'form-control','placeholder'=>'Name',]); ?>

                                            </div>

                                        </div>
                                        <label for="">Email</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::text('email',null,['class'=>'form-control','placeholder'=>'Email']); ?>

                                            </div>
                                        </div>
                                        <label for="">Phone</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">phone</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::text('phone',null,['class'=>'form-control','placeholder'=>'Phone..(Comma seperated for multiple)']); ?>

                                            </div>
                                        </div>
                                        <label for="">Designation</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::text('designation',null,['class'=>'form-control','placeholder'=>'Designation..']); ?>

                                            </div>
                                        </div>
                                        <label for="">Department</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">home</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::text('department',null,['class'=>'form-control','placeholder'=>'Department..']); ?>

                                            </div>
                                        </div>
                                        <input type="submit" class="btn bg-teal btn-block waves-effect" value="UPDATE"/>
                                    </div>
                                </div>
                            </div>
                           <div class="col-xs-6">
                           </div>
                            <?php echo Form::close(); ?>

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

        let app = new Vue({
            el:'#app',
            data:{
                id:0,
                name:'',
                email:'',
                phone:'',
                designation:'',
                department:'',
                duplicate_company_name:false,
            },
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>