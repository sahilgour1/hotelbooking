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
     
    public function SortByLowAndHigh(Request $request){
        $sortby = new Hotel();
        $sortby->low_to_high = $request->input('sortby');
        print_r($sortby);die;
        dd($request->all());
     }
    
}
