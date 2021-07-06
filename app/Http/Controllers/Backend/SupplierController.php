<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Image;
class SupplierController extends Controller
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
        $suppliers = Supplier::latest()->get();
        return view('backend.pages.supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Supplier();
        $store->name = $request->name;
        $store->slug = strtolower(str_replace(' ', '-',$request->name));
        $store->email = $request->email;
        $store->phone = $request->phone;
        $store->address = $request->address;
        $store->shop_name = $request->shop_name;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $img = time() . '.'. $image->getClientOriginalExtension();
            $location = public_path('backend/assets/images/supplier/'.$img);
            Image::make($image)->resize(300,300)->save($location);
            $store->photo = $img;
        }
        $store->save();
        toast('Supplier Information Add Successfully','success');
        return redirect()->route('index.supplier');
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
        $edit = Supplier::find($id);
        return view('backend.pages.supplier.edit', compact('edit'));
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
        $update = Supplier::find($id);
        $update->name = $request->name;
        $update->slug = strtolower(str_replace(' ', '-',$request->name));
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->address = $request->address;
        $update->shop_name = $request->shop_name;

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $img = time() . '.'. $image->getClientOriginalExtension();
            $location = public_path('backend/assets/images/supplier/'.$img);
            Image::make($image)->resize(300,300)->save($location);
            $update->photo = $img;
        }
        $update->save();
        toast('Supplier Information Add Successfully','success');
        return redirect()->route('index.supplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Supplier::where("id", $id)->first();
        $img = $delete->photo;
        if($img){
            unlink('backend/assets/images/supplier/'.$img);
            $delete->delete();
            toast('Supplier Information Delete Successfully','success');
            return redirect()->route('index.supplier');
        }else{
            toast('Supplier Not Deleted','success');
            return redirect()->route('index.supplier');
        }
    }
}
