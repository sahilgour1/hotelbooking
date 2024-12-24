<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;
use App\Models\Hotel;

class Login extends Controller
{
    public function login(Request $request)
    {
        // Validate input fields
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if the customer exists by email
        $customer = Customer::where('email', $request->input('email'))->first();

        if ($customer) {
            if ($request->input('password') === $customer->password) {
                // Store user details in session
                Session::put('user', $customer);

                return view("admin.hotelpost");
            } else {
                return back()->withErrors(['password' => 'Invalid password.']);
            }
        } else {
            return back()->withErrors(['email' => 'Email not found.']);
        }
    }

    public function createhotel(Request $request)
    {
        $Hotel = new Hotel();
        $Hotel->hote_name = $request->input('hotel_name');
        $Hotel->hotel_price = $request->input('hotel_price');
        $Hotel->hotel_location = $request->input('hotel_location');
        $Hotel->cus_id = $request->input('cus_id');

        if ($request->hasFile('hotel_image')) {
            $file = $request->file('hotel_image');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/hotelimage', $fileName);
            $Hotel->hotel_image = $filePath;
        }

        $Hotel->save();
        return view("admin.hotelpost");
    }

    public function register(Request $request)
     {
        // Validate input fields
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|email|unique:customers,email',
            'number' => 'required',
        ]);

        $register = new Customer();
        $register->username = $request->input('username');
        $register->email = $request->input('email');
        $register->password = $request->input('password'); // Plain text (not recommended)
        $register->number = $request->input('username');
        $register->number = $request->input('email');
        $register->number = $request->input('password');
        $register->number = $request->input('number');

        $register->save();

        // Store user details in session
        Session::put('user', $register);

        return view("ui.homepage");
    }

    public function login_user(Request $request)
    {
        $customer = Customer::where('email', $request->input('email'))->first();

        if ($customer) {
            // Check if the password matches (without hashing)
            if ($request->input('password') === $customer->password) {
                // Store user details in session
                Session::put('user', $customer);

                return view("ui.homepage");
            } else {
                return back()->withErrors(['password' => 'Invalid password.']);
            }
        } else {
            return back()->withErrors(['email' => 'Email not found.']);
        }
    }

    public function logout()
    {
        // Clear all session data
        Session::flush();

        // Optionally, you can redirect to the homepage or login page
        return redirect('homepage')->with('success', 'You have been logged out.');
    }
}
