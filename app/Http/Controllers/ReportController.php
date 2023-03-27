<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    public function earnings()
    {
        $cities=DB::table('canadacities')->get();
        $districts=DB::table('districts')->get();
        $compaines=DB::table('companies')->get();
        $shops=DB::table('shops')->get();
        return view('admin.reports.earnings',compact('compaines','districts','cities','shops'));
    }
    public function sales()
    {
        return view('admin.reports.sales');
    }
    public function customers()
    {
        return view('admin.reports.customer');
    }
    public function vendors()
    {
        return view('admin.reports.vendor');
    }

    public function get_earnings(Request $request)
    {

        $district=$request->get('district');
        $city=$request->get('city');
        $company=$request->get('company');
        $shop=$request->get('shop');
        $where=array();
        $where['orders.order_status']='confirmed';
       
     

        if($company != null)
        {
            $where['companies.id']=$company;
            
        }

        if($district != null)
        {
            $where['shops.district_id']=$district;
            
        }

        if($shop != null)
        {
            $where['products.shop_id']=$shop;
            
        }


        $earnings=DB::table('orders')->select('orders.*','products.product_name as product_name','shops.store_number as store_number','shops.name as shop_name','companies.company_name as company_name','districts.name as district')
        ->leftJoin('products', 'orders.product_id', '=', 'products.id')        
        ->leftJoin('shops', 'products.shop_id', '=', 'shops.id')        
        ->leftJoin('companies', 'shops.companyid', '=', 'companies.id')  
        ->leftJoin('districts', 'shops.district_id', '=', 'districts.id')  
        ->where($where)      

        ->orderBy('orders.id', 'DESC')->get();

        
        $earnings_count=DB::table('orders')    ->leftJoin('products', 'orders.product_id', '=', 'products.id')        
        ->leftJoin('shops', 'products.shop_id', '=', 'shops.id')        
        ->leftJoin('companies', 'shops.companyid', '=', 'companies.id')  
        ->leftJoin('districts', 'shops.district_id', '=', 'districts.id')  
        ->where($where)->sum('order_amount');      


        $data=array('data1'=>$earnings,'total_earn'=>$earnings_count);

         return json_encode($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
