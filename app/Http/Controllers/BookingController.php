<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Booking_payment_detail;
use App\Pool;
use App\Pool_facility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stripe\Charge;
use Stripe\Stripe;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $pool = Pool::find($request->pool_id);
        $pool_price =  $pool->session_wise_price()->find($request->time_slot_id)->price;
        //return $pool_price;
        $pool_booking_input = $request->all();
        $pool_booking_input['pool_id'] = $request->pool_id;
        $pool_booking_input['guest_id'] = auth()->user()->id;
        $pool_booking_input['session_wise_pool_id'] = $request->time_slot_id;
        $pool_booking_input['adult_qty'] = $request->adult_qty;
        $pool_booking_input['children_qty'] = $request->children_qty;
        $pool_booking_input['infants_qty'] = $request->infants_qty;
        $pool_booking_input['barbeque_qty'] = $request->barbeque_qty;
        $pool_booking_input['barbeque_price'] = $pool->barbecue_per_booking * $request->barbeque_qty;
        $pool_booking_input['towels_qty'] = $request->towels_qty;
        $pool_booking_input['towel_price'] = $pool->towel_price_per_person * $request->towels_qty;
        $pool_booking_input['servicecharge'] = 0;
        $pool_booking_input['vat'] = 0;
        $pool_booking_input['total'] = $pool_price + $pool_booking_input['towel_price'] + $pool_booking_input['barbeque_price'];
        $pool_booking_input['booking_status'] = 'Pending';
        $pool_booking_input['payment_status'] = 'Pending';
        //return $pool_booking_input;
        $booking = Booking::create($pool_booking_input);
        $pool->session_wise_price()->find($request->time_slot_id)->fill(['status'=>'Reserved'])->save();
        if($request->facilities){
            foreach ($request->facilities as $facility){
                $booking_facility = new Pool_facility();
                $booking_facility->pool_id = $request->pool_id;
                $booking_facility->facility_id = $facility;
                $booking->facilities()->save($booking_facility);
            }
        }
        $result = $booking;
        return view('themes.clickvipool.payment',compact('pool','result'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function payment_form(){
        $result = Booking::first();
        return view('themes.clickvipool.payment',compact('result'));
    }
    public function post_payment(Request $request){
        //return $request->all();
        try {

            Stripe::setApiKey(env('STRIPE_SECRET'));
            $payment_status = Charge::create ([
                "amount" => 100 * 100,
                "currency" => "AED",
                "source" => $request->stripeToken,
                "description" => "Test Payment",
                'metadata'=>[
                    'address' =>'Dhaka, Khilkhet',
                    'city'=>'Dhaka',
                ]
            ]);

            $booking = Booking::find($request->booking_id);
            if($payment_status->status === 'succeeded'){
                $booking->pool->session_wise_price()->find($booking->session_wise_pool_id)->fill(['status'=>'Booked'])->save();
                $booking->fill([
                    'booking_status'=>'Active',
                    'payment_status'=>'Done',
                ])->save();
                $booking->payment_details()->create([
                    'transaction_id'=>$payment_status->id,
                    'receipt_url' => $payment_status->receipt_url,
                    'currency' => $payment_status->currency,
                    'amount'=>$payment_status->amount,
                    'amount_captured' => $payment_status->amount_captured,
                    'amount_refunded' => $payment_status->amount_refunded,
                    'paid_status' => $payment_status->paid_status,
                ]);
                return redirect('booking/payment_success/'.$booking->id);
            }else{
                return redirect()->back()->with('error_message','Payment Failed. Booking will not be confirmed until a successful payment');
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error_message','Payment Failed. Booking will not be confirmed until a successful payment')->with('transaction_error',$e->getMessage());
        }
    }
    public function payment_success($booking_id){
        $result = Booking::find($booking_id);
        $booking_session_time_slot = $result->pool->session_wise_price()->find($result->session_wise_pool_id)->weekly_session_time_slot;
        return view('themes.clickvipool.payment_confirm',compact('result','booking_session_time_slot'));
    }
}