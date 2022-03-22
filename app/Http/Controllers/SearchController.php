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
                if(!empty($data)) {
                    ?>
                    <ul id="pooladd-list">
                    <?php
                    foreach($data as $poolLocation) {
                    ?>
                    <li onClick="selectPoolAdd('<?php echo $poolLocation->address; ?>');"><?php echo $poolLocation->address; ?></li>
                    <?php } ?>
                    </ul>
                    <?php } 
        // return response()->json($data);
    }
    public function findPool(Request $request){
        print_r($request->all());
        // $data = Pool::where("address","LIKE","%{$request->input('address')}%")->where('occupancy', )->where('')->get();
                
    }
}
