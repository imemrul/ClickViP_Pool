<?php

namespace App\Http\Controllers;

use App\Home;
use App\Pool;
use App\Facility;
use App\Pool_image;
use App\User;
use App\Page;
use App\Weekly_session_timing;
use App\Weekly_session_wise_pool_price;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recentPools = Pool::orderBy('id','desc')->paginate(9);
        $facilities = Facility::all();
        // dd($facilities);
        return view('themes.clickvipool.index',compact('recentPools','facilities'));
    }
    public function pool_details($slug){
        $result = Pool::where('slug',$slug)->first();
        //return $result;
        return view('themes.clickvipool.pool_details',compact('result'));
    }
    public function payment($slug){
        $result = Pool::where('slug',$slug)->first();
        //return $result;
        return view('themes.clickvipool.payment',compact('result'));
    }
    public function paymentConfirm($slug){
        $result = Pool::where('slug',$slug)->first();
        //return $result;
        return view('themes.clickvipool.payment_confirm',compact('result'));
    }
    public function page($slug){
        $result = Page::where('slug',$slug)->first();
        //return $result;
        return view('themes.clickvipool.page',compact('result'));
    }
    public function get_available_slot($date){
        $pool = Pool::find(request()->pool_id);
        //return $pool->session_wise_price->where('date',$date)->groupBy('date');
        $arr = [];
        foreach($pool->session_wise_price->where('date',$date)->groupBy('date') as $index=>$date){
            $arr[$index] = [];
            foreach($date as $i=>$date_row){
                $arr[$index][$i]['id'] = $date_row->id;
                $arr[$index][$i]['status'] = $date_row->status;
                $arr[$index][$i]['price'] = $date_row->price;
                $arr[$index][$i]['title'] = $date_row->weekly_session_time_slot->title;
                $arr[$index][$i]['start_from'] = date('h:i a',strtotime($date_row->weekly_session_time_slot->start_from));
                $arr[$index][$i]['end_at'] = date('h:i a',strtotime($date_row->weekly_session_time_slot->end_at));
            }
        }
        return $arr;
    }


}
