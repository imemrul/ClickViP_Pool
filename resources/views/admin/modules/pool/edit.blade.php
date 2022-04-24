@extends('admin.layouts.form')
@section('custom_page_style')
    <style>
        table td{
            vertical-align: middle!important;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <a href="{!! URL::to('module/pool') !!}" class="font-bold"> My pool list</a>
            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible show" role="alert">
                    <strong>Congratulation</strong> {!! Session::get('message') !!}
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
                    <div class="body" id="app">
                        <div class="row clearfix">
                            {!! Form::model($result,['url'=>URL::to('module/pool',$result->id),'class'=>'form','files'=>'true','method'=>'put']) !!}
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
                                                        {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Title/Name of your pool..','autocomplete'=>'off','required'=>'true']) !!}
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
                                                        {!! Form::text('occupancy',null,['class'=>'form-control','placeholder'=>'Occupancy..','autocomplete'=>'off','required'=>'true']) !!}
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
                                                        {!! Form::select('emirates',\App\Location::pluck('name','id'),null,['class'=>'select','placeholder'=>'Select Emirates','required'=>'true','data-width'=>'100%']) !!}
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
                                                {!! Form::text('address',null,['class'=>'form-control','placeholder'=>'Address','autocomplete'=>'off','required'=>'true','id'=>'location']) !!}
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
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <td style="width: 100px;">Date</td>
                                                        <td colspan="2">Price</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($result->session_wise_price->where('date', date('Y-m-d'))->groupBy('date') as $index=>$date)
                                                        <tr>
                                                            <td>{!! $index !!}</td>
                                                            <td>
                                                            @foreach($date as $date_row)
                                                                <p><strong>{!! $date_row->price !!} AED</strong> - <small>{!! $date_row->weekly_session_time_slot->title .'-'.$date_row->weekly_session_time_slot->week_day.'-('. date('h:i a',strtotime($date_row->weekly_session_time_slot->start_from)) . '-'. date('h:i a',strtotime($date_row->weekly_session_time_slot->end_at)) .')' !!}</small></p>
                                                            @endforeach
                                                            </td>
                                                            <td style="width: 50px;" class="text-center">
                                                                <a href="#" class="btn btn-xs btn-danger" onclick="delete_with_swal('{!! url('module/pool/delete_session_time_slot?pool_id='.$result->id,$index) !!}','{!! csrf_token() !!}',$(this).closest('tr'))"><i class="material-icons">remove</i></a>

                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                <p class="text-muted">Want to add more price form the bellow time slot ? </p>
                                                <table class="table table-bordered" id="timeslot_table">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 160px;">Date</th>
                                                        <th>Time slot</th>
                                                        <th class="text-center">
                                                            {{-- <a href="#" class="btn btn-xs btn-success" @click.prevent="addRow"><i class="material-icons">add</i></a> --}}
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr v-for="(item,index) in timeSlotArr">
                                                        <td>
                                                            <strong>Start Date:</strong>
                                                            <input type="text" name="start_date" placeholder="Start Date..."
                                                                   class="form-control datepicker">
                                                            <strong>End Date:</strong>
                                                            <input type="text" name="end_date" placeholder="End Date..."
                                                                   class="form-control datepicker">
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $weekly_timing_session = App\Weekly_session_timing::where('host_id', auth()->user()->id)->get();
                                                            ?>
                                                            @foreach($weekly_timing_session as $i=>$item)
                                                                <?php
                                                                        //$value =
                                                                ?>
                                                                <label :for="'time_slot_checkbox_{!! $i !!}_'+index">{!! $item->title .'-'.$item->week_day.'-('. date('h:i a',strtotime($item->start_from)) . '-'. date('h:i a',strtotime($item->end_at)) .')' !!}</label>
                                                                <input value="" type="text" :name="'weekly_session_timing['+index+'][{!! $item->id !!}]'"  :id="'time_slot_checkbox_{!! $i !!}_'+index" class="form-control" placeholder="Session Price">
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            {{-- <a href="#" class="btn btn-xs btn-danger" @click.prevent="removeRow(index)"><i class="material-icons">remove</i></a> --}}
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
                                                        {!! Form::select('host_on_premise',['Yes'=>'Yes','No'=>'No'],null,['class'=>'form-control','placeholder'=>'Select Premise']) !!}
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
                                                        {!! Form::textarea('rules_at_premise',null,['class'=>'form-control','placeholder'=>'Define your rules at premise','rows'=>2]) !!}
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
                                                        {!! Form::textarea('pool_description',null,['class'=>'form-control','placeholder'=>'Description of your pool','rows'=>3]) !!}
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
                                                        {!! Form::text('barbecue_per_booking',null,['class'=>'form-control','placeholder'=>'AED 20','autocomplete'=>'off']) !!}
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
                                                        {!! Form::text('towel_price_per_person',null,['class'=>'form-control','placeholder'=>'AED 20','autocomplete'=>'off']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="checkbox" name="allow_instant_booking" id="allow_instant_book" {!! $result->allow_instant_booking == 'Yes' ? 'checked' : '' !!} value="Yes">
                                                <label for="allow_instant_book">INSTANT BOOK</label>
                                                <p>
                                                    By ticking this box you accept that your pool will be instantly booked without a confirmation from your side. If that is not what you wish kindly keep it unticked, you will receive a booking notification for your approval
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="UPDATE" class="btn btn-success btn-block">
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
                                            @foreach($result->images as $image)
                                                <tr>
                                                    <td>
                                                        <img src="{!! asset('public/uploads/'.$image->name) !!}"
                                                             alt="Pool image" style="width: 100px;">
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-xs btn-danger" onclick="delete_with_swal('{!! url('module/pool/delete_image',$image->id) !!}','{!! csrf_token() !!}',$(this).closest('tr'))"><i class="material-icons">remove</i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
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
                                        @foreach(\App\Facility::orderBy('name','desc')->get() as $i=>$item)
                                            <?php
                                                $ischecked = '';
                                                foreach($result->facilities as $facility){
                                                    if($facility->facility_id == $item->id){
                                                        $ischecked = 'checked';
                                                        break;
                                                    }
                                                }
                                            ?>
                                            <input value="{!! $item->id !!}" type="checkbox" name="facility[]" {!! $ischecked !!}  id="fa_id_{!! $i !!}">
                                            <label for="fa_id_{!! $i !!}">{!! $item->name !!}</label>
                                        @endforeach
                                    </div>
                                </div>
                           </div>
                            {!! Form::close() !!}

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection
@section('custom_page_style')

@endsection
@section('custom_page_script')
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
                removeImage:function(_id){
                    delete_with_swal()
                }
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
@endsection