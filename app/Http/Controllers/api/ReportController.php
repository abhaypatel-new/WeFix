<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DataTables;
use App\Model\Order;
use App\Model\Product;
use App\Model\ProductImage;
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
         $report[$key]['action'] ='<a class="btn btn-info btn-sm"title="view" href="#" onclick="viewReport('.$reports->id.')"> <i class="fa fa-eye"></i></a>&nbsp;&nbsp;<a class="btn btn-info btn-sm"title="Delete" href="#" onclick="deleteReport('.$reports->id.')"> <i class="fa fa-trash"></i></a>';
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
    public function show(Request $request)
    {
        $viewReport = Order::find($request->id);

        $productReport = Product::find($viewReport->product_id);
        $viewReport['product_name'] = $productReport->product_name;
        $viewReport['thumbnail_image'] = $productReport->thumbnail_image;
        $owner_name = User::find($viewReport->owner_id);
        $viewReport['owner_name'] = $owner_name->first_name.' '.$owner_name->last_name;
        $viewReport['phone'] = $owner_name->phone;
        $viewReport['image'] = $owner_name->image;
        $viewReport['street_address'] = $owner_name->street_address;
         $vendore_name = User::find($viewReport->vendor_id);
          $viewReport['vname'] = $vendore_name->first_name.' '.$vendore_name->last_name;
        $viewReport['vendor_phone'] = $vendore_name->phone;
        $viewReport['vendor_image'] = $vendore_name->image;
        $viewReport['vendor_street_address'] = $vendore_name->street_address;
        // $viewReport['product_image'] = ProductImage::where('pid', $viewReport->product_id)->take(3)->get();
        // $viewReport['product_image'] = $product_image->images;
       if($viewReport)
        {
            
             $response['status'] = 'true';
             $response['data'] = $viewReport;
             }else{
             $response['error'] = 'false';
             $response['message'] = 'Record Not Found';
         }
          return response()->json($response);
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
