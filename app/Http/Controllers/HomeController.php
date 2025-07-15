<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Mainposter;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    Public function homePage()
    {
        $mainposters = Mainposter::first();
        $destinations = Destination::get();
        return view('front_end.home', compact('mainposters','destinations'));

    }

    public function destinationVlog($id){

        $destination = Destination::select('destinations.*')
        ->where('destinations.id', $id)->first();

        return view('front_end.vlog',compact('destination'));
    }
}
