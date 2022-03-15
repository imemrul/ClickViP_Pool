
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
            <a href="<?php echo URL::to('module/client'); ?>">Client list</a>
        </div>
        <!-- Color Pickers -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-xs-4">
                                <p class="m-b-0"><?php echo $client->name; ?> <small><strong> - <?php echo $client->industry; ?></strong></small></p>
                                <small><?php echo $client->address; ?></small>
                            </div>
                            <div class="col-xs-4">
                                <p class="m-b-0"><strong>Agent</strong></p>
                                <?php echo $client->agent->full_name; ?>

                            </div>
                            <div class="col-xs-4">
                                <p class="text-right">Onboard: <?php echo $client->created_at; ?></p>
                                <span class="contact_person_created_by">Created by: <?php echo isset($client->creator->full_name) ? $client->creator->full_name : 'N/A'; ?></span>
                            </div>
                        </div>

                    </div>
                    <div class="body" id="app">
                        <div class="row">
                            <div class="col-xs-7">
                                <div class="card">
                                    <div class="header">
                                        <p>DEALS</p>
                                    </div>
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <table class="table table-bordered table-responsive margin-0 font-12">
                                                    <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Creation Date</th>
                                                        <th>Closing Date</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $__currentLoopData = $client->deals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <td>
                                                                <a href="<?php echo URL::to('module/deals',$deal->id); ?>">
                                                                    <?php echo $deal->title; ?>

                                                                </a>

                                                            </td>
                                                            <td>
                                                                <p class="m-b-0"><?php echo $deal->creation_date; ?></p>
                                                            </td>
                                                            <td>
                                                                <p><?php echo $deal->closing_date; ?></p>
                                                            </td>
                                                            <td>
                                                                <p><?php echo $deal->amount; ?> TK</p>
                                                            </td>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xs-5">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="panel-group">
                                            <div class="panel panel-col-grey">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title clearfix">
                                                        <a class="pull-left">
                                                            <i class="material-icons">perm_contact_calendar</i> Activities
                                                        </a>
                                                        <a data-toggle="modal" data-target="#myModal" class="pull-right" href="#">
                                                            <i data-toggle="tooltip" data-title="Create new activity" class="material-icons">add</i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div>
                                                    <div class="panel-body">
                                                        <div class="card" style="margin-bottom: 0px;">
                                                            <div class="body">
                                                                <ul class="">

                                                                </ul>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="panel panel-col-grey">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title clearfix">
                                                        <a class="pull-left">
                                                            <i class="material-icons">perm_contact_calendar</i> Contact persons
                                                        </a>
                                                        <a data-toggle="tooltip" data-title="Create new contact persons" class="pull-right" href="#">
                                                            <i class="material-icons">add</i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div>
                                                    <div class="panel-body">
                                                        <div class="card" style="margin-bottom: 0px;">
                                                            <div class="body clearfix">
                                                                <ul class="">
                                                                </ul>
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