<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Image;
class CustomerController extends Controller
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
        $customers = Customer::latest()->get();
        return view('backend.pages.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Customer();
        $store->name = $request->name;
        $store->slug = strtolower(str_replace(' ', '-',$request->name));
        $store->email = $request->email;
        $store->phone = $request->phone;
        $store->shop_address = $request->shop_address;
        $store->shop_name = $request->shop_name;
        $store->nid_no = $request->nid_no ;

        if ($request->hasFile('photo')) {
        //insert that image
            $image = $request->file('photo');
            $img = time() . '.'. $image->getClientOriginalExtension();
            $location = public_path('backend/assets/images/customer/'.$img);
            Image::make($image)->resize(270,270)->save($location);
            $store->photo = $img;
        }
        if ($request->hasFile('nid_photo')) {
            //insert that image
                $image = $request->file('nid_photo');
                $img = date() . '.'. $image->getClientOriginalExtension();
                $location = public_path('backend/assets/images/customer/'.$img);
                Image::make($image)->resize(270,270)->save($location);
                $store->nid_photo = $img;
            }
        $store->save();
        toast('Customer Information Add Successfully','success');
        return redirect()->route('index.customer');
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
        $edit = Customer::find($id);
        return view('backend.pages.customer.edit', compact('edit'));
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
        $update = Customer::find($id);
        $update->name = $request->name;
        $update->slug = strtolower(str_replace(' ', '-',$request->name));
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->shop_address = $request->shop_address;
        $update->shop_name = $request->shop_name;
        $update->nid_no = $request->nid_no ;

        if ($request->hasFile('photo')) {
        //insert that image
            $image = $request->file('photo');
            $img = time() . '.'. $image->getClientOriginalExtension();
            $location = public_path('backend/assets/images/customer/'.$img);
            Image::make($image)->resize(270,270)->save($location);
            $update->photo = $img;
        }
        if ($request->hasFile('nid_photo')) {
            //insert that image
                $image = $request->file('nid_photo');
                $img = time() . '.'. $image->getClientOriginalExtension();
                $location = public_path('backend/assets/images/customer/'.$img);
                Image::make($image)->resize(270,270)->save($location);
                $update->nid_photo = $img;
            }
        $update->save();
        toast('Customer Information Update Successfully','success');
        return redirect()->route('index.customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Customer::where("id", $id)->first();
        $img = $delete->photo;
        $nid_photo = $delete->nid_photo;
        if($img && $nid_photo){
            unlink('backend/assets/images/customer/'.$img);
            unlink('backend/assets/images/customer/'.$nid_photo);
            $delete->delete();
            toast('Customer Information Deleted Successfully','success');
            return redirect()->route('index.customer');
        }else{
            toast('Customer Not Deleted','success');
            return redirect()->route('index.customer');
        }
    }
}
