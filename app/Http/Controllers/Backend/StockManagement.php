<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Expense;
class StockManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stocks = Invoice::where('status', 1)->latest()->get();
        $cats = Category::latest()->get();
        $brands = Brand::latest()->get();
        $cat_id = $request->cat_id;
        $brand_id = $request->brand_id;
        return view('backend.pages.stock.stock-management', compact('stocks', 'brands', 'cats'));
    }


    public function allProductStocks(){
        $products  = Product::latest()->get();
        return view('backend.pages.stock.allproductstock', compact('products'));
    }


    public function sales(Request $request){
        $start = $request->get('start_date');
        $end = $request->get('end_date');
        $costs = Expense::whereBetween('date', [$start, $end])->get();
        $sales = Invoice::where('status', 1)->whereBetween('date', [$start, $end])->get();
        $sales_sum = $sales->sum('subtotal');
        $cost_sum = $costs->sum('amount');
        return view('backend.pages.stock.sales', compact('costs', 'sales', 'start', 'end', 'sales_sum', 'cost_sum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $edits = Invoice::Where('product_id', $id)->first();
        return view('backend.pages.stock.edit', compact('edits'));
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
       $update = Invoice::find($id);
       $update->sales_pro = $request->sales_pro;
       $update->damage_pro = $request->damage_pro;
       $update->return_pro = $request->return_pro;
       $update->save();

       if($update){
        toast('Stock Update Successfully','success');
        return redirect()->route('stock');
    }else{
        toast('Stocl Not Update','error');
        return redirect()->route('stock');
    }
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
