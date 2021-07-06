<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Image;
use Session;
class EmployeeController extends Controller
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
        $employees = Employee::latest()->get();
        return view('backend.pages.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Employee();
        $store->name = $request->name;
        $store->slug = strtolower(str_replace(' ', '-',$request->name));
        $store->email = $request->email;
        $store->phone = $request->phone;
        $store->village = $request->village;
        $store->post_office = $request->post_office;
        $store->upzila = $request->upzila;
        $store->zila = $request->zila;
        $store->nid_no = $request->nid_no ;
        $store->joining_date = $request->joining_date;

        if ($request->hasFile('photo')) {
        //insert that image
            $image = $request->file('photo');
            $img = time() . '.'. $image->getClientOriginalExtension();
            $location = public_path('backend/assets/images/employee/'.$img);
            Image::make($image)->resize(270,270)->save($location);
            $store->photo = $img;
        }
        if ($request->hasFile('nid_photo')) {
            //insert that image
                $image = $request->file('nid_photo');
                $img = time() . '.'. $image->getClientOriginalExtension();
                $location = public_path('backend/assets/images/employee/'.$img);
                Image::make($image)->resize(270,270)->save($location);
                $store->nid_photo = $img;
            }
        $store->save();
        toast('Employee Information Add Successfully','success');
        return redirect()->route('index.employee');
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
        $edit = Employee::find($id);
        return view('backend.pages.employee.edit', compact('edit'));
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
        $update = Employee::find($id);
        $update->name = $request->name;
        $update->slug = strtolower(str_replace(' ', '-',$request->name));
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->village = $request->village;
        $update->post_office = $request->post_office;
        $update->upzila = $request->upzila;
        $update->zila = $request->zila;
        $update->nid_no = $request->nid_no ;
        $update->joining_date = $request->joining_date;

        if ($request->hasFile('photo')) {
        //insert that image
            $image = $request->file('photo');
            $img = time() . '.'. $image->getClientOriginalExtension();
            $location = public_path('backend/assets/images/employee/'.$img);
            Image::make($image)->resize(270,270)->save($location);
            $update->photo = $img;
        }
        if ($request->hasFile('nid_photo')) {
            //insert that image
                $image = $request->file('nid_photo');
                $img = time() . '.'. $image->getClientOriginalExtension();
                $location = public_path('backend/assets/images/employee/'.$img);
                Image::make($image)->resize(270,270)->save($location);
                $update->nid_photo = $img;
            }
        $update->save();
        toast('Employee Information Update Successfully','success');
        return redirect()->route('index.employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Employee::where("id", $id)->first();
        $img = $delete->photo;
        $nid_photo = $delete->nid_photo;
        if($img && $nid_photo){
            unlink('backend/assets/images/employee/'.$img);
            unlink('backend/assets/images/employee/'.$nid_photo);
            $delete->delete();
            toast('Employee Information Deleted Successfully','success');
            return redirect()->route('index.employee');
        }else{
            toast('Employee Not Deleted','success');
            return redirect()->route('index.employee');
        }
    }
}
