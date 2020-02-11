<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class CartsController extends Controller
{
    public function addProduct(Request $request){

        if(Auth::user() == null){
            return redirect('/login');
        }

        if(Cart::where([['user_id','=', Auth::user()->id], ['product_id', '=', $request['product_id']]])->exists()){
            return redirect('/cart');
        }


        $Cart = new Cart;
        $Cart->user_id = Auth::user()->id;
        $Cart->product_id = $request['product_id'];
        $Cart->quantity = $request['quantity'];

        $Cart->save();

        return redirect('/cart');
    }
}
