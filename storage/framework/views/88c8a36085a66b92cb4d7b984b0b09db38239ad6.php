<?php $__env->startSection('custom_page_style'); ?>
    <style>
        table td{
            vertical-align: middle!important;
        }
        .activity_tag{
            position: absolute;
            top: 0;
            right: 0;
            font-size: 9px;
            font-style: italic;
            background: #009877;
            color: #fff;
            padding: 2px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="block-header">
            <a href="<?php echo URL::to('module/pool'); ?>"><strong>List of Pool</strong></a>
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
                        <a href="<?php echo URL::to('module/pool/create'); ?>" class="btn btn-xs btn-primary"> <i class="material-icons">add_circle_outline</i> Create New Pool</a>
                    </div>
                    <div class="body table-responsive">
                        <p>TOTAL POOL: <?php echo $results->total();; ?></p>
                        <table class="table table-striped table-bordered table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>Pool ID</th>
                                <th style="width:250px;">Title</th>
                                <th>Location</th>
                                <th>Occupancy</th>
                                <th>Status</th>
                                <th style="width:100px;">Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="font-12">
                                <td>PID_<?php echo $row->id; ?></td>
                                <td style="width:250px;position:relative;">
                                    <?php echo $row->title; ?>

                                </td>
                                <td><?php echo isset($row->location->name) ? $row->location->name : 'N/A'; ?></td>
                                <td><?php echo $row->occupancy; ?></td>
                                <th><?php echo $row->status; ?></th>
                                <td style="width:100px;">
                                    <a data-toggle="tooltip" data-title="View" class="btn btn-xs btn-warning" href="<?php echo URL::to('module/pool/'.$row->id,'edit'); ?>"><i class="material-icons">edit</i></a>
                                    <a data-toggle="tooltip" data-title="Delete" class="btn btn-xs btn-danger delete_with_swal" href="<?php echo URL::to('module/pool',$row->id); ?>"><i class="material-icons">remove</i></a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
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