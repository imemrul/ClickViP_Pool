
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon-->
    <link rel="icon" href="{!! URL::to('public/favicon.ico') !!}" type="image/x-icon">
    <title>Easy Medicine - Invoice</title>

    <!-- Web Fonts
    ======================= -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

    <!-- Stylesheet
    ======================= -->
    <link rel="stylesheet" type="text/css" href="{!! asset('public/invoice/bootstrap.css') !!}"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome-ie7.css"/>
    <link rel="stylesheet" type="text/css" href="{!! asset('public/invoice/style.css') !!}"/>
</head>
<body>
<!-- Container -->
<div class="container-fluid invoice-container">
    <!-- Header -->
    <header>
        <div class="row align-items-center">
            <div class="col-sm-7 text-center text-sm-start mb-3 mb-sm-0">
                <img src="{!!asset('public/uploads/'.\App\Setting::first()->image)!!}" alt="">
            </div>
            <div class="col-sm-5 text-center text-sm-end">
                <h4 class="mb-0">Invoice</h4>
                <p class="mb-0">Invoice Number INV-{!! $result->id !!}</p>
            </div>
        </div>
        <hr>
    </header>
    <!-- Main Content -->
    <main>
        <div class="row">
            <div class="col-sm-6 text-sm-end order-sm-1"> <strong>Pay To:</strong>
                <address>
                    ClickVIpool<br />
                    15 Hodges Mews, Airpot road<br />
                    Uttra, Airport, Dhaka
                </address>
            </div>
            <div class="col-sm-6 order-sm-0"> <strong>Invoiced To:</strong>
                <address>
                    {!! $result->guest->full_name !!}<br />
                    {!! $result->guest->phone !!},<br />
                    {!! $result->guest->address !!}
                </address>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6"> <strong>Payment Method:</strong><br>
                <span> Stripe </span> <br />
                <br />
            </div>
            <div class="col-sm-6 text-sm-end"> <strong>Order Date:</strong><br>
                <span> {!! $result->booking_session->date !!}<br>
        <br>
        </span> </div>
        </div>
        <div class="card">
            <div class="card-header"> <span class="fw-600 text-4">Order Summary</span> </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <td class="col-4"><strong>Pool</strong></td>
                            <td class="col-6 text-left"><strong>Session</strong></td>
                            <td class="col-2 text-end"><strong>Price</strong></td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><span class="text-3">{!! $result->pool->title or 'N/A' !!}</span></td>
                            <td class="text-left">
                                {!! $result->booking_session->weekly_session_time_slot->title !!} -
                                {!! $result->booking_session->weekly_session_time_slot->week_day.'-('. date('h:i a',strtotime($result->booking_session->weekly_session_time_slot->start_from)) . '-'. date('h:i a',strtotime($result->booking_session->weekly_session_time_slot->end_at)) !!}
                            </td>
                            <td class="text-end">{!! $result->booking_session->price !!} AED</td>
                        </tr>
                        <tr>
                            <td>
                                <small><strong>Barbeque price </strong></small></td>
                            <td class="text-center">-</td>
                            <td class="text-end">+{!! $result->barbeque_price !!} AED</td>
                        </tr>

                        <tr>
                            <td>
                                <small><strong>Towel price </strong></small></td>
                            <td class="text-center">-</td>
                            <td class="text-end">+{!! $result->towel_price !!} AED</td>
                        </tr>
                        </tbody>
                        <tfoot class="card-footer">
                        <tr>
                            <td colspan="2" class="text-end"><strong>Vat:</strong></td>
                            <td class="text-end">+{!! $result->vat !!} AED</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end border-bottom-0"><strong>Total:</strong></td>
                            <td class="text-end border-bottom-0">{!! $result->total !!} AED</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <br>
        <div class="table-responsive d-print-none">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <td class="text-center"><strong>Transaction Date</strong></td>
                    <td class="text-center"><strong>Method</strong></td>
                    <td class="text-center"><strong>Transaction ID</strong></td>
                    <td class="text-center"><strong>Amount</strong></td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @if($result->payment_details)
                    <td class="text-center">{!! $result->payment_details->created_at !!}</td>
                    <td class="text-center">
                        Stripe
                    </td>
                    <td class="text-center">
                        {!! $result->payment_details->transaction_id !!}
                    </td>
                    <td class="text-center">
                        {!! $result->payment_details->amount !!}
                    </td>
                    @else
                        <td class="text-center" colspan="4">
                            <strong>No transaction found</strong>
                        </td>
                    @endif
                </tr>
                </tbody>
            </table>
        </div>
    </main>
    <!-- Footer -->
    <footer class="text-center">
        <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical signature.</p>
        <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Print</a> <a href="" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-download"></i> Download</a> </div>
    </footer>
</div>
<!-- Back to My Account Link -->
<p class="text-center d-print-none"><a href="{!! url('dashboard') !!}">&laquo; Back to My Account</a></p>
</body>
</html>