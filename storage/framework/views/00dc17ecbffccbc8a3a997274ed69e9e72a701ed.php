<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="block-header">
            <strong>Page lists</strong>
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
                        <a href="<?php echo URL::to('module/page/create'); ?>" class="btn btn-xs btn-primary"> <i class="material-icons">add_circle_outline</i> Create New</a>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a id="executive_allocation" href="javascript:void(0);">Delete multiple</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body table-responsive">
                        <p>TOTAL Page: <?php echo $results->total();; ?></p>
                        <table class="table table-striped table-bordered table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>Page ID</th>
                                <th style="width:250px;">Title</th>
                                <th>Published</th>
                                <th>Update</th>
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
                                <td><?php echo isset($row->created_at) ? $row->created_at : 'N/A'; ?></td>
                                <td><?php echo $row->updated_at; ?></td>
                                <th><?php echo $row->status; ?></th>
                                <td style="width:100px;">
                                    <a data-toggle="tooltip" data-title="Edit & Update" class="btn btn-xs btn-primary" href="<?php echo URL::to('module/page/'.$row->id,'edit'); ?>"><i class="material-icons">edit</i></a>
                                    <a data-toggle="tooltip" target="_blank" data-title="View Page" class="btn btn-xs btn-warning" href="<?php echo URL::to(''.$row->slug); ?>"><i class="material-icons">visibility</i></a>
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
 
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>