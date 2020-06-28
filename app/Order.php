<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orders(){
        return $this->hasMany('App\OrdersTicket','order_id');
    }

    public static function getOrderTicketsDetails($order_id){
        $getOrderTicketsDetails = Order::where('id',$order_id)->first();
        return $getOrderTicketsDetails;
    }

    public static function getCountryCode($country){
        $getCountryCode = Country::where('country_name',$country)->first();
        return $getCountryCode;
    }
}
