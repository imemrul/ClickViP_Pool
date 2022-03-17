<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="block-header">
            <a href="<?php echo URL::to('module/pages'); ?>" class="btn btn-sm btn-primary"> <i class="material-icons">list</i> lists of Page</a>
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
                            Create new page
                        </h2>
                    </div>
                    <div class="body" id="app">
                        <div class="row clearfix">
                            <?php echo Form::open(['url'=>URL::to('module/page'),'class'=>'form']); ?>

                            <div class="col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="card-title">Insert Page</h4>
                                    </div>
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label for="">Title</label>
                                                <div class="input-group">
                                                    <span id="" class="input-group-addon">
                                                        <i class="material-icons">title</i>
                                                    </span>
                                                    <div class="form-line focused" style="margin-bottom: 0px;">
                                                        <?php echo Form::text('title',null,['class'=>'form-control','placeholder'=>'Title','autocomplete'=>"off",'required'=>'required']); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label for="">Page Body</label>
                                                <div class="form-group">
                                                    <textarea class="form-control" name="body" id="summernote"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="SAVE" class="btn btn-success btn-lg">
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

    <script type="text/javascript">

        let app = new Vue({
            el:'#app',
            data:{
                contact_persons:[],
                client_id:0
            },
            methods:{

            }
        });

        $('.client_name_autoCompleter').autoComplete({
            resolverSettings: {
                url: '<?php echo URL::to('get_clients'); ?>'
            },
            minLength:2,
            preventEnter:true
        }).on('autocomplete.select', function (evt, item) {
            console.log(item.value);
            axios.get('<?php echo URL::to('get_contact_person_by_client'); ?>/'+item.value).then(function(res){
                app.client_id = item.value;
                app.contact_persons = res.data;
            })
        });
        $(document).ready(function() {
        $('#summernote').summernote({
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                  // set focus to editable area after initializing summernote
        });
    });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>