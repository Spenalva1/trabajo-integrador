<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use Illuminate\Support\Facades\Auth;

class CartsController extends Controller
{

    public function show(){
        if(Auth::user() == null){
            return redirect('/login');
        }
        $Products = Auth::user()->cart;
        $totalPrice = 0;
    
        foreach ($Products as $Product) {
            $totalPrice += $Product->price * $Product->pivot->quantity;
        }
    
        return view('/cart', compact('Products', 'totalPrice'));
    }

    public function addProduct(Request $request){

        if(Auth::user() == null){
            return redirect('/login');
        }

        if(Cart::where([['user_id','=', Auth::user()->id], ['product_id', '=', $request['product_id']]])->exists()){
            return redirect('/cart');
        }

        $this->validate($request, ['quantity' => 'numeric|max:'.Product::find($request['product_id'])->stock], ['max' => 'No hay stock suficiente']);


        $Cart = new Cart;
        $Cart->user_id = Auth::user()->id;
        $Cart->product_id = $request['product_id'];
        $Cart->quantity = $request['quantity'];

        $Cart->save();

        return redirect('/cart');
    }

    public function modifyProductQuantity(Request $request){
        $this->validate($request, ['quantity' => 'numeric|max:'.Product::find($request['product_id'])->stock], ['max' => 'No hay stock suficiente de ' . Product::find($request['product_id'])->name]);

        $Cart = Cart::where([['user_id','=', Auth::user()->id], ['product_id', '=', $request['product_id']]])->get()->pop();

        
        $Cart->quantity = $request['quantity'];
        
        $Cart->save();

        return redirect('/cart');
    }

    public function removeProduct(Request $request){

        $Cart = Cart::where([['user_id','=', Auth::user()->id], ['product_id', '=', $request['product_id']]])->get()->pop();

        $Cart->delete();

        return redirect('/cart');
    }

    public function checkout(Request $request){
        $Products = Auth::user()->cart;
    }
}
