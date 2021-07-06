<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Supplier;
use Image;

class ProductController extends Controller
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
        $products  = Product::latest()->get();
        return view('backend.pages.product.index', compact('products'));
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
        $suppliers = Supplier::latest()->get();
        return view('backend.pages.product.create', compact('cats', 'brands', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_store = new Product();
        $product_store->product_name = $request->product_name;
        $product_store->product_slug = strtolower(str_replace(' ', '-',$request->product_name));
        $product_store->buying_price = $request->buying_price;
        // $product_store->root = $request->root;
        $product_store->product_quantity = $request->product_quantity;
        $product_store->buying_date = $request->buying_date;
        $product_store->selling_price = $request->selling_price;
        $product_store->category_id = $request->category_id;
        $product_store->brand_id = $request->brand_id;
        $product_store->product_code = $request->product_code;
        //$product_store->product_code = rand(1000,1000000);
        $product_store->status = 1;
        $product_store->return = 1;
        $product_store->damage = 1;

        if ($request->hasFile('image')) {
        //insert that image
            $image = $request->file('image');
            $img = time() . '.'. $image->getClientOriginalExtension();
            $location = public_path('backend/assets/images/products/'.$img);
            Image::make($image)->resize(300 , 300)->save($location);
            $product_store->image = $img;
        }
        $product_store->save();
        toast('Product Added Successfully','success');
        return redirect()->route('index.product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Product::find($id);
        $cats = Category::orderBy('id', 'asc')->get();
        $brands = Brand::latest()->get();
        $suppliers = Supplier::latest()->get();
        return view('backend.pages.product.edit', compact('edit', 'cats', 'brands', 'suppliers'));
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
        $update = Product::find($id);
        $update->product_name = $request->product_name;
        $update->product_slug = strtolower(str_replace(' ', '-',$request->product_name));
        $update->buying_price = $request->buying_price;
        $update->product_code = $request->product_code;
        $update->product_quantity = $request->product_quantity;
        $update->buying_date = $request->buying_date;
        $update->selling_price = $request->selling_price;
        $update->category_id = $request->category_id;
        $update->brand_id = $request->brand_id;
       // $update->supplier_id = $request->supplier_id;

        if ($request->hasFile('image')) {
        //insert that image
            $image = $request->file('image');
            $img = time() . '.'. $image->getClientOriginalExtension();
            $location = public_path('backend/assets/images/products/'.$img);
            Image::make($image)->resize(300 , 300)->save($location);
            $update->image = $img;
        }
        $update->save();
        toast('Product Update Successfully','success');
        return redirect()->route('index.product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Product::where("id", $id)->first();
        $img = $delete->image;
        if($img){
            unlink('backend/assets/images/products/'.$img);
            $delete->delete();
            toast('Product Deleted Successfully','success');
            return redirect()->route('index.product');
        }else{
            return redirect()->route('index.product');
            toast('Product Not Deleted','success');
        }
    }
}
