<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Notification;
use App\Model\Order;
use App\Model\Product;
use App\Model\Setting;
use App\User;
use Carbon\Carbon;
use Auth;
use DB;
use Illuminate\Http\Request;

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
        if(auth('owner')->user()->roleid === 4)
        {
            $report = Order::with('customer')->where(['payment_status' => 'Paid', 'owner_id' => auth('owner')->user()->id])->get();
        }
        elseif(auth('owner')->user()->roleid === 3)
        {
            $report = Order::with('customer')->where(['payment_status' => 'Paid'])->get();
        }else{
            $report = Order::with('customer')->where(['payment_status' => 'Paid', 'vendor_id' => auth('owner')->user()->id])->get();
        }
       
        foreach ($report as $key => $reports) {
            if ($reports->product_id != null) {
                $product_name = Product::find($reports->product_id);
            }
            $report[$key]['product_name'] = $product_name->product_name;
            $report[$key]['owner_name'] = $reports->customer->first_name . ' ' . $reports->customer->last_name;
            $report[$key]['action'] = '<a class="btn btn-info btn-sm"title="view" href="#" onclick="viewReport(' . $reports->id . ')"> <i class="fa fa-eye"></i></a>&nbsp;&nbsp;';
        }
        if ($report) {

            $response['message'] = 'Report list retrived.';
            $response['data'] = $report;
        } else {
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
        $viewReport['owner_name'] = $owner_name->first_name . ' ' . $owner_name->last_name;
        $viewReport['phone'] = $owner_name->phone;
        $viewReport['image'] = $owner_name->image;
        $viewReport['street_address'] = $owner_name->street_address;
        $vendore_name = User::find($viewReport->vendor_id);
        $viewReport['vname'] = $vendore_name->first_name . ' ' . $vendore_name->last_name;
        $viewReport['vendor_phone'] = $vendore_name->phone;
        $viewReport['vendor_image'] = $vendore_name->image;
        $viewReport['vendor_street_address'] = $vendore_name->street_address;
        if ($viewReport) {

            $response['status'] = 'true';
            $response['data'] = $viewReport;
        } else {
            $response['error'] = 'false';
            $response['message'] = 'Record Not Found';
        }
        return response()->json($response);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getCount(Request $request)
    {   
        if(auth('owner')->user()->roleid === 4)
        {
           
            $count['confirmed'] = Order::where(['order_status' =>'confirmed', 'payment_status' =>'unpaid'])->where('owner_id', auth('owner')->user()->id)->count();
            $count['pending'] = Order::where('order_status', 'pending')->where('owner_id', auth('owner')->user()->id)->count();
            $r = Order::where('owner_id', auth('owner')->user()->id)->where('order_status','Rejected')->count();
            $p = Order::where('owner_id', auth('owner')->user()->id)->where('payment_status','Paid')->count();
            $count['history'] = $p+$r; 
            $count['vendor'] = User::where('roleid', '1')->count();
            $count['owner'] = User::where('roleid', '4')->count();
             $count['work_order'] = Product::count();
        }
        else if(auth('owner')->user()->roleid === 3)
        {
            $limit = Setting::find(1);
        
            $count['confirmed'] = Order::where(['order_status' =>'Confirmed', 'payment_status' =>'unpaid'])->where('owner_id', auth('owner')->user()->id)->count();
            $count['pending'] = Order::where('order_status', 'Pending')->where('order_amount', '>=', $limit->value)->count();
            $r = Order::where('order_status','Rejected')->count();
            $p = Order::where('payment_status','Paid')->count();
            $count['history'] = $p+$r; 
            $count['vendor'] = User::where('roleid', '1')->count();
            $count['owner'] = User::where('roleid', '4')->count();
             $count['work_order'] = Product::count();
        }
        else{
        $count['confirmed'] = Order::where(['order_status' =>'confirmed', 'payment_status' =>'unpaid'])->where('vendor_id', auth('owner')->user()->id)->count();
        $count['pending'] = Order::where('order_status', 'pending')->where('vendor_id', auth('owner')->user()->id)->count();
        // $count['history'] = Order::where('payment_status', 'Paid')->orWhere('order_status','Rejected')->where('vendor_id', auth('owner')->user()->id)->count();
        $r = Order::where('vendor_id', auth('owner')->user()->id)->where('order_status','Rejected')->count();
        $p = Order::where('vendor_id', auth('owner')->user()->id)->where('payment_status','Paid')->count();
        $count['history'] = $p+$r;
        $count['vendor'] = User::where('roleid', '1')->count();
        $count['owner'] = User::where('roleid', '4')->count();
         $count['work_order'] = Product::count(); 
       
        }
       
        if ($count) {

            $response['status'] = 'true';
            $response['data'] = $count;
        } else {
            $response['error'] = 'false';
            $response['message'] = 'Record Not Found';
        }
        return response()->json($response);
    }

    /**
     * List the form for notification the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listNotification()
    {
      
        $storage = [];
        $product_name = '';
        $vendore_name = '';
        $owner_name = '';
        $list = [];
        if(auth('owner')->user()->roleid === 1)
        {
             
            $list = Notification::where(['vendor_id' => auth('owner')->user()->id])->get();
           
        }
        else{
            $list = Notification::where(['owner_id' => auth('owner')->user()->id])->get();
        }
       

        foreach ($list as $key => $lists) {

            if ($lists->product_id != null) {
                $owner_name = User::find($lists->owner_id);
                $vendore_name = User::find($lists->vendor_id);
                $product_name = Product::find($lists->product_id);
            }

            $lists['product_name'] = $product_name->product_name;
            $lists['action'] = '<a class="btn btn-info btn-sm"title="view" href="#" onclick="viewNotification(' . $lists->id . ')"> <i class="fa fa-eye"></i></a>';
            $lists['status'] = $lists->is_read == 1 ? '<button type="button" class="btn btn-danger"><i class="fa fa-envelope-open"></i></a></button>' : '<button type="button" class="btn btn-success"><i class="fa fa-envelope"></i></a></button>';
            $lists['owner_name'] = $owner_name->first_name . ' ' . $owner_name->last_name;
            $lists['phone'] = $owner_name->phone;
            $lists['image'] = $owner_name->image;
            $lists['street_address'] = $owner_name->street_address;

            $lists['vname'] = $vendore_name->first_name . ' ' . $vendore_name->last_name;
            $lists['vendor_phone'] = $vendore_name->phone;
            $lists['vendor_image'] = $vendore_name->image;
            $lists['vendor_street_address'] = $vendore_name->street_address;
            array_push($storage, $lists);
        }

        if ($storage) {

            $response['status'] = 'true';
            $response['data'] = $storage;
        } else {
            $response['error'] = 'false';
            $response['message'] = 'Record Not Found';
        }
        return response()->json($response);
    }

    /**
     * Show the form for notification the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewNotification(Request $request)
    {

        $viewReport = Notification::find($request->id);

        $productReport = Product::find($viewReport->product_id);
        $viewReport['product_name'] = $productReport->product_name;
        $viewReport['product_description'] = $productReport->product_description;
        $viewReport['brand'] = $productReport->brand;
        $viewReport['model'] = $productReport->model_number;
        $viewReport['thumbnail_image'] = $productReport->thumbnail_image;
        $owner_name = User::find($viewReport->owner_id);
        $viewReport['owner_name'] = $owner_name->first_name . ' ' . $owner_name->last_name;
        $viewReport['phone'] = $owner_name->phone;
        $viewReport['image'] = $owner_name->image;
        $viewReport['street_address'] = $owner_name->street_address;
        $vendore_name = User::find($viewReport->vendor_id);
        $cat = Category::find($vendore_name->category);
        $viewReport['category_name'] = $cat->name;
        $viewReport['vname'] = $vendore_name->first_name . ' ' . $vendore_name->last_name;
        $viewReport['vendor_phone'] = $vendore_name->phone;
        $viewReport['vendor_image'] = $vendore_name->image;
        $viewReport['vendor_street_address'] = $vendore_name->street_address;

        if ($viewReport) {

            DB::table('notifications')->where('id', $request->id)->update(array('is_read' => 1));
            $viewReport['count'] = (auth('owner')->user()->roleid === 4)?Notification::where(['owner_id' => auth('owner')->user()->id, 'is_read' => 0])->count():Notification::where(['vendor_id' => auth('owner')->user()->id, 'is_read' => 0])->count();
            $response['status'] = 'true';
            $response['data'] = $viewReport;
        } else {
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
        if ($data) {

            $response['status'] = 'true';
            $response['message'] = 'Report has been deleted successfully.';
            $response['data'] = $data;
        } else {
            $response['error'] = 'false';
            $response['message'] = 'Data Not Found';
        }
        return response()->json($response);

    }

    /*--------Generate-Invoice-------------*/

     public function generateInvoice(Request $request)
    {
      $input=$request->all();
      $input['payment_status'] = "Paid";
       $update=['order_amount' => $input['total_amount'],
            'price' => $input['price'][0],
            'total' => $input['total'][0],
            'sub_total' => $input['sub_total'],
            'tax'=>$input['tax_amount'],
            'qty'=>$input['qty'][0],
            'track_charge'=>$input['track'],
            'extra_charge'=>$input['extra'],
            'labour_charge'=>$input['labour'],
            'invoice_notes'=>$input['invoice_notes'],
            'payment_status'=> $input['payment_status']];

            $delReport = DB::table('orders')->where('order_id', $request->order_id)->update($update);  
  
        if ($delReport) {
           $viewReport = Order::where('order_id', $request->order_id)->first();
        
        $productReport = Product::find($viewReport->product_id);
        $viewReport['product_name'] = $productReport->product_name;
        $viewReport['thumbnail_image'] = $productReport->thumbnail_image;
        $owner_name = User::find($viewReport->owner_id);
        $viewReport['owner_name'] = $owner_name->first_name . ' ' . $owner_name->last_name;
        $viewReport['phone'] = $owner_name->phone;
        $viewReport['image'] = $owner_name->image;
        $viewReport['street_address'] = $owner_name->street_address;
        $vendore_name = User::find($viewReport->vendor_id);
        $viewReport['vname'] = $vendore_name->first_name . ' ' . $vendore_name->last_name;
        $viewReport['vendor_phone'] = $vendore_name->phone;
        $viewReport['vendor_image'] = $vendore_name->image;
        $viewReport['vendor_street_address'] = $vendore_name->street_address;
            $response['status'] = 'true';
            $response['message'] = 'Invoice generated successfully.';
            $response['data'] = $viewReport;
        } else {
            $response['error'] = 'false';
            $response['message'] = 'Data Not Found';
        }
        return response()->json($response);

    }
     /*--------Generate-Invoice-------------*/

     /*----------------Chart Module Start-------*/
      public function getChart()
    {
         $users = [];
         if(auth('owner')->user()->roleid === 1)
        {
             
            $users = Order::select(DB::raw("COUNT(*) as count"),  DB::raw('sum(order_amount) as totalAmount'), DB::raw("MONTHNAME(createdAt) as month_name"))

                    ->whereYear('createdAt', date('Y'))
                    ->where('owner_id', auth('owner')->user()->id)
                    ->groupBy(DB::raw("Month(createdAt)"))
                    ->pluck('totalAmount', 'month_name');
           
        }
        else{
            $users = Order::select(DB::raw("COUNT(*) as count"),  DB::raw('sum(order_amount) as totalAmount'), DB::raw("MONTHNAME(createdAt) as month_name"))

                    ->whereYear('createdAt', date('Y'))
                    ->groupBy(DB::raw("Month(createdAt)"))
                    ->pluck('totalAmount', 'month_name');
            }
       
 
            $users['labels'] = $users->keys();
            $users['value'] = $users->values();
            $response['status'] = 'true';
            $response['message'] = 'Eearning data retrived successfully.';
            $response['data'] = $users;     
       return response()->json($response);
    }
     public function getLast()
    {
        
        $users = Order::select(DB::raw("COUNT(*) as count"),  DB::raw('sum(order_amount) as totalAmount'),DB::raw("MONTHNAME(createdAt) as month_name"))
                    ->whereMonth('createdAt', '=', Carbon::now()->subMonth()->month)
                    ->groupBy(DB::raw("Month(createdAt)"))
                    ->pluck('totalAmount', 'month_name');
   
            $users['labels'] = $users->keys();
            $users['value'] = $users->values();
            $response['status'] = 'true';
            $response['message'] = 'Last month data retrived successfully.';
            $response['data'] = $users;     
       return response()->json($response);
    }
    public function getSingleOrder(Request $request)
    {
        
         $delReport = DB::table('orders')->where('order_id', $request->id)->first();  

     if ($delReport) {
        $viewReport = Order::where('order_id', $request->id)->first();
     
     $productReport = Product::find($viewReport->product_id);
     $viewReport['product_name'] = $productReport->product_name;
     $viewReport['thumbnail_image'] = $productReport->thumbnail_image;
     $owner_name = User::find($viewReport->owner_id);
     $viewReport['owner_name'] = $owner_name->first_name . ' ' . $owner_name->last_name;
     $viewReport['phone'] = $owner_name->phone;
     $viewReport['image'] = $owner_name->image;
     $viewReport['street_address'] = $owner_name->street_address;
     $vendore_name = User::find($viewReport->vendor_id);
     $viewReport['vname'] = $vendore_name->first_name . ' ' . $vendore_name->last_name;
     $viewReport['vendor_phone'] = $vendore_name->phone;
     $viewReport['vendor_image'] = $vendore_name->image;
     $viewReport['vendor_street_address'] = $vendore_name->street_address;
         $response['status'] = 'true';
         $response['message'] = 'Invoice generated successfully.';
         $response['data'] = $viewReport;
     } else {
         $response['error'] = 'false';
         $response['message'] = 'Data Not Found';
     }
     return response()->json($response);

 }
}
