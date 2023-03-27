<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies=DB::table('companies')->get();

       $raw_query='SELECT shops.*, concat(a.first_name," ",a.last_name) as district_manager,concat(b.first_name," ",b.last_name) as manager,concat(c.first_name," ",c.last_name) as customer_name,company_name FROM shops inner join users a on a.id=shops.districtid inner join users b on b.id=shops.managerid inner join users c on c.id=shops.customerid left join companies on shops.companyid=companies.id';
       $shops = DB::select( DB::raw($raw_query) );
       
    
        return view('admin.shops.list',compact('shops','companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $input= $request->all();

            $request->validate([
                'managerid' => 'required|unique:shops',
                'customerid' => 'required|unique:shops',
            ]);
               
            DB::table('shops')->insert(array(
                'name' =>$input['name'] ,
                'description'  => $input['description'],
                'districtid' =>$input['districtid'] ,
                'managerid'  => $input['managerid'],
                'companyid'  => $input['company_id'],
                'category' =>implode(',',$input['category']) ,
                'vendors'  => implode(',',$input['vendors']),
                'customerid' =>$input['customerid'] ,
                'district_id' =>$input['district_id'] ,
                'status'  => $input['status'],
            ));
            return redirect()->route('shop.list');
            
            exit;
        }
        $districts=DB::table('users')->where('roleid',3)->get();
        $customers=DB::table('users')->where('roleid',4)->get();
        $vendors=DB::table('users')->where('roleid',1)->get();
        $categories=DB::table('categories')->get();
        $companies=DB::table('companies')->get();
        $district=DB::table('districts')->get();
        return view('admin.shops.add',compact('districts','customers','vendors','categories','companies','district'));

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
        $decryptid=decrypt($id);

        $raw_query='SELECT * from shops left join users on users.id=shops.customerid where shops.id='.$decryptid;
        $customers = DB::select( DB::raw($raw_query) );
        
        $raw_query='SELECT * from shops left join users on users.id=shops.managerid where shops.id='.$decryptid;
        $managers = DB::select( DB::raw($raw_query) );

        $districts=DB::table('users')->where('roleid',3)->get();
        // $customers=DB::table('users')->where('roleid',4)->get();
        $vendors=DB::table('users')->where('roleid',1)->get();
        $categories=DB::table('categories')->get();
        $companies=DB::table('companies')->get();
        $district=DB::table('districts')->get();

        $shop = DB::table('shops')->where('id',$decryptid)->first();
        return view('admin.shops.edit',compact('districts','district','customers','vendors','categories','companies','shop','managers'));

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
        $input= $request->all();
        $decryptid=decrypt($id);
       
        $update=['companyid' => $input['company_id'],
        'name'=>$input['name'],
        'description'=>$input['description'],
        'category'=>implode(',',$input['category']),
        'vendors'=>implode(',',$input['vendors']),
        'districtid'=>$input['districtid'],
        'customerid'=>$input['customerid'],
                'district_id' =>$input['district_id'] ,
                'status'=>$input['status'],
        'managerid'=>$input['managerid']];   
        
        $affected = DB::table('shops')
        ->where('id',$decryptid)
        ->update($update);
        return   redirect()->back()->with('success', 'Updated');

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

    public function company_create(Request $request)
    {

        $input=$request->all();

        $request->validate([
            'company_name' => 'required',
        ]);
           
        DB::table('companies')->insert(array(
            'company_name' =>$input['company_name'] ,
            'company_desc'  => $input['description'],
            'status' =>1,
        ));
        return   redirect()->back()->with('success', 'Company added successfully');
        
        exit;

    }

    public function company_update(Request $request,$id)
    {
        $input=$request->all();
        $decryptid=decrypt($id);

        $request->validate([
            'company_name' => 'required',
        ]);
           
        DB::table('companies')->where('id',$decryptid)->update(array(
            'company_name' =>$input['company_name'] ,
            'company_desc'  => $input['description'],
            'status' =>1,
        ));

        return   redirect()->back()->with('success', 'Company updated successfully');
        
        exit;

    }
}