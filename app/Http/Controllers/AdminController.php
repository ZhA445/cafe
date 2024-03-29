<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chef;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function users(){

        $users = User::all();

        return view('admin.users',compact('users'));
    }

    public function user_delete($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->back()->with('message', 'User Deleted!');
    }

    public function show_foods()
    {
        $breakfasts = Food::where('category', 'Breakfast')->get();
        $coffees = Food::where('category', 'Coffee')->get();

        return view('admin.show_menu',compact('breakfasts','coffees'));
    }

    public function foods(){
        $categories = Category::all();
        return view('admin.foods',compact('categories'));
    }

    public function add_food(Request $request)
    {

        $data = new Food;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->discount_price = $request->dis_price;
        $data->suggestion = $request->suggestion;
        $data->category = $request->category;

        $data->save();

        return redirect()->back()->with('message', 'Menu Added');
    }

    public function delete_food($id)
    {
        $food = Food::find($id);

        $food->delete();

        return redirect()->back()->with('message', 'Food Removed!..');
    }

    public function edit_food($id)
    {
        $food = Food::find($id);

        $categories = Category::all();

        return view('admin.edit_food',compact('food', 'categories'));
    }

    public function update_food($id, Request $request)
    {
        $food = Food::find($id);

        $food->name = $request->name;
        $food->description = $request->description;
        $food->price = $request->price;
        $food->discount_price = $request->dis_price;
        $food->suggestion = $request->suggestion;
        $food->category = $request->category;

        $food->save();

        return redirect('/foods')->with('message', 'Updated Item...');
    }

    public function reservations()
    {
        $reservations = Reservation::orderBy('date')->orderBy('time')->get();
        return view('admin.reservations',compact('reservations'));
    }

    public function delete_reservations($id)
    {
        $data = Reservation::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Data Deleted!');
    }

    public function confirm_reservation($id)
    {
        $data = Reservation::find($id);

        $data->reservation = true;

        $data->save();

        return redirect()->back();
    }

    public function show_chefs()
    {
        $chefs = Chef::all();

        return view('admin.show_chefs',compact('chefs'));
    }

    public function add_chef()
    {
        return view('admin.chefs');
    }

    public function upload_chefs(Request $request)
    {
        $chef = new Chef;

        $image = $request->img;

        $imagename = time(). '.' .$image->getClientOriginalExtension();

        $request->img->move('chefsimage', $imagename);

        $chef->name = $request->name;

        $chef->position = $request->position;

        $chef->description = $request->description;

        $chef->img = $imagename;

        $chef->save();

        return redirect()->back()->with('message', 'Chef details Added...');

    }

    public function delete_chef($id)
    {
        $chef = Chef::find($id);

        $chef->delete();

        return redirect()->back()->with('message', 'Chef Deleted!');
    }

    public function edit_chef($id)
    {
        $chef = Chef::find($id);

        return view('admin.edit_chef' , compact('chef'));
    }

    public function update_chef($id, Request $request)
    {
        $chef = Chef::find($id);

        $chef->name = $request->name;
        $chef->position = $request->position;
        $chef->description = $request->description;

        $image = $request->img;

        if($image)
        {
            $imagename = time(). '.' .$image->getClientOriginalExtension();

            $request->img->move('chefsimage', $imagename);
            $chef->img = $imagename;
        }

        $chef->save();

        return redirect('/chefs')->with('message', 'Update Chef Success...');
    }

    public function show_reviews()
    {
        $reviews = Review::all();

        return view('admin.show_reviews', compact('reviews'));
    }

    public function delete_review($id)
    {
        $review = Review::find($id);

        $review->delete();

        return redirect()->back()->with('message', 'Review Deleted!');
    }
}
