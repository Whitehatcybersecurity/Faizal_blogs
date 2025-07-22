<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Logo;
use App\Models\Mainposter;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    Public function homePage()
    {
        $mainposters = Mainposter::first();
        $destinations = Destination::get();
        $logo = Logo::first();
        return view('front_end.home', compact('mainposters','destinations','logo'));

    }

    public function destinationVlog($id){

        $destination = Destination::select('destinations.*')
        ->where('destinations.id', $id)->first();

        return view('front_end.vlog',compact('destination'));
    }

    public function destinationMainView(){

       
        return view('front_end.main_blogs');
    }

    public function BlogView(){

        return view('front_end.blog');
    }
}
