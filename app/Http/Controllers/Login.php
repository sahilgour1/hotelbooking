<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\Hotel;


class Login extends Controller
{
    public function login(Request $request)
    {
        // Validate input fields
        $request->validate([
            'username' => 'required|',
            'password' => 'required',
            'email' => 'required|email'
        ]);

        // Check if the customer exists by email
        if (customer::where('email', $request->input('email'))->exists()) {
            return view("admin.hotelpost");
        } else {
            echo "not exist";
        }
    }

    public function createhotel(Request $request){

        // dd($request);
        $Hotel = new Hotel;
        $Hotel->hote_name = $request->input('hotel_name');
        $Hotel->hotel_price = $request->input('hotel_price');
        // $Hotel->hotel_image = $request->input('hotel_image');
        $Hotel->hotel_location = $request->input('hotel_location');
        $Hotel->cus_id = $request->input('cus_id');
        if ($request->hasFile('hotel_image')) {
            // Get the file from the request
            $file = $request->file('hotel_image');
            
            // Generate a unique file name
            $fileName = time() . '-' . $file->getClientOriginalName();
            
            // Store the image in the 'public/hotels' directory
            $filePath = $file->storeAs('public/hotelimage', $fileName);
        
            // Save the file path to the database
            $Hotel->hotel_image = $filePath;
        }
        $Hotel->save();
        return view("admin.hotelpost");

    }
}
