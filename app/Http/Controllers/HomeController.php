<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Invoice;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stocks = Invoice::where('status', 1)->latest()->get();
        $products  = Product::latest()->get();
        $invoices = Invoice::where('status', 1)->latest()->get();
        return view('backend.index', compact('products', 'stocks', 'invoices'));
    }
}
