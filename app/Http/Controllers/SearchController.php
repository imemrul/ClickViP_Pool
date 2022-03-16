<?php

namespace App\Http\Controllers;
use App\Pool;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function autocomplete(Request $request)
    {
        $data = Pool::select("address")
                ->where("address","LIKE","%{$request->input('address')}%")
                ->get();
   
        return response()->json($data);
    }
}
