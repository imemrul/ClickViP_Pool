
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
            <a href="<?php echo URL::to('module/pool'); ?>" class="font-bold"> My pool list</a>
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
                    <div class="body" id="app">
                        <div class="row clearfix">
                            <?php echo Form::open(['url'=>URL::to('module/pool'),'class'=>'form','files'=>'true']); ?>

                            <div class="col-xs-7">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="card-title">Pool Details</h4>
                                    </div>
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label for="">Title *</label>
                                                <div class="input-group">
                                                    <span id="" class="input-group-addon">
                                                        <i class="material-icons">pool</i>
                                                    </span>
                                                    <div class="form-line" style="margin-bottom: 0px;">
                                                        <?php echo Form::text('title',null,['class'=>'form-control','placeholder'=>'Title/Name of your pool..','autocomplete'=>'off','required'=>'true']); ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="">Occupancy  *</label>
                                                <div class="input-group">
                                                    <span id="" class="input-group-addon">
                                                        <i class="material-icons">plus_one</i>
                                                    </span>
                                                    <div class="form-line" style="margin-bottom: 0px;">
                                                        <?php echo Form::text('occupancy',null,['class'=>'form-control','placeholder'=>'Occupancy..','autocomplete'=>'off','required'=>'true']); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label for="">Emirates *</label>
                                                <div class="input-group">
                                                    <span id="" class="input-group-addon">
                                                        <i class="material-icons">add_location</i>
                                                    </span>
                                                    <div class="" style="margin-bottom: 0px;">
                                                        <?php echo Form::select('emirates',\App\Location::pluck('name','id'),null,['class'=>'select','placeholder'=>'Select Emirates','required'=>'true','data-width'=>'100%']); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label for="">Address *</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">home</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::text('address',null,['class'=>'form-control','placeholder'=>'Address','autocomplete'=>'off','required'=>'true','id'=>'location']); ?>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card">
                                    <div class="header">
                                        <h4 class="card-title">Price Details</h4>
                                    </div>
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <table class="table table-bordered" id="timeslot_table">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 160px;">Date</th>
                                                        <th>Time slot</th>
                                                        <th>
                                                            <a href="#" class="btn btn-xs btn-success" @click.prevent="addRow"><i class="material-icons">add</i></a>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr v-for="(item,index) in timeSlotArr">
                                                        <td>
                                                            <input type="text" name="available_date[]" placeholder="Date..."
                                                                   class="form-control datepicker">
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $weekly_timing_session = App\Weekly_session_timing::where('host_id', auth()->user()->id)->get();
                                                            ?>
                                                            <?php $__currentLoopData = $weekly_timing_session; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <label :for="'time_slot_checkbox_<?php echo $i; ?>_'+index"><?php echo $item->title .'-'.$item->week_day.'-('. date('h:i a',strtotime($item->start_from)) . '-'. date('h:i a',strtotime($item->end_at)) .')'; ?></label>
                                                                <input value="" type="text" :name="'weekly_session_timing['+index+'][<?php echo $item->id; ?>]'"  :id="'time_slot_checkbox_<?php echo $i; ?>_'+index" class="form-control" placeholder="Session wize price">
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="btn btn-xs btn-danger" @click.prevent="removeRow(index)"><i class="material-icons">remove</i></a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label for="">Host on Premise *</label>
                                                <div class="input-group">
                                                    <span id="" class="input-group-addon">
                                                        <i class="material-icons">pool</i>
                                                    </span>
                                                    <div class="form-line" style="margin-bottom: 0px;">
                                                        <?php echo Form::select('host_on_premise',['Yes'=>'Yes','No'=>'No'],null,['class'=>'form-control','placeholder'=>'Select Premise']); ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="">Rules at Premise</label>
                                                <div class="input-group">
                                                    <span id="" class="input-group-addon">
                                                        <i class="material-icons">pool</i>
                                                    </span>
                                                    <div class="form-line" style="margin-bottom: 0px;">
                                                        <?php echo Form::textarea('rules_at_premise',null,['class'=>'form-control','placeholder'=>'Define your rules at premise','rows'=>2]); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label for="">Pool description</label>
                                                <div class="input-group">
                                                    <span id="" class="input-group-addon">
                                                        <i class="material-icons">pool</i>
                                                    </span>
                                                    <div class="form-line" style="margin-bottom: 0px;">
                                                        <?php echo Form::textarea('pool_description',null,['class'=>'form-control','placeholder'=>'Description of your pool','rows'=>3]); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label for="">Barbecue per booking</label>
                                                <div class="input-group">
                                                    <span id="" class="input-group-addon">
                                                        <i class="material-icons">plus_one</i>
                                                    </span>
                                                    <div class="form-line" style="margin-bottom: 0px;">
                                                        <?php echo Form::text('barbecue_per_booking',null,['class'=>'form-control','placeholder'=>'AED 20','autocomplete'=>'off']); ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="">Towel price per person</label>
                                                <div class="input-group">
                                                    <span id="" class="input-group-addon">
                                                        <i class="material-icons">plus_one</i>
                                                    </span>
                                                    <div class="form-line" style="margin-bottom: 0px;">
                                                        <?php echo Form::text('towel_price_per_person',null,['class'=>'form-control','placeholder'=>'AED 20','autocomplete'=>'off']); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="checkbox" name="allow_instant_booking" id="allow_instant_book" value="Yes">
                                                <label for="allow_instant_book">INSTANT BOOK</label>
                                                <p>
                                                    By ticking this box you accept that your pool will be instantly booked without a confirmation from your side. If that is not what you wish kindly keep it unticked, you will receive a booking notification for your approval
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="CREATE" class="btn btn-success btn-block">
                                </div>

                            </div>
                            <div class="col-xs-5">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="card-title">Image</h4>
                                    </div>
                                    <div class="body">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th style="width: 40px;">
                                                    <a href="#" class="btn btn-xs btn-success" @click.prevent="addImageRow"><i class="material-icons">add</i></a>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="(item, index) in imageRow">
                                                <td>
                                                    <input type="file" name="image[]" id="">
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-xs btn-danger" @click.prevent="removeImageRow(index)"><i class="material-icons">remove</i></a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="header">
                                        <h4 class="card-title">Facility</h4>
                                    </div>
                                    <div class="body">
                                        <?php $__currentLoopData = \App\Facility::orderBy('name','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <input value="<?php echo $item->id; ?>" type="checkbox" name="facility[]"  id="fa_id_<?php echo $i; ?>">
                                            <label for="fa_id_<?php echo $i; ?>"><?php echo $item->name; ?></label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
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
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDEc6y2PP50c3529HoVRWY5wru5wLE_6hY"></script>

    <script type="text/javascript">

        let app = new Vue({
            el:'#app',
            data:{
                timeSlotArr:[{
                    date:null,
                }],
                imageRow :[{}],

            },
            methods:{
                addRow:function(){
                    this.timeSlotArr.push({
                        date:null,
                    });
                    setTimeout(function () {
                        $('#timeslot_table').find('tr:last').find('input[name="available_date[]"]').bootstrapMaterialDatePicker({
                            format: 'Y-MM-DD',
                            clearButton: true,
                            weekStart: 1,
                            time: false
                        });
                    },100);
                },
                removeRow:function (index) {
                    this.timeSlotArr.splice(index,1)
                },
                addImageRow:function(){
                    this.imageRow.push({});
                },
                removeImageRow:function (index) {
                    this.imageRow.splice(index,1)
                },
            }
        });


        $(document).ready(function(){
            google.maps.event.addDomListener(window, 'load', function () {
                var places = new google.maps.places.Autocomplete(document.getElementById('location'));
                google.maps.event.addListener(places, 'place_changed', function () {
                    var place = places.getPlace();
                    var address = place.formatted_address;
                    var latitude = place.geometry.location.lat();
                    var longitude = place.geometry.location.lng();
                    var mesg = "Address: " + address;
                    mesg += "\nLatitude: " + latitude;
                    mesg += "\nLongitude: " + longitude;
                    console.log(mesg);
                    // document.getElementById('latitude').value = latitude;
                    // document.getElementById('longitude').value = longitude;
                    //localStorage.setItem("clati", latitude);
                    //localStorage.setItem("clongi", longitude);
                });
            });
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>