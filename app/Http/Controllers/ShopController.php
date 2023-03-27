<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;

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
        $provinces=DB::table('canadacities')->select('province')->distinct()->get();

    //    $raw_query='SELECT shops.*, concat(a.first_name," ",a.last_name) as district_manager,concat(b.first_name," ",b.last_name) as manager,concat(c.first_name," ",c.last_name) as customer_name,company_name FROM shops inner join users a on a.id=shops.districtid inner join users b on b.id=shops.managerid inner join users c on c.id=shops.customerid left join companies on shops.companyid=companies.id';
    //    $shops = DB::select( DB::raw($raw_query) );

      $shops =DB::table('shops')->select('shops.*','companies.company_name as company_name','districts.name as district_name')
      ->leftJoin('companies', 'shops.companyid', '=', 'companies.id')        
      ->leftJoin('districts', 'shops.district_id', '=', 'districts.id')        
      ->get();
     
        return view('admin.shops.list',compact('shops','companies','provinces'));
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

        
            DB::table('shops')->insert(array(
                'name' =>$input['name'] ,
                'description'  => $input['description'],
                // 'districtid' =>$input['districtid'] ,
                // 'managerid'  => $input['managerid'],
                'store_number'  => $input['store_number'],
                'address'  => $input['address'],
                'province'  => $input['province'],
                'city'  => $input['city_id'],
                'postal_code'  => $input['postal_code'],
                'companyid'  => $input['company_id'],
                // 'category' =>implode(',',$input['category']) ,
                // 'vendors'  => implode(',',$input['vendors']),
                // 'customerid' =>$input['customerid'] ,
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
        $cities=DB::table('canadacities')->get();
        $provinces=DB::table('canadacities')->select('province')->distinct()->get();
        return view('admin.shops.add',compact('cities','districts','customers','vendors','categories','companies','district','provinces'));

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
        $provinces=DB::table('canadacities')->select('province')->distinct()->get();

        $shop = DB::table('shops')->where('id',$decryptid)->first();
        $cities=DB::table('canadacities')->get();

        return view('admin.shops.edit',compact('districts','provinces','cities','district','customers','vendors','categories','companies','shop','managers'));

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
       
        $update=[
            'name' =>$input['name'] ,
            'description'  => $input['description'],
            'store_number'  => $input['store_number'],
            'address'  => $input['address'],
            'province'  => $input['province'],
            'city'  => $input['city_id'],
            'postal_code'  => $input['postal_code'],
            'companyid'  => $input['company_id'],
            'district_id' =>$input['district_id'] ,
            'status'  => $input['status']
    ];   
        
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
    public function delete($id)
    {
        DB::table('shops')->where('id',$id)->delete();
        return   redirect()->back()->with('message', 'Category delete successfully!');

    }
  public function company_edit(Request $request,$id)
    {
       
        $decryptid=decrypt($id);
        
        $districts=DB::table('users')->where('roleid',3)->get();
        $customers=DB::table('users')->where('roleid',4)->get();
        $vendors=DB::table('users')->where('roleid',1)->get();
        $categories=DB::table('categories')->get();
        $company=DB::table('companies')->where('id',$decryptid)->first();
        $district=DB::table('districts')->get();
        $provinces=DB::table('canadacities')->select('province')->distinct()->get();
        $cities=DB::table('canadacities')->where('province',$company->province)->get();
        
        return view('admin.shops.company',compact('districts','customers','vendors','cities','categories','company','district','provinces'));
        
        
   }
    public function company_create(Request $request)
    {

        $input=$request->all();
 
        $request->validate([
            'company_name' => 'required',
            'address' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email'=>'required|unique:users'
        ]);
           
       $company_id= DB::table('companies')->insertGetId(array(
            'company_name' =>$input['company_name'] ,
            'company_address' =>$input['address'] ,
            'province' =>$input['province'] ,
            'city' =>$input['city_id'] ,
            'postal_code' =>$input['postal_code'] ,
            'work_phone' =>$input['work_phone'] ,
            'gst' =>$input['gst_number'] ,
            'first_name' =>$input['first_name'] ,
            'email' =>$input['email'] ,
            'last_name' =>$input['last_name'] ,
            'password' =>$input['password'] ,
            'phone_number' =>$input['phone'] ,
            'company_desc'  => $input['description'],
            'status' =>$input['status'],
        ));
        
        DB::table('users')->insert(array([

            'first_name' =>$input['first_name'] ,
            'last_name'  => $input['last_name'],
            'email' =>$input['email'] ,
            'phone'  => $input['phone'],
            'password' =>Hash::make($input['password']) ,
            'company_id'  => $company_id,
            'is_active'  => $input['status'],
            'roleid'=>4
        ]));
      
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
     $update =array(
             'company_name' =>$input['company_name'] ,
            'company_address' =>$input['address'] ,
            'province' =>$input['province'] ,
            'city' =>$input['city_id'] ,
            'postal_code' =>$input['postal_code'] ,
            'work_phone' =>$input['work_phone'] ,
            'gst' =>$input['gst_number'] ,
            'first_name' =>$input['first_name'] ,
            'email' =>$input['email'] ,
            'last_name' =>$input['last_name'] ,
            'phone_number' =>$input['phone'] ,
            'company_desc'  => $input['description'],
            'status' =>$input['status'],
           );

      $update_user =array('first_name' =>$input['first_name'] ,
      'last_name' =>$input['last_name'] ,
      'phone' =>$input['phone'] );     
        if(isset($input['password']))
        {
     $update =array(
             'company_name' =>$input['company_name'] ,
            'company_address' =>$input['address'] ,
            'province' =>$input['province'] ,
            'city' =>$input['city_id'] ,
            'postal_code' =>$input['postal_code'] ,
            'work_phone' =>$input['work_phone'] ,
            'gst' =>$input['gst_number'] ,
            'first_name' =>$input['first_name'] ,
            'email' =>$input['email'] ,
            'last_name' =>$input['last_name'] ,
            'password' =>$input['password'] ,
            'phone_number' =>$input['phone'] ,
            'company_desc'  => $input['description'],
            'status' =>$input['status'],
           );

           
      $update_user =array('first_name' =>$input['first_name'] ,
            'password' =>$input['password'] ,
      'last_name' =>$input['last_name'] ,
      'phone' =>$input['phone'] );  
        }
      
        DB::table('companies')->where('id',$decryptid)->update($update);


        DB::table('users')->where(['company_id'=>$decryptid,'roleid'=>4])->update($update_user);

        return   redirect()->back()->with('success', 'Company updated successfully');
        
        exit;

    }
}