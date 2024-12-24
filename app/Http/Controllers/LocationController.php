<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Hotel;

class LocationController extends Controller
{
    //
    function mumbai_hotels(){
        $mumbai_hotels = DB::table('hotels')->select('id','hote_name','hotel_price','hotel_image','hotel_location')->get();
        // dd($mumbai_hotels);
        return view('mumbai.mumbaihotels')->with('mumbai_hotels', $mumbai_hotels);
       
    }
    
}
