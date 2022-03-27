<?php
//Creat Menu
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
function generate_custom_image_path($path,$dimension){
    $path_arrs = explode('/',$path);
    $custom_path = '';
    foreach($path_arrs as $i=>$path_arr){
        if($i< count($path_arrs)-3){
            $custom_path.=$path_arr.'/';
        }
        if($i == count($path_arrs)-1){
            $custom_path .= $dimension.'/'.$path_arr;
        }
    }
    return $custom_path;
}
function generate_fitted_image($str){
    $explode = explode(',',$str);
    //return $explode;
    $img = explode(' ',trim($explode[1]))[0];
    $fitted_img = '';
    $img_path_arrays = explode('/',$img);
    foreach($img_path_arrays as $i=>$im){
        if($i < count($img_path_arrays)-1){
            $fitted_img .= $im.'/';
        }else{
            $fitted_img.='fitted.jpg';
        }
    }
    return $fitted_img;
}
function verticals(){
    return [
        'Mobiles'=>'Mobiles',
        'Electronics'=>'Electronics',
        'Home & Living'=>'Home & Living',
        'Property'=>'Property',
        'Vehicles'=>'Vehicles',
        'Fashion  Health & Beauty'=>'Fashion  Health & Beauty',
        'Education'=>'Education',
        'Hobbies  Sports & Kids'=>'Hobbies  Sports & Kids',
        'Services'=>'Services',
        'Jobs'=>'Jobs',
        'Pets & Animals'=>'Pets & Animals',
        'Food & Agriculture'=>'Food & Agriculture',
        'Business & Industry'=>'Business & Industry'
    ];
}
function services_call_status(){
    return [
        'Satisfied'=>'Satisfied',
        'Not Satisfied'=>'Not Satisfied',
        'Mobile OFF'=>'Mobile OFF',
        'Number Busy'=>'Number Busy',
        'No answer'=>'No answer',
    ];
}
function payment_call_status(){
    return [
        'Mobile OFF'=>'Mobile OFF',
        'No answer'=>'No answer',
        'Interested to pay'=>'Interested to pay',
        'Payment collected'=>'Payment collected',
        'Confirm Churn'=>'Confirm Churn',
        'Probable Churn'=>'Probable Churn',
    ];
}
function collector_payment_status(){
    return ['Collected'=>'Collected','Reschedule'=>'Reschedule','Churn'=>'Churn'];
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
function get_activity_list(){
    return [
        1=>'Meeting',
        2=>'Call',
        3=>'Proposal share'
    ];
}
function get_activity_status(){
    return [1=>'Pending',2=>'Done',3=>'Canceled'];
}
function get_linked_with_list(){
    return [1=>'Client',2=>'Deals',3=>'Individual'];
}
function get_deals_stage(){
    return ['Prospect stage'=>'Prospect stage','Proposal made'=>'Proposal made','Negotiation'=>'Negotiation','Pending Sales'=>'Pending Sales','Won'=>'Won','Lost'=>'Lost'];
}