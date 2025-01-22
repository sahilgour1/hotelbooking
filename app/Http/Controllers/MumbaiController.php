<?php

namespace App\Http\Controllers;
use App\Models\Hotel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MumbaiController extends Controller
{
    //

    public function searchmumbaihotels(Request $request)
    {
      
        $hotelName = $request->input('hotel_name');

        $hotels_count = DB::table('hotels')
            ->where('hote_name', $hotelName)
            ->where('hotel_location', 'mumbai')
            ->count();

            if($hotels_count==true){
                $searchHotels = DB::table('hotels')
                ->where('hote_name', $hotelName)
                ->where('hotel_location', 'mumbai')
                ->get();
                 $searchHotels = json_decode(json_encode($searchHotels), true);

                return view('mumbai.searchhotels',compact('searchHotels'));

            }else{
                return view('mumbai.notexist');
            }
      
    }

    // all functionality done but not exist section remaning 
    public function SearchByPrice(Request $request){
        $searchablePost=  db::table('hotels')->get();
        $min_value= $request->input('min_price');
        $max_value = $request->input('max_price');
        if (! (is_null($min_value) && is_null($max_value))) {
            $searchablePost = $searchablePost->whereBetween('hotel_price', [$min_value, $max_value]);
        }
        elseif (! is_null($min_value)) {
            $searchablePost = $searchablePost->where('hotel_price', '>=', $min_value);
        }
        elseif (! is_null($max_value)) {
            $searchablePost = $searchablePost->where('hotel_price', '<=', $max_value);
        }
     
        $searchablePost = json_decode($searchablePost, true);
        return view('mumbai.searchbyprice',compact('searchablePost'));

        

    }
     
    // remaning 
    public function SortByLowAndHigh(Request $request){
        $sortby = new Hotel();
        $lowtohigh = $request->input('sortby');
        $sortby->hightolow = $request->input('sortby');
        

        if($lowtohigh ==0){
            // echo "low to high"; die;
            $Low_To_High_Hotel = Hotel::orderBy('hotel_price', 'ASC')->get();
            // print_r( $Low_To_High_Hotelhotel_price);die;
            dd($Low_To_High_Hotel);
        }else{
            $Low_To_High_Hotel = Hotel::orderBy('hotel_price', 'DESC')->get();
            print_r( $Low_To_High_Hotel->hotel_price);die;

        }
        
    }

    public function CheckAvailability(Request $request){

        $hotel_id = $_GET['hotelid'];
        // echo $hotel_id;die;
        $hotel = Hotel::find($hotel_id);
        return view('mumbai.checkavaiablity',['hotel'=>$hotel]);
    }
    
}

