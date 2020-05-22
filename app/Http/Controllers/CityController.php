<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CityController extends Controller
{
    public function getAddCity(){
        return \view('admin.cities.add_city');
    }

    public function postAddCity(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
        }

            $city = new City;
            $city->name = $data['city_name'];
            $city->state = $data['state'];            
            #$category->status = $status;
            $city->save();

            return \redirect('/admin/view-cities')->with('flash_message_success', 'City added Successfully!');                
    }

    public function getViewCities(){
        $cities = City::get();
        return \view('admin.cities.view_cities')->with(\compact('cities'));
    }

    public function getEditCity($id=null){
        $cityDetails = City::where(['city_id'=>$id])->first();
        return \view('admin.cities.edit_city')->with(\compact('cityDetails'));
    }

    public function postEditCIty(Request $request, $id=null){
        if ($request->isMethod('post')) {
            $data = $request->all();

            City::where(['city_id'=>$id])->update(['name'=>$data['city_name'],
                                                   'state'=>$data['state']]);                                                         
            return \redirect('admin/view-cities')->with('flash_message_success','City updated Successfully!');
        }
    }

    public function deleteCity($id=null){
        if (!empty($id)) {
            City::where(['city_id'=>$id])->delete();
            return \redirect()->back()->with('flash_message_success','City deleted Successfully!');
        }
    }
}
