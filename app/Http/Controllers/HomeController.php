<?php

namespace App\Http\Controllers;

use App\Home;
use App\Pool;
use App\Facility;
use App\Pool_image;
use App\User;
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


}
