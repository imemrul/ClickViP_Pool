@include('themes.clickvipool.header')
<section class="page">
    <!-- ===  Page header === -->
        <div class="page-header" style="background-image:url({{ asset('public/themes/clickvipool/assets/images/header-1.jpg')}})">
            <div class="container">
                <h2 class="title">POOL &amp; Search Result</h2>
            </div>
        </div>
        <div class="rooms rooms-category">
            <div class="container">

                <div class="row">

                    <!-- === rooms item === -->

                    {{-- <div class="col-sm-6 col-md-6">
                        <div class="item">
                            <article>
                                <div class="image">
                                    <img src="assets/images/apartment-1.jpg" alt="">
                                </div>
                                <div class="details">
                                    <div class="text">
                                        <h2 class="title"><a href="room-overview.html">Presidential Suite</a></h2>
                                        <p>Family room</p>
                                    </div>
                                    <div class="book">
                                        <div>
                                            <a href="room-overview.html" class="btn btn-main">Book now</a>
                                        </div>
                                        <div>
                                            <span class="price h2">€ 299,00</span>
                                            <span>per night</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div> --}}

                    <!-- === rooms item === -->

                    {{-- <div class="col-sm-6 col-md-6">
                        <div class="item">
                            <article>
                                <div class="image">
                                    <img src="assets/images/apartment-2.jpg" alt="">
                                </div>
                                <div class="details">
                                    <div class="text">
                                        <h2 class="title"><a href="room-overview.html">Luxury appartment</a></h2>
                                        <p>Family room</p>
                                    </div>
                                    <div class="book">
                                        <div>
                                            <a href="room-overview.html" class="btn btn-main">Book now</a>
                                        </div>
                                        <div>
                                            <span class="price h2">€ 199,00</span>
                                            <span>per night</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div> --}}

                    <!-- === rooms item === -->
                    @foreach($findpools as $findpool)
                    <div class="col-sm-6 col-md-4">
                        <div class="item">
                            <article>
                                <div class="image">
                                    <img src="{{ asset('public/uploads/'.$findpool->images->first()->name)}}" alt="">
                                </div>
                                <div class="details">
                                    <div class="text">
                                        <h2 class="title"><a href="{!! url('pool_details',$findpool->slug) !!}">{{$findpool->title}}</a></h2>
                                        <p>Single room</p>
                                    </div>
                                    <div class="book">
                                        <div>
                                            <a href="{!! url('pool_details',$findpool->slug) !!}" class="btn btn-main">Book now</a>
                                        </div>
                                        <div>
                                            <span class="price h2">AED {{$findpool->session_wise_price->first()->price}}</span>
                                            <span>Occupancy: {{$findpool->occupancy}}</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div> <!--/container-->
        </div>
</section>
@include('themes.clickvipool.footer')