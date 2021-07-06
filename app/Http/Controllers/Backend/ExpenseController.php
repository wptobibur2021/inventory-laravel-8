<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
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
        $start = $request->get('start_date');
        $end = $request->get('end_date');
        $expenses = Expense::latest()->get();
        $expenses_amount = Expense::sum('amount');
        $report = Expense::whereBetween('date', [$start, $end])->get();
        $report_sum = $report->sum('amount');
        return view('backend.pages.expense.index', compact('expenses', 'expenses_amount', 'report', 'report_sum', 'start', 'end'));
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

    // public function report()
    // {

    //     return view('backend.pages.expense.report');
    // }

    // public function generate(Request $request)
    // {
    //     $expenses = Expense::whereBetween('created_at', [$request->get('start_date'), $request->get('end_date')])->get();
    //     return redirect()->route('report.expense', compact('expenses'));
    // }

    // public function reportview(){
    //    // $expenses = Expense::whereBetween('created_at', [$request->get('start_date'), $request->get('end_date')])->get();
    //     return view('backend.pages.expense.report-view');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = New Expense();
        $store->expense_title = $request->title;
        $store->details = $request->details;
        $store->amount = $request->amount;
        $store->date = $request->date;
        $store->save();
        toast('Category Added','success', 'small');
        return redirect()->route('index.expense');
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
        $edit = Expense::find($id);
        return view('backend.pages.expense.edit', compact('edit'));
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
        $update = Expense::find($id);
        $update->expense_title = $request->title;
        $update->details = $request->details;
        $update->amount = $request->amount;
        $update->date = $request->date;
        $update->save();
        toast('Category Added','success', 'small');
        return redirect()->route('index.expense');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Expense::where("id", $id)->delete();
        toast('Expense Deleted Successfully','success');
        return redirect()->route('index.expense');
    }
}
