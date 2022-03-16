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
                    <ul id="country-list">
                    <?php
                    foreach($data as $country) {
                    ?>
                    <li onClick="selectCountry('<?php echo $country->address; ?>');"><?php echo $country->address; ?></li>
                    <?php } ?>
                    </ul>
                    <?php } 
        // return response()->json($data);
    }
}
