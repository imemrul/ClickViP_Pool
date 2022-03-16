
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
            <div class="row">
                <div class="col-xs-4">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">perm_identity</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL Guest</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">0</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">perm_identity</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL Host</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">0</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="info-box bg-brown hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">text_format</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL Booking</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">0</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <i>د.إ</i>
                        </div>
                        <div class="content">
                            <div class="text">REVENUE</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">0</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="info-box bg-amber hover-expand-effect">
                        <div class="icon">
                            <i>د.إ</i>
                        </div>
                        <div class="content">
                            <div class="text">Host COMMISSION</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">0</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="info-box bg-red hover-expand-effect">
                        <div class="icon">
                            <i>د.إ</i>
                        </div>
                        <div class="content">
                            <div class="text">EXPENSE</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">0</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-xs-12">
                <div class="card">
                    <div class="header bg-teal">
                        <div class="row clearfix">
                            <div class="col-xs-12">
                                <h5 class="">Host Payment list for Followup Call</h5>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-xs-12">
                                <table class="table table-striped table-bordered table-hover table-responsive">
                                    <thead>
                                    <tr>
                                        <th style="width:250px;">Title</th>
                                        <th>
                                            Host Name
                                        </th>
                                        <th>Creation Date</th>
                                        <th>Closing Date</th>
                                        <th>Amount</th>
                                        <th>Stage</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
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
        $(document).ready(function(){

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>