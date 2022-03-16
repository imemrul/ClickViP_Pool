@extends('admin.layouts.form')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <a href="{!! URL::to('module/setting') !!}" class="btn btn-sm btn-primary"> <i class="material-icons">crog</i> Setting</a>
            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible show" role="alert">
                    <strong>Congratulation</strong> {!! Session::get('message') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if(Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible show" role="alert">
                    <strong>OPS</strong> {!! Session::get('error_message') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <!-- Color Pickers -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            System Setting
                        </h2>
                    </div>
                    
                    <div class="body" id="app">
                        <div class="row clearfix">
                            {!! Form::open(['url'=>URL::to('module/setting'),'class'=>'form','files'=>'true']) !!}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="validationCustom03">App name</label>
                                        <input type="text" class="form-control" name="name" value="{{$setting->name}}" id="validationCustom03" placeholder="App name" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid app name.
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="validationCustom03">App logo</label>
                                         <input type="file" name="image" class="custom-file-input" id="customFile" accept=".png,.jpeg,.jpg">
                                        <label class="custom-file-label" style="margin-left:10px;margin-top:30px;" for="customFile">Choose file</label>
                                        
                                        <br>
                                        
                                        <!--label for="validationCustom01">Image Height and Width must be in 650 X 650.</label-->
                                        <div class="invalid-feedback">
                                            Please Select a valid Image.
                                        </div>
                                        <br>
                                        <br>
                                        <img src="uploads/{{$setting->image}}" class="rounded avatar-lg" alt="" />
                                    </div>
                                </div>
                                
                                    <div class="form-group">
                                        <label for="validationCustom03">App domain url</label>
                                        <input type="text" class="form-control" name="url" value="{{$setting->url}}" id="validationCustom03" placeholder="Domain url" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid url.
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="validationCustom03">SMS Username</label>
                                        <input type="text" class="form-control" name="username" value="{{$setting->username}}" id="validationCustom03" placeholder="Username" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid username.
                                        </div>
                                    </div>
                                    
                                     <div class="form-group">
                                        <label for="validationCustom03">SMS Password</label>
                                        <input type="text" class="form-control" name="password" value="{{$setting->password}}" id="validationCustom03" placeholder="Password" >
                                        <div class="invalid-feedback">
                                            Please provide a valid password.
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="validationCustom03">SMS Senderid</label>
                                        <input type="text" class="form-control" name="senderid" value="{{$setting->senderid}}" id="validationCustom03" placeholder="senderid" >
                                        <div class="invalid-feedback">
                                            Please provide a valid senderid.
                                        </div>
                                    </div>
                                    
                                        <div class="form-group">
                                        <label for="validationCustom03">SMS Peid</label>
                                        <input type="text" class="form-control" name="peid" value="{{$setting->peid}}" id="validationCustom03" placeholder="PE ID" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid peid.
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                     <div class="form-group col-md-6">
                                        <label for="validationCustom03">Contact no</label>
                                        <input type="number" class="form-control" name="mobile" value="{{$setting->mobile}}" id="validationCustom03" placeholder="Contact no" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid contact no.
                                        </div>
                                    </div>
                                    
                                        <div class="form-group col-md-6">
                                        <label for="validationCustom03">Whatsapp no</label>
                                        <input type="number" class="form-control" name="whatsapp" value="{{$setting->whatsapp}}" id="validationCustom03" placeholder="Whatsapp no" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Whatsapp no.
                                        </div>
                                    </div>
                                     </div>
                                     
                                     <div class="form-group">
                                        <label for="validationCustom03">Email ID</label>
                                        <input type="email" class="form-control" name="email" value="{{$setting->email}}" id="validationCustom03" placeholder="Email ID" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Email.
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="validationCustom03">Instamojo link</label>
                                        <input type="text" class="form-control" name="instamojo" value="{{$setting->instamojo}}" id="validationCustom03" placeholder="Instamojo link" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Instamojo link.
                                        </div>
                                    </div>
                                    
                                       <div class="form-group">
                                        <label for="validationCustom03">Facebook link</label>
                                        <input type="text" class="form-control" name="facebook" value="{{$setting->facebook}}" id="validationCustom03" placeholder="Facebook link" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Facebook link.
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        
                                         <div class="form-group col-md-4">
                                        <label for="validationCustom03">Normal delivery charges</label>
                                        <input type="number" class="form-control" name="normal_charges" value="{{$setting->normal_charges}}" id="validationCustom03" placeholder="Normal delivery charges" required>
                                        <div class="invalid-feedback">
                                            Please enter delivery charges.
                                        </div>
                                         </div>
                                         
                                         <div class="form-group col-md-8">
                                        <label for="validationCustom03">Normal delivery message</label>
                                        <input type="text" class="form-control" name="normal_message" value="{{$setting->normal_message}}" id="validationCustom03" placeholder="Message shown to customer for normal delivery" required>
                                        <div class="invalid-feedback">
                                            Please enter delivery charges.
                                        </div>
                                         </div>
                                          <div class="form-group col-md-4">
                                        <label for="validationCustom03">Enable slots for normal delivery</label><br>
                                        <input type="checkbox"  name="slots" <?php if($setting->slots=='On'){ echo "checked";}?> value="On" id="validationCustom03" placeholder="Free delivery" required>&nbsp;On
                                        <div class="invalid-feedback">
                                            Please enter minimum amount.
                                        </div>
                                         </div>
                                         
                                         <div class="form-group col-md-4">
                                        <label for="validationCustom03">Free delivery for min order</label>
                                        <input type="number" class="form-control" name="minimum_amount" value="{{$setting->minimum_amount}}" id="validationCustom03" placeholder="Free delivery" required>
                                        <div class="invalid-feedback">
                                            Please enter minimum amount.
                                        </div>
                                         </div>
                                    <div class="form-group col-md-4">
                                        <label for="validationCustom03">Enable express delivery</label><br>
                                        <input type="checkbox"  name="express_delivery" <?php if($setting->express_delivery=='On'){ echo "checked";}?> value="On" id="validationCustom03" placeholder="Free delivery" required>&nbsp;On
                                        <div class="invalid-feedback">
                                            Please enter minimum amount.
                                        </div>
                                         </div>
                                    <div class="form-group col-md-4">
                                        <label for="validationCustom03">Express delivery charges</label>
                                        <input type="number" class="form-control" name="express_charges" value="{{$setting->express_charges}}" id="validationCustom03" placeholder="Express delivery charges" required>
                                        <div class="invalid-feedback">
                                            Please enter delivery charges.
                                        </div>
                                         </div>
                                         
                                        <div class="form-group col-md-8">
                                        <label for="validationCustom03">Express delivery message</label>
                                        <input type="text" class="form-control" name="express_message" value="{{$setting->express_message}}" id="validationCustom03" placeholder="Message shown to custome for express delivery" required>
                                        <div class="invalid-feedback">
                                            Please enter delivery charges.
                                        </div>
                                         </div>
                                         
                                        
                                    </div>
                                    
                                   </div>
                                
                                </div>
                            </div>
                            <input type="hidden" name="qid" value="">
                           <div class="col-xs-12">
                            <div class="form-group">
                                <input type="submit" name="submit" value="STORE" class="btn btn-success btn-block">
                            </div>
                           </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- #END# Color Pickers -->

    </div>
@endsection
@section('custom_page_script')
    <script type="text/javascript">

        var app = new Vue({
            el:'#app',
            data:{

            },
            mounted() {

            },
            methods:{


            }
        });
        $('document').ready(function(){

        });
    </script>
@endsection
