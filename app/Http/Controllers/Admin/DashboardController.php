<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Item;
use App\Slider;
use App\Reservation;
use App\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
    	$categoryCount = Category::count();
    	$itemCount	= Item::count();
    	$sliderCount = Slider::count();
    	$reservations = Reservation::where('status', false)->get();
    	$contactCount = Contact::count();
    	return view('admin.dashboard', 
    		compact('categoryCount', 'itemCount', 'sliderCount', 'reservations', 'contactCount'));
    }
}
