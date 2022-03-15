
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="block-header">
            <a href="<?php echo URL::to('module/client'); ?>" class="btn btn-sm btn-primary"> <i class="material-icons">list</i> Patient lists</a>
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
                            Create new patient
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body" id="app">
                        <div class="row clearfix">
                            <?php echo Form::open(['url'=>URL::to('module/client'),'class'=>'form','files'=>'true']); ?>

                            <div class="col-xs-6">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="card-title">Patient information</h4>
                                    </div>
                                    <div class="body">
                                        <label for="">Name</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::text('name',null,['class'=>'form-control','placeholder'=>'Name..','autocomplete'=>'off','required'=>'true']); ?>

                                            </div>
                                        </div>

                                        <label for="">Address</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">home</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::textarea('address',null,['class'=>'form-control','placeholder'=>'Address','rows'=>'2','cols'=>'1','autocomplete'=>'off','required'=>'true']); ?>

                                            </div>
                                        </div>

                                        <label for="">Phone</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">store</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::text('contact_no',null,['class'=>'form-control','placeholder'=>'Contact No..','autocomplete'=>'off','required'=>'true']); ?>

                                            </div>
                                        </div>
                                        <label for="">Age</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">store</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::text('age',null,['class'=>'form-control','placeholder'=>'Age..','autocomplete'=>'off']); ?>

                                            </div>
                                        </div>

                                        <label for="">Disease type</label>
                                        <div class="input-group">
                                            <span id="" class="input-group-addon">
                                                <i class="material-icons">store</i>
                                            </span>
                                            <div class="form-line" style="margin-bottom: 0px;">
                                                <?php echo Form::text('disease_type',null,['class'=>'form-control','placeholder'=>'Details of the disease..','autocomplete'=>'off']); ?>

                                            </div>
                                        </div>

                                        <label for="">Owner/Agent</label>
                                        <div class="input-group">
                                            <?php echo Form::select('agent_id',\App\User::where('roll_id',2)->pluck('full_name','id'),[auth()->user()->id],['class'=>'selectpicker','title'=>'--Agent--']); ?>

                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="CREATE" class="btn btn-success btn-block">
                                </div>

                            </div>
                           <div class="col-xs-6">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="card-title">Prescription (Optional)</h4>
                                    </div>
                                    <div class="body">
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

        let app = new Vue({
            el:'#app',
            data:{
                prescriptions:[
                ],
                prescription_date:null,
                name_of_doctor:null,
                phone:null,
                speciality:null,
                description:null,
                attachment:null,

            },
            methods:{
                add_prescription:function(){
                    this.prescriptions.push(
                        {
                            prescription_date:$('#date_of_prescription').val(),
                            name_of_doctor:this.name_of_doctor,
                            phone:this.phone,
                            speciality:this.speciality,
                            description:this.description,
                            attachment:this.attachment,
                        }
                    );
                    this.clear_prescription_field();
                },
                clear_prescription_field:function(){
                    this.prescription_date = '';
                    this.name_of_doctor = '';
                    this.phone = '';
                    this.speciality = '';
                    this.description = '';
                    this.attachment = '';
                    $('#date_of_prescription').val('');
                },
                delete_prescription_row:function(index){
                    this.prescriptions.splice(index, 1);
                }
            }
        });


    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>