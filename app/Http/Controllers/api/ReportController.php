<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DataTables;
use App\Model\Order;
use App\Model\Product;
use Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_name = '';
        
        $report = Order::with('customer')->where('owner_id', auth('owner')->user()->id)->orWhere('vendor_id', auth('owner')->user()->id)->get();
        foreach ($report as $key =>$reports) 
        {
        if($reports->product_id != null){
         $product_name = Product::find($reports->product_id);
         }
         $report[$key]['product_name'] = $product_name->product_name;
         $report[$key]['owner_name'] = $reports->customer->first_name.' '.$reports->customer->last_name;
         $report[$key]['action'] ='<a class="btn btn-info btn-sm"title="view" href="'. $reports->id.'"> <i class="fa fa-eye"></i></a>&nbsp;&nbsp;<a class="btn btn-info btn-sm"title="Delete" href="#" onclick="deleteReport('.$reports->id.')"> <i class="fa fa-trash"></i></a>';
        }
        if($report)
        {
           
             $response['message'] = 'Report list retrived.';
             $response['data'] = $report;
             }else{
             $response['error'] = 'false';
             $response['message'] = 'Data Not Found';
         }
          return response()->json($response);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       
        $delReport = Order::find($request->id);
        $data = $delReport->delete();
         if($data)
        {
            
             $response['status'] = 'true';
             $response['message'] = 'Report has been deleted successfully.';
             $response['data'] = $data;
             }else{
             $response['error'] = 'false';
             $response['message'] = 'Data Not Found';
         }
          return response()->json($response);

    }
}
