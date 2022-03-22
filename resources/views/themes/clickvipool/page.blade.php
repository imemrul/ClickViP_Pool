
@include('themes.clickvipool.header')
<section class="page">

    <!-- ===  Page header === -->

    <div class="page-header" style="background-image:url({{ asset('public/themes/clickvipool/assets/images/header-1.jpg')}})">

        <div class="container">
            <h2 class="title">{!!$result->title!!}</h2>
        </div>

    </div>

    <!-- ===  Page wrapper === -->

    <div class="image-blocks image-blocks-category">
        <div class="container">
            <div class="about">
                <div class="text-block">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            {!!$result->post!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('themes.clickvipool.footer')