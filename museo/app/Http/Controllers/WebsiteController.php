<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home()
    {
        $events = Event::active()
            ->upcoming()
            ->orderBy('start_date', 'asc')
            ->limit(3)
            ->get();

        $featuredExhibitions = Event::where('is_active', true)
            ->where('type', 'exhibition') 
            ->where('end_date', '>=', now()) 
            ->orderBy('start_date', 'asc')
            ->limit(3)
            ->get();

        return view('home', compact('events', 'featuredExhibitions'));
    }


    public function sobre()
    {
        $featuredExhibitions = Event::where('is_active', true)
            ->where('type', 'exhibition') 
            ->where('end_date', '>=', now()) 
            ->orderBy('start_date', 'asc')
            ->limit(3)
            ->get();

        return view('sobre', compact('featuredExhibitions'));
    }

    public function eventos()
    {
        $events = Event::active()->upcoming()->orderBy('start_date', 'asc')->get();
        return view('eventos', compact('events'));
    }

    public function eventosShow($slug)
    {
        $evento = Event::where('slug', $slug)->active()->firstOrFail();

        return view('evento-detalhes', compact('evento'));
    }
}
