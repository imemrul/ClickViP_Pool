
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Summary mail</title>
</head>
<body>
<svg class="ui-icon i-chat chat-read-icon gtm-chat-click"><use xlink:href="#i-chat"></use></svg>
<table border="0" cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
        <td>
            Hi,
            <br>
            Here is the list of <span class="il">activities</span> done by the Ad Sales team.
            <span style="color:#d95e46;text-transform:uppercase;font-size:12px">DATE: <?php echo Carbon\Carbon::now()->toDateString(); ?></span>
            <?php if(sizeof($activities) == 0): ?>
                <h4>No summary was found.</h4>
            <?php endif; ?>
            <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h4 style="margin:0px 0px;padding: 5px 3px;background:#00987717"><?php echo \App\User::find($index)->full_name; ?></h4>
                <?php $counter = 1; ?>
                <?php $__currentLoopData = $activity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p style="padding:0;font-weight:700;font-size:12px;line-height:11px;margin:6px 0 0;color:#009877">
                        <?php echo $counter; ?>. <?php echo $row->title; ?>

                    </p>
                    <p style="padding:0;font-weight:300;font-size:12px;line-height:17px;margin:6px 2px 6px 2px;color:#424e4e;display:block">
                        <span style="font-size:10px;color:#fff;background:#afb7ad;padding:3px 7px;border-radius:2px;margin-right:4px">
                            <?php echo get_activity_list()[$row->type_of_activity]; ?>

                        </span>
                        <?php if($row->start_time != null): ?>
                        <span style="font-size: 10px; font-style: italic">
                            <?php echo $row->start_time; ?>

                        </span>
                        <?php endif; ?>
                    </p>
                    <p style="padding:0;font-weight:300;font-size:12px;line-height:17px;margin:0px 2px 11px 2px;color:#424e4e;display:block">
                        <?php echo $row->remarks; ?>

                    </p>
                    <?php $counter++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
        <td colspan="2" class="text-center">
            <a href="<?php echo URL::to('module/activity'); ?>">Show more</a>
        </td>
    </tr>
    </tfoot>
</table>




</body>
</html>