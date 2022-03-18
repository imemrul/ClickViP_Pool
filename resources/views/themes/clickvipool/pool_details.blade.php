@include('themes.clickvipool.header')


<section class="page">

    <!-- ===  Page header === -->

    <div class="page-header" style="background-image:url({!! asset('public/images/page_header_background.jpg') !!})">
        <div class="container">
            <h2 class="title">Make a booking</h2>
            <p>Proceed to booking step 2</p>
        </div>
    </div>

    <!-- ===  Checkout steps === -->

    <div class="step-wrapper">
        <div class="container">
            <div class="stepper">
                <ul class="row">
                    <li class="col-md-4 active">
                        <a href="#"><span data-text="Room & rates"></span></a>
                    </li>
                    <li class="col-md-4">
                        <a href="{!! url('pool/payment',$result->slug) !!}"><span data-text="Reservation"></span></a>
                    </li>
                    <li class="col-md-4">
                        <a href="{!! url('pool/payment/confirmation',$result->slug) !!}"><span
                                    data-text="Checkout"></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- ===  Checkout === -->

    <div class="checkout">

        <div class="container">

            <div class="clearfix">

                <!-- ========================  Cart wrapper ======================== -->
                {!! Form::open(['url'=>url('booking'),'file'=>true]) !!}
                {!! Form::hidden('pool_id',$result->id) !!}
                <div class="cart-wrapper pool_info_box padding_top_0">

                    <!--cart header -->

                    <div class="cart-block cart-block-header clearfix">
                        <span>Pool details</span>
                    </div>

                    <!--cart items-->

                    <div class="row">

                        <div class="col-xs-12 col-sm-6">
                            <a href="#" @click.prevent><img class="img-fluid img-responsive pool_image"
                                                            src="{!! asset('public/uploads/'.$result->images->first()->name) !!}"
                                                            alt=""/></a>
                        </div>
                        <div class="col-xs-12 col-sm-6">

                            <div class="h2"><a href="#">{!! $result->title !!}</a></div>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        Host
                                    </th>
                                    <th>
                                        {!! $result->host->full_name !!}
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        Occupancy
                                    </th>
                                    <th>
                                        {!! $result->occupancy !!}
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        Location
                                    </th>
                                    <th>
                                        {!! $result->address !!}
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                        {!! $result->pool_description !!}
                                    </th>
                                </tr>
                                <tr>
                                    <th style="width: 150px;">
                                        Host on premise
                                    </th>
                                    <th>
                                        <p><strong>{!! $result->host_on_premise !!}</strong></p>
                                        <p>Rules: {!! $result->rules_at_premise !!}</p>
                                    </th>
                                </tr>
                                <tr>
                                    <th style="width: 150px;">
                                        Facilities
                                    </th>
                                    <th>
                                        <?php
                                        $facilities = \App\Facility::orderBy('name', 'desc')->get();
                                        ?>
                                        @foreach($facilities->chunk(2) as $items)
                                            <div class="row">
                                                @foreach($items as $i=>$item)
                                                    <div class="col-xs-6">
                                                    <span class="checkbox">
                                                        <input name="facilities[]" value="{!! $item->id !!}"
                                                               type="checkbox" id="fa_id_{!! $i !!}">
                                                        <label for="fa_id_{!! $i !!}">{!! $item->name !!}</label>
                                                    </span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </th>
                                </tr>

                                </thead>
                            </table>

                        </div>

                    </div>

                    <!--cart prices -->

                    <div class="clearfix">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="margin_bottom_2">Available time slot</h4>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12 margin_bottom_2">
                                        <div class="date" id="dateArrival" data-text="Select Date">
                                            <input name="booking_date" class="datepicker form-control" placeholder="Select a date"
                                                   @blur="calendar_input_for_booking({!! $result->id !!})"
                                                   id="booking_date"/>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div v-for="(items, index) in available_time_slot">
                                        <div class="col-xs-3 text-center time_slot_box" v-for="(item,i) in items">
                                            <div :class="'box_container '+ check_available_slot_status(item.status)">
                                                <h2 v-text="index"></h2>
                                                <p><span v-text="item.title"></span> - <strong
                                                            v-text="item.price+' AED'"></strong></p>
                                                <p v-text="item.start_from+'-'+item.end_at"></p>
                                                <span class="checkbox time_slot_radio"
                                                      v-if="item.status === 'Available'">
                                                    <input name="time_slot_id" :value="item.id" type="radio"
                                                           :id="'slot_id_'+i">
                                                    <label :for="'slot_id_'+i"></label>
                                                </span>
                                                <span class="status badge" v-text="item.status"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <h4 v-text="mes_for_available_time_slot"></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default clearfix">
                            <div class="panel-heading">
                                <h4 class="margin_bottom_0">Others cost</h4>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Barbecue price - <small>({!! $result->barbecue_per_booking !!}
                                                    AED / Person)</small></label>
                                            <input type="number" name="barbeque_qty" class="form-control"
                                                   placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="">Towel price - <small>({!! $result->towel_price_per_person !!}
                                                    AED / Person)</small></label>
                                            <input type="number" name="towels_qty" class="form-control"
                                                   placeholder="Quantity">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default clearfix">
                            <div class="panel-heading">
                                <h4 class="margin_bottom_0">Guest details</h4>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label for="">NO of adult</label>
                                            <input type="number" name="adult_qty" class="form-control"
                                                   placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label for="">NO of children</label>
                                            <input type="number" name="children_qty" class="form-control"
                                                   placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label for="">NO of infants</label>
                                            <input type="number" name="infants_qty" class="form-control"
                                                   placeholder="Quantity">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- ========================  Cart navigation ======================== -->

                    <div class="clearfix">
                        <div class="cart-block cart-block-footer cart-block-footer-price clearfix">
                            <div>
                                <a href="#" class="btn btn-clean-dark">Change</a>
                            </div>
                            <div>
                                <input type="submit" value="BOOK" class="btn btn-main">
                            </div>
                        </div>
                    </div>

                </div>
                {!! Form::close() !!}
            </div>

        </div> <!--/container-->
    </div> <!--/checkout-->

</section>

<!-- ========================  Subscribe ======================== -->

<section class="subscribe">
    <div class="container">
        <div class="box">
            <h2 class="title">Subscribe</h2>
            <div class="text">
                <p>& receive free premium gifts</p>
            </div>
            <div class="form-group">
                <input type="text" value="" placeholder="Subscribe" class="form-control"/>
                <button class="btn btn-sm btn-main">Go</button>
            </div>
        </div>
    </div>
</section>
@include('themes.clickvipool.footer')