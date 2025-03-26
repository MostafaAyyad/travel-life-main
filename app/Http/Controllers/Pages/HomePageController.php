<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TravelDeal;
use App\Models\Service;
use App\Models\CarRentalOffer;
use App\Models\PhotoShowcase;
use App\Models\Feedback;
use App\Models\DynamicBookingSection;

class HomePageController extends Controller
{
    //
    public function index()
    {
        $travelDeals = TravelDeal::latest()->get();
        $services = Service::all();
        $cars = CarRentalOffer::latest()->get();
        $photos = PhotoShowcase::latest()->get();
        $feedbacks = Feedback::latest()->get();
        $sections = DynamicBookingSection::with('fields')->get();
        return view('pages.home.index', compact('travelDeals' , 'services' , 'cars', 'photos' , 'feedbacks' , 'sections'));
    }
}
