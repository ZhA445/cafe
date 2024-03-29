<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Mail\ContactUs;
use App\Models\Chef;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Review;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('index','googlepage','googlecallback');
    }
    public function index()
    {
        $breakfasts = Food::where('category', 'Breakfast')->get();
        $coffees = Food::where('category', 'Coffee')->get();

        $chefs = Chef::all();

        $reviews = Review::all();
        return view('home.home', compact('breakfasts', 'coffees', 'chefs','reviews'));
    }

    public function googlepage()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googlecallback()
    {
        try{
            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id',$user->id)->first();

            if($finduser)
            {
                Auth::login($finduser);

                return redirect()->intended('/redirect');
            }
            else
            {
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'google_id' => $user->id,
                    'user_type' => '0',
                    'email_verified_at' => now(),
                ]);

                Auth::login($newUser);

                return redirect('/redirect');
            }
        } catch(Exception $e){
            return redirect('/login');
        }

    }

    public function redirect()
    {
        $usertype = Auth::user()->user_type;

        if ($usertype == '1') {

            $total_users = User::all()->count();
            $total_chefs = Chef::all()->count();
            $total_foods = Food::all()->count();
            $total_reservations = Reservation::all()->count();

            $unacceptable_reservations = Reservation::where('reservation', 0)->count();

            return view('admin.admin',compact('total_users', 'total_chefs', 'total_foods','total_reservations','unacceptable_reservations'));
        } else {
            $breakfasts = Food::where('category', 'Breakfast')->paginate(5);
            $coffees = Food::where('category', 'Coffee')->paginate(5);

            $chefs = Chef::all();

            $reviews = Review::all();

            return view('home.home', compact('breakfasts', 'coffees', 'chefs', 'reviews'));
        }
    }

    public function reservation()
    {
        $id = Auth::user()->id;

        $orders = Reservation::where('user_id', $id)->orderBy('date')->orderBy('time')->get();

        return view('home.reservation', compact('orders'));
    }

    public function add_reservation(Request $request)
    {
        $reservation = new Reservation;

        $user = Auth::user();

        $reservation->name = $request->name;
        $reservation->phone = $request->phone;
        $reservation->email = $user->email;
        $reservation->time = $request->time;
        $reservation->date = $request->date;
        $reservation->no_people = $request->no_people;
        $reservation->comment = $request->comment;
        $reservation->user_id = $user->id;

        $reservation->save();

        Alert::success('Reservation Success...', 'Have a nice day!');

        return redirect()->back();
    }

    public function delete_reservation($id)
    {
        $data = Reservation::find($id);

        $data->delete();

        Alert::info('Order Canceled!', 'Any Problem? Let me know...');

        return redirect()->back();
    }

    public function add_review(Request $request)
    {
        $user = Auth::user();
        $review = new Review;

        $review->name = $user->name;
        $review->content = $request->content;
        $review->rating = $request->rating;

        $review->save();

        return redirect()->back();
    }

    public function test_view()
    {
        return view('mails.contact_mail');
    }

    public function post_contact(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min: 8',
        ]);

        Mail::to('zinhtetaung2077z@gmail.com')->send(new ContactUs($data));

        Alert::success('Thank For Contact Us.', 'Your message has been sent successfully.');
        return redirect()->back();
    }
}
