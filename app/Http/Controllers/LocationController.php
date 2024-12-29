<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Hotel;

class LocationController extends Controller
{
    //
    function mumbai_hotels(){
        $mumbai_hotels = DB::table('hotels')
        ->select('id', 'hote_name', 'hotel_price', 'hotel_image', 'hotel_location')
        ->where('hotel_location', 'mumbai')
        ->get();
        $mumbai_hotels = json_decode(json_encode($mumbai_hotels), true);
        return view('mumbai.mumbaihotels')->with('mumbai_hotels', $mumbai_hotels);
       
    }
    
}
