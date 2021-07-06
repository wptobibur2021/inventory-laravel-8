<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Supplier;
use App\Models\Employee;
use App\Models\Invoice;
use App\Models\Cart;
use DB;
class InvoiceController extends Controller
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
    public function index(Request $request)
    {
        $products  = Product::latest()->get();
        $carts = Cart::latest()->get();
        $cats = Category::latest()->get();
        $brands = Brand::latest()->get();
        $cat_id = $request->cat_id;
        $brand_id = $request->brand_id;

        $reports = Product::Where('category_id', 'LIKE', $cat_id)
        ->orWhere('brand_id', 'LIKE', $brand_id)
        ->get();
        return view('backend.pages.invoice.index', compact('products', 'carts', 'cats', 'brands', 'reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::latest()->get();
        $brands = Brand::latest()->get();
        $carts = Cart::latest()->get();
        $qty = Cart::all()->sum('quantity');
        $price = Cart::all()->sum('price');
        $total = Cart::all()->sum(function ($t){
            return $t->price * $t->quantity;
        });
        $customers = Customer::latest()->get();
        $employees = Employee::latest()->get();
        $products = Product::latest()->get();
        return view('backend.pages.invoice.create', compact('customers', 'employees', 'carts', 'total', 'price'));
    }


    // public function get_product($id){
    //     $product = Product::where('category_id', $id)->get();
    //     return response()->json($product);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carts = Cart::all();
        $odata = array();
        $odata['employee_id'] = $request->employees_id;
        $odata['customer_id'] = $request->customer_id;
        $odata['root'] = $request->root;
        $odata['advance'] = $request->advance;
        $odata['due'] = $request->due;
        $odata['invoice_no'] = rand(10,5000);
        foreach($carts as $cart){
            $odata['status'] = $request->status;
            $odata['total'] = $request->total;
            $odata['price'] = $cart->price;
            $odata['subtotal'] = $cart->subtotal;
            $odata['product_id'] = $cart->product_id;
            $odata['qty'] = $cart->quantity;
            $odata['date'] = $request->date;
            $insert = DB::table('invoices')->insert($odata);
        }
        if($insert){
            $cart_remove = Cart::whereNotNull('id')->delete();
            toast('Invoice Create Successfully','success');
            return redirect()->route('index.invoice');
        }else{
            toast('Invoice Not Create','error');
            return redirect()->route('index.invoice');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invoice(Request $request){
        $invoices = Invoice::where('status', 0)->get();
        $customers = Customer::latest()->get();
        $employees = Employee::latest()->get();
        $employee_id = $request->employees_id;
        $customer_id = $request->customer_id;
        $root = $request->root;
        $start = $request->start_date;
        $end = $request->end_date;
        $reports = Invoice::whereBetween('date', [$start, $end])->orWhere('customer_id', 'LIKE', $customer_id)
        ->orWhere('employee_id', 'LIKE', $employee_id)
        ->orWhere('root', 'LIKE', $root)
        ->get();
        $price_sum = $reports->sum('subtotal');
        $qty_sum = $reports->sum('qty');
        return view('backend.pages.invoice.invoice', compact('invoices', 'customers', 'employees', 'reports', 'price_sum', 'qty_sum'));

    }

    public function show(Request $request, $id)
    {
        $prints = Invoice::where('invoice_no', $id)->get();
        $print = Invoice::where('invoice_no', $id)->first();
        $price_sum = $print->sum('subtotal');
        $customer_id = $print->customer_id;
        $customer = Customer::where('id', $customer_id)->first();
        $employee_id = $print->employee_id;
        $employee = Employee::where('id', $employee_id)->first();
        $qty_sum = $prints->sum('qty');
        return view('backend.pages.invoice.print-invoice', compact('prints', 'customer', 'price_sum', 'employee', 'qty_sum', 'print'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prints = Invoice::where('invoice_no', $id)->get();
        $print = Invoice::where('invoice_no', $id)->first();
        $customer_id = $print->customer_id;
        $customer = Customer::where('id', $customer_id)->first();
        $employee_id = $print->employee_id;
        $employee = Employee::where('id', $employee_id)->first();
        $qty_sum =  Invoice::where('invoice_no', $id)->sum('qty');
        return view('backend.pages.invoice.edit', compact('prints', 'customer', 'employee', 'print', 'qty_sum'));
    }


    public function final(Request $request){
        $invoices = Invoice::where('status', 1)->get();
        $customers = Customer::latest()->get();
        $employees = Employee::latest()->get();
        $employee_id = $request->employees_id;
        $customer_id = $request->customer_id;
        $root = $request->root;
        $start = $request->start_date;
        $end = $request->end_date;
        $reports = Invoice::whereBetween('date', [$start, $end])->orWhere('customer_id', 'LIKE', $customer_id)
        ->orWhere('employee_id', 'LIKE', $employee_id)
        ->orWhere('root', 'LIKE', $root)
        ->get();
        $price_sum = $invoices->sum('subtotal');
        $qty_sum = $invoices->sum('qty');
       return view('backend.pages.invoice.final-all-invoice', compact('invoices', 'customers', 'employees', 'reports', 'price_sum', 'qty_sum'));
    }


    public function print(Request $request, $id)
    {
        $prints = Invoice::where('invoice_no', $id)->where('status', 1)->get();
        $print = Invoice::where('invoice_no', $id)->first();
        $price_sum = $prints->sum('subtotal');
        $customer_id = $print->customer_id;
        $customer = Customer::where('id', $customer_id)->first();
        $employee_id = $print->employee_id;
        $employee = Employee::where('id', $employee_id)->first();
        $qty_sum = $prints->sum('qty');
        $price_sum = $prints->sum('subtotal');
        return view('backend.pages.invoice.final-print-invoice', compact('prints', 'customer', 'price_sum', 'employee', 'qty_sum', 'print'));
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
       $updates = Invoice::where('invoice_no', $id)->get();
       $product_id = $request->product_id;
       $pro_id = Invoice::where('product_id', $product_id)->get();

      // echo $pro_id;
     // $product_tabele = Product::where('id', $pro_id)->get();

    // echo $pro_id;

    //   if(count($pro_id) >= 0){
    //     foreach($pro_id as $items => $value){
    //         $update_pro_ctock = array(
    //             'stock_qty' => $request->stock_qty[$items],
    //         );
    //         $update_stock=Product::where('id', $product_id[$items])->update($update_pro_ctock);
    //     }
    // }

    // echo $update_stock;

        if(count($updates) >= 0){
            foreach($updates as $item => $v){
                $update_data = array(
                    'advance' => $request->advance,
                    'status'   => 1,
                    'due' => $request->due,
                    'total' => $request->total,
                    'paid' => $request->paid,
                    'subtotal' => $request->subtotal[$item],
                    'sales_pro' => $request->sales_pro[$item],
                    'damage_pro' => $request->damage_pro[$item],
                    'return_pro' => $request->return_pro[$item],
                    'stock_qty' => $request->stock_qty[$item],
                );
               $update=Invoice::where('product_id',$product_id[$item])->update($update_data);
            }
        }

        // echo $product_tabele;
        // echo $updates;




        if($update){
            toast('Invoice Create Successfully','success');
            return redirect()->route('final.invoice');
        }else{
            toast('Invoice Not Create','error');
            return redirect()->route('all.invoice');
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
        $delete = Invoice::where('invoice_no', $id)->delete();
        if($delete){
            toast('Data Delete Succesfully','success');
            return redirect()->route('all.invoice');
        }else{
            toast('Data Not Delete Succesfully','error');
            return redirect()->route('all.invoice');
        }
    }

    public function stock(){
        $stocks = Invoice::where('status', 1)->latest()->get();
        return view('backend.pages.stock.stock-management', compact('stocks',));
    }


}
