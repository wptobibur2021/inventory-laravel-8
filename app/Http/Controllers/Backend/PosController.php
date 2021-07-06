<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Orderdetails;
use Cart;
use DB;
class PosController extends Controller
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
        $products = Product::latest()->get();
        $customer = Customer::latest()->get();
        return view('backend.pages.pos.index', compact('products', 'customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $contents = Cart::content();
        $customer_id = $request->customer_id;
        $customer = Customer::where('id', $customer_id)->first();
        return view('backend.pages.pos.invoice', compact('contents', 'customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = array();
        $cart ['id'] = $request->id;
        $cart ['name'] = $request->name;
        $cart ['qty'] = $request->qty;
        $cart ['price'] = $request->price;

        $add = Cart::add($cart);

        if($add){
            toast('Product Added Successfully','success');
            return redirect()->back();
        }else{
            toast('Product Not Add','error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invoice(Request $request)
    {
        $invoice_data = array();
        $invoice_data['customer_id'] = $request->customer_id;
        $invoice_data['order_date'] = $request->order_date;
        $invoice_data['total_products'] = $request->total_products;
        $invoice_data['sub_total'] = $request->sub_total;
        $invoice_data['vat'] = $request->vat;
        $invoice_data['total'] = $request->total;
        $invoice_data['payment_status'] = $request->payment_status;
        $invoice_data['pay'] = $request->pay;
        $invoice_data['order_status'] = $request->order_status;
        $invoice_data['due'] = $request->due;

        $order_id = DB::table('orders')->insertGetId($invoice_data);

        $contents = Cart::content();
        $odata = array();
        foreach ($contents as $content){
            $odata['order_id'] = $order_id;
            $odata['product_id'] = $content->id;
            $odata['quantity'] =  $content->qty;
            $odata['unitcost'] = $content->price;
            $odata['total'] = $content->total;
            $insert = DB::table('orderdetails')->insert($odata);
        }
        if($insert){
            toast('Invoice Create Successfully','success');
            return redirect()->route('index.pos');
        }else{
            toast('Invoice Not Create','error');
            return redirect()->route('index.pos');
        }

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
    public function update(Request $request, $rowId)
    {
        $qty = $request->qty;
        $update = Cart::update($rowId, $qty);

        if($update){
            toast('Product Update Successfully','success');
            return redirect()->back();
        }else{
            toast('Product Not Update','error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
       $remove = Cart::remove($rowId);

       if(!$remove){
        toast('Product Delete Successfully','success');
        return redirect()->back();
        }else{
            toast('Product Not Delete','error');
            return redirect()->back();
        }
    }
}
