<?php

namespace App\Http\Controllers;


use App\Models\Event;
use App\Models\Setting;
use App\Models\Speaker;
use App\Models\Schedule;
use App\Models\Venue;
use App\Models\Hotel;
use App\Models\Gallery;
use App\Models\Sponsor;
use App\Models\Faq;
use App\Models\Price;
use App\Models\Amenity;


class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $settings = Setting::pluck('value', 'key');

        $speakers = Speaker::all();

        $schedules = Schedule::with('speaker')
            ->orderBy('start_time', 'asc')
            ->get()
            ->groupBy('day_number');
        $venues = Venue::all();
        $hotels = Hotel::all();
        $galleries = Gallery::all();
        $sponsors = Sponsor::all();
        $faqs = Faq::all();
        $prices = Price::with('amenities')->get();
        $amenities = Amenity::with('prices')->get();

        return view('main.home', compact('settings', 'speakers', 'schedules', 'venues', 'hotels', 'galleries', 'sponsors', 'faqs', 'prices', 'amenities'));
    }

    public function singleEvent($id,$slug)
    {
        $settings = Setting::pluck('value', 'key');
        $event = Event::find($id);
//        $speakers = Speaker::all();
        $speakers = $event->speakers;
        $schedules = Schedule::with('speaker')
            ->orderBy('start_time', 'asc')
            ->get()
            ->groupBy('day_number');
//        $venues = Venue::all();
        $venues = $event->venues;
//        $hotels = Hotel::all();
        $hotels = $event->hotels;
        $galleries = Gallery::all();
//        $sponsors = Sponsor::all();
        $sponsors = $event->sponsors;
//        $faqs = Faq::all();
        $faqs = $event->faqs;
//        $prices = Price::with('amenities')->get();
        $prices = $event->prices;
        $amenities = Amenity::with('prices')->get();
        return view('theme2.home', compact('event','settings', 'speakers', 'schedules', 'venues', 'hotels', 'galleries', 'sponsors', 'faqs', 'prices', 'amenities'));


    }

    public function view(Speaker $speaker)
    {
        $settings = Setting::pluck('value', 'key');

        return view('main.speaker', compact('settings', 'speaker'));
    }
}
