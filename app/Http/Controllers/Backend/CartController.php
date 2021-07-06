<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::latest()->get();
        $total = Cart::all()->sum(function ($t){
            return $t->price * $t->quantity;
        });
        return view('backend.pages.invoice.cart', compact('carts', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {

        $check = Cart::where('product_id', $product_id)->first();
        if($check){
            Cart::where('product_id', $product_id)->increment('quantity');
            toast('Product Add to cart','success');
            return redirect()->back();
        }else{
            $store = new Cart();
            $store->product_id = $request->product_id;
            $store->price = $request->price;
            $store->quantity = 1;
            $store->subtotal = $request->price;
            $store->save();
           // notify()->success('Product Add to cart');
            toast('Product Add to cart','success');
            // alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Cart::find($id);
        $update->quantity = $request->quantity;
        $update->subtotal = $request->quantity*$update->price;
        $update->save();
        toast('Update Cart Successfully','success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
