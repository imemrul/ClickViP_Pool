<?php
//Creat Menu
use App\Booking;
use App\Pool;
use App\Weekly_session_wise_pool_price;

function menu_array(){
    return [
        [
            'label'=>'Service Location',
            'roll_id'=>1,
            'icon'=>'location_on',
            'link'=>url('module/location'),
        ],
        [
            'label'=>'Service Facility',
            'roll_id'=>1,
            'icon'=>'waves',
            'link'=>url('module/facility'),
        ],
        [
            'label'=>'Host',
            'roll_id'=>1,
            'icon'=>'perm_identity',
            'link'=>'#',
            'sub'=>[
                [
                    'label'=>'Create',
                    'link'=>URL::to('module/executive/create')
                ],
                [
                    'label'=>'List',
                    'link'=>URL::to('module/executive')
                ],
            ]
        ],
       
        [
            'label'=>'Guest',
            'roll_id'=>1,
            'icon'=>'perm_identity',
            'link'=>'#',
            'sub'=>[
                [
                    'label'=>'Create',
                    'link'=>URL::to('module/client/create')
                ],
                [
                    'label'=>'List',
                    'link'=>URL::to('module/client')
                ],
            ]
        ],
        [
            'label'=>'Reminder',
            'roll_id'=>1,
            'icon'=>'alarm',
            'link'=>'#',
            'sub'=>[
                [
                    'label'=>'Call History',
                    'link'=>url('module/activity')
                ],
                [
                    'label'=>'Reminder queue',
                    'link'=>url('module/activity')
                ],
            ]
        ],
        [
            'label'=>'Blog Post',
            'roll_id'=>1,
            'icon'=>'article',
            'link'=>'#',
            'sub'=>[
                [
                    'label'=>'Add Page',
                    'link'=>url('module/page/create')
                ],
                [
                    'label'=>'All Page',
                    'link'=>url('module/page')
                ],
            ]
        ],
        [
            'label'=>'Page',
            'roll_id'=>1,
            'icon'=>'pages',
            'link'=>'#',
            'sub'=>[
                [
                    'label'=>'Add Page',
                    'link'=>url('module/page/create')
                ],
                [
                    'label'=>'All Page',
                    'link'=>url('module/page')
                ],
            ]
        ],
        [
            'label'=>'Setting',
            'roll_id'=>1,
            'icon'=>'perm_data_setting',
            'link'=>'#',
            'sub'=>[
                [
                    'label'=>'System Setting',
                    'link'=>URL::to('module/setting')
                ],
                [
                    'label'=>'Agent Commision',
                    'link'=>'#'
                ],
                [
                    'label'=>'System Login Info',
                    'link'=>'#'
                ],
            ]
        ],

        /**=======HOST MENU========**/
        [
            'label'=>'My Account',
            'roll_id'=>2,
            'icon'=>'vpn_key',
            'link'=>url('my_account'),
        ],
        [
            'label'=>'Weekly Session Timing',
            'roll_id'=>2,
            'icon'=>'watch',
            'link'=>url('module/weekly_session_time'),
        ],
        [
            'label'=>'Manage Pool',
            'roll_id'=>2,
            'icon'=>'pool',
            'link'=>'#',
            'sub'=>[
                [
                    'label'=>'Create',
                    'link'=>URL::to('module/pool/create')
                ],
                [
                    'label'=>'List',
                    'link'=>URL::to('module/pool')
                ],
            ]
        ],
        [
            'label'=>'Booking List',
            'roll_id'=>2,
            'icon'=>'book',
            'link'=>url('module/host/booking_list'),
        ],
        [
            'label'=>'Revenue report',
            'roll_id'=>2,
            'icon'=>'graphic_eq',
            'link'=>url('module/host/revenue_report'),
        ],

        /**=======GUEST MENU========**/
        [
            'label'=>'My Account',
            'roll_id'=>3,
            'icon'=>'perm_identity',
            'link'=>url('my_account'),
        ],
        [
            'label'=>'My Booking',
            'roll_id'=>3,
            'icon'=>'book',
            'link'=>url('module/guest/booking'),
        ],
        [
            'label'=>'My Payment',
            'roll_id'=>3,
            'icon'=>'money',
            'link'=>'#',
            'sub'=>[
                [
                    'label'=>'Paid Invoice',
                    'link'=>URL::to('module/guest/paid')
                ],
                [
                    'label'=>'All Invoice',
                    'link'=>URL::to('module/guest/allinvoice')
                ],
            ]
        ],
        [
            'label'=>'Coustomer Service',
            'roll_id'=>3,
            'icon'=>'call',
            'link'=>'#',
            'sub'=>[
                [
                    'label'=>'All Ticket',
                    'link'=>URL::to('module/guest/ticket')
                ],
                [
                    'label'=>'Create Ticket',
                    'link'=>URL::to('module/guest/ticket/create')
                ],
            ]
        ],
        
        



    ];
}


function is_executive(){
    if(auth()->user()->roll_id === 2){
        return true;
    }else{
        return false;
    }
}
function upload_image($file){
    $extension = $file->getClientOriginalExtension();
    $rand = str_random();
    $file_name = $rand.'.'.$extension;
    $file->move('public/uploads/',$file_name);
    return $file_name;
}

function get_revenue($from=false,$to=false){
    $pool_ids = Pool::where('host_id',auth()->user()->id)->pluck('id');
    //return $pool_ids;
    $date_wise_booking = Weekly_session_wise_pool_price::whereIn('pool_id',$pool_ids);
    if($from){
        $date_wise_booking->where('date','>=',$from);
    }
    if($to){
        $date_wise_booking->where('date','<=',$to);
    }
    return $date_wise_booking->where('status','Booked')->sum('price');
}
function pool_wise_revenue($pool_id, $from=false, $to=false){
    $date_wise_booking = Weekly_session_wise_pool_price::where('pool_id',$pool_id);
    if($from){
        $date_wise_booking->where('date','>=',$from);
    }
    if($to){
        $date_wise_booking->where('date','<=',$to);
    }
    return $date_wise_booking->where('status','Booked')->sum('price');
}

