<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Category;
use App\City;
use App\Banner;

class IndexController extends Controller
{
    public function index(){
        //Get All Events with Pagination
        $eventsAll = Event::orderBy('event_id','DESC')->paginate(6);

        //Get All Categories
        $categories = Category::get();

        foreach ($eventsAll as $key => $event) {
            $city_name = City::where(['city_id'=>$event->city_id])->first();
            $eventsAll[$key]->city_name = $city_name->name;
        }

        $banners = Banner::where('status','1')->get();

        return \view('index')->with(compact('eventsAll','categories','banners'));
    }
}
