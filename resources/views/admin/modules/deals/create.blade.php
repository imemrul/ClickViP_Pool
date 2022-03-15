﻿@extends('admin.layouts.form')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <a href="{!! URL::to('module/deals') !!}" class="btn btn-sm btn-primary"> <i class="material-icons">list</i> lists of deals</a>
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
                    <div class="header">
                        <h2>
                            Create new deals
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
                            {!! Form::open(['url'=>URL::to('module/deals'),'class'=>'form']) !!}
                            <div class="col-xs-7">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="card-title">Deals information</h4>
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
                                                        {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Name','autocomplete'=>"off",'required'=>'required']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label for="">Business amount</label>
                                                <div class="input-group">
                                                    <span id="" class="input-group-addon">
                                                        <i class="material-icons">attach_money</i>
                                                    </span>
                                                    <div class="form-line" style="margin-bottom: 0px;">
                                                        {!! Form::text('amount',null,['class'=>'form-control','placeholder'=>'Name','autocomplete'=>"off",'required'=>'required']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label for="">Creation Date</label>
                                                <div class="input-group">
                                                    <span id="" class="input-group-addon">
                                                        <i class="material-icons">date_range</i>
                                                    </span>
                                                    <div class="form-line" style="margin-bottom: 0px;">
                                                        {!! Form::text('creation_date',\Carbon\Carbon::now()->toDateString(),['class'=>'form-control datepicker','placeholder'=>'Creation date..']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="">Expected Closing Date</label>
                                                <div class="input-group">
                                                    <span id="" class="input-group-addon">
                                                        <i class="material-icons">date_range</i>
                                                    </span>
                                                    <div class="form-line" style="margin-bottom: 0px;">
                                                        {!! Form::text('closing_date',null,['class'=>'form-control datepicker','placeholder'=>'Expected closing date..']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-7">
                                                <label for="">Executives to take care of this deals</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">file_copy</i>
                                                    </span>
                                                    <div class="">
                                                        {!! Form::select('executive_ids[]',\App\User::where('roll_id',2)->pluck('full_name','id'),auth()->user()->id,['class'=>'selectpicker','multiple'=>'true','title'=>'--Executives--']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-5">
                                                <label for="">Stage</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">file_copy</i>
                                                    </span>
                                                    <div class="">
                                                        {!! Form::select('stage',get_deals_stage(),null,['class'=>'selectpicker','title'=>'--Stage--','data-width'=>'fit','required'=>'true']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label for="">Remarks</label>
                                                <div class="input-group">
                                                    <span id="" class="input-group-addon">
                                                        <i class="material-icons">title</i>
                                                    </span>
                                                    <div class="form-line" style="margin-bottom: 0px;">
                                                        {!! Form::textarea('remarks',null,['class'=>'form-control','placeholder'=>'Remarks','rows'=>'2','cols'=>'1']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="SAVE" class="btn btn-success btn-lg">
                                </div>

                            </div>
                            <div class="col-xs-5">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="card-title">Client details</h4>
                                    </div>
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label for="">Title</label>
                                                <div class="input-group">
                                                    <span id="" class="input-group-addon">
                                                        <i class="material-icons">person</i>
                                                    </span>
                                                    <div class="form-line autoCompleter" style="margin-bottom: 0px;">
                                                        <input type="hidden" name="client_id" v-model="client_id">
                                                        {!! Form::text('client_name',null,['class'=>'form-control client_name_autoCompleter','placeholder'=>'Name','autocomplete'=>"off",'required'=>'required']) !!}
                                                    </div>
                                                </div>
                                                <div class="input-group" v-show="_.size(contact_persons) > 0">
                                                    <h4>Contact person of this client</h4>
                                                    <table class="table">
                                                        <tbody>
                                                        <tr v-for="contact_person in contact_persons">
                                                            <td>
                                                                <input name="contact_person_ids[]" :value="contact_person.id" type="checkbox" :id="'contact_person_id_'+contact_person.id" class="filled-in" />
                                                                <label :for="'contact_person_id_'+contact_person.id" v-html="contact_person.name + '&nbsp;&nbsp;||&nbsp;&nbsp;<small>'+ contact_person.phone+'</small>'"></label>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
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
                url: '{!! URL::to('get_clients') !!}'
            },
            minLength:2,
            preventEnter:true
        }).on('autocomplete.select', function (evt, item) {
            console.log(item.value);
            axios.get('{!! URL::to('get_contact_person_by_client') !!}/'+item.value).then(function(res){
                app.client_id = item.value;
                app.contact_persons = res.data;
            })
        });
    </script>
@endsection