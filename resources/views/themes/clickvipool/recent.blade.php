        <!-- ========================  Rooms ======================== -->

        <section class="rooms rooms-widget">

            <!-- === rooms header === -->

            <div class="section-header">
                <div class="container">
                    <h2 class="title">Recent Listed Pool <a href="#" class="btn btn-sm btn-clean-dark">View all</a></h2>
                    <p>Designed as a privileged almost private place where you'll feel right at home</p>
                </div>
            </div>

            <!-- === rooms content === -->

            <div class="container">

                <div class="owl-rooms owl-theme">

                    <!-- === rooms item === -->
                    @foreach($recentPools as $recentpool)
                    <div class="item">
                        <article>
                            <div class="image">
                                <a href="{!! url('pool_details',$recentpool->id) !!}">
                                    <img src="{{ asset('public/uploads/'.$recentpool->images->first()->name)}}" alt="" />
                                </a>
                            </div>
                            <div class="details">
                                <div class="text">
                                    <h3 class="title"><a href="#">{{$recentpool->title}}</a></h3>
                                    <p>Total Session: {{$recentpool->session_wise_price->count()}}</p>
                                </div>
                                <div class="book">
                                    <div>
                                        <a href="{!! url('pool_details',$recentpool->uri) !!}" class="btn btn-main">Book now</a>
                                    </div>
                                    <div>
                                        <span class="price h4">AED {{$recentpool->session_wise_price->first()->price}}</span>
                                        <span>Occupancy: {{$recentpool->occupancy}}</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div><!--/owl-rooms-->
            </div> <!--/container-->
        </section>
