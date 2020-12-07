<?php

namespace App\Http\Controllers\Customer\Operations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalculateController extends Controller
{
    public function ViewPage(){
        return view('customer.calculate');
    }
    public function Calculate(Request $request){
        $weight   = $request->input('weight');
        $delivery = $request->input('delivery');

        $WeightCharge   = 0;
        $DeliveryCharge = 0;

        $charge = 0;

        if($weight>10){
            $WeightCharge = 80.00;   
        }
        elseif($weight>4.99){
            $WeightCharge = 40.00;
        }
        else{
            $WeightCharge = 20.00;
        }

        if($delivery == "Regular"){
            $DeliveryCharge = 30.00;

        }
        elseif($delivery == "Express"){
            $DeliveryCharge = 60.00;
        }
        else{
            $DeliveryCharge = 120.00;
        }


        $charge = $WeightCharge+$DeliveryCharge;

        return view('customer.charge',['charge'=>$charge,'weight'=>$weight,'delivery'=>$delivery]);
    }
}
