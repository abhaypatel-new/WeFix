<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;

class CustomerController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $raw_query=raw_query(4,'customerid');
        // $customers = DB::select( DB::raw($raw_query) );
        $customers = DB::table('users')->select('users.*','companies.company_name as company_name','roles.name as role')
        ->leftJoin('companies', 'users.company_id', '=', 'companies.id')        
        ->leftJoin('roles', 'users.roleid', '=', 'roles.id')->where('roleid','!=',1)    
      ->get();
        return view('admin.customers.list',compact('customers'));

    }


    public function showLoginForm()
    {
        return view('customer.login');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $approval=0;

              if ($request->isMethod('post'))
        {
             $request->validate([
                'email' => 'required|unique:users',
            ]);
            $input= $request->all();
         if($input['roleid']==4)
         {
            $input['district_name']=NULL;
            $input['shop_id']=NULL;
            if(empty($input['approval_limit'])){$approval=0;}else{$approval=$input['approval_limit'];}

         }
            
        DB::table('users')->insert(array(
            'first_name' =>$input['first_name'] ,
            'last_name'  => $input['last_name'],
            'email' =>$input['email'] ,
            'phone'  => $input['phone'],
            'password' =>Hash::make($input['password']) ,
            'company_id'  => $input['company_id'],
            'district_name'  => $input['district_name'],
            'shop_id'  => $input['shop_id'],
            'desc' =>$input['desc'] ,
            'is_active'  => $input['status'],
            'roleid'=>$input['roleid'],
            'approval_limit'=>$approval
        ));
        return redirect()->route('customer.list');
        exit;
        }
        
        $categories = DB::table('categories')->orderBy('id', 'desc')->get();
        $companies = DB::table('companies')->orderBy('id', 'desc')->get();
        $d_managers = DB::table('users')->where('roleid',3)->orderBy('id', 'desc')->get();
        $managers = DB::table('users')->where('roleid',2)->orderBy('id', 'desc')->get();
        $shops = DB::table('shops')->orderBy('id', 'desc')->get();
        $districts=DB::table('districts')->get();

        
        return view('admin.customers.add',compact('districts','categories','companies','d_managers','managers','shops'));
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
        return view('admin.customers.view');

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
        $customer = DB::table('users')->where('id', $decryptid)->first();
        $categories = DB::table('categories')->orderBy('id', 'desc')->get();
        $districts=DB::table('districts')->get();

        $companies = DB::table('companies')->orderBy('id', 'desc')->get();
        $d_managers = DB::table('users')->where('roleid',3)->orderBy('id', 'desc')->get();
        $managers = DB::table('users')->where('roleid',2)->orderBy('id', 'desc')->get();
        $shops = DB::table('shops')->orderBy('id', 'desc')->get();
        return view('admin.customers.edit',compact('districts','customer','categories','companies','d_managers','managers','shops'));
 

        // return view('admin.customers.edit',compact('customer','categories'));
        
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
        $approval=0;
         $decryptid=decrypt($id);
         $input= $request->all();

         if($input['roleid']==4)
         {
            $input['district_name']=NULL;
            $input['shop_id']=NULL;

         }

         if($input['roleid']==4)
         {
            $input['district_name']=NULL;
            $input['shop_id']=NULL;
            if(empty($input['approval_limit'])){$approval=0;}else{$approval=$input['approval_limit'];}

         }
            
         $city=isset($input['city']) ? implode(',',$input['city']) : '';
         $category=isset($input['category']) ? implode(',',$input['category']) : '';
         
         $users= DB::table('users')->where('email',$input['email'])->where('id','!=',$decryptid)->first();
          if(empty($users))
         {
            if($input['roleid'] == 3 )
            {
              $input['shop_id']=NULL;
                 
            }
            
            if($input['roleid'] ==2)
            {
              $input['district_name']=NULL;

                
            }

            if($input['roleid'] ==4)
            {
            $input['approval_limit']=$input['approval_limit'];

            }

             if(empty($input['password']))
             {
                 
             $update=[     'first_name' =>$input['first_name'] ,
             'last_name'  => $input['last_name'],
             'email' =>$input['email'] ,
             'phone'  => $input['phone'],
             'password' =>Hash::make($input['password']) ,
             'company_id'  => $input['company_id'],
             'district_name'  => $input['district_name'],
             
             'shop_id'  => $input['shop_id'],
             'desc' =>$input['desc'] ,
             'is_active'  => $input['status'],
             'approval_limit'=>$approval,
             'roleid'=>$input['roleid']];
             }else{
                 
             $update=[     'first_name' =>$input['first_name'] ,
             'last_name'  => $input['last_name'],
             'email' =>$input['email'] ,
             'phone'  => $input['phone'],
             'password' =>Hash::make($input['password']) ,
             'company_id'  => $input['company_id'],
             'district_name'  => $input['district_name'],             
             'shop_id'  => $input['shop_id'],
             'desc' =>$input['desc'] ,
             'is_active'  => $input['status'],
             'approval_limit'=>$approval,

             'roleid'=>$input['roleid'],'password'=>Hash::make($input['password'])];
             }
      
             $affected = DB::table('users')
             ->where('id',$decryptid)
             ->update($update);
          
             return   redirect()->back()->with('success', 'Updated');
         }else{
             return   redirect()->back()->with('message', 'Email Already exists!');
         }
    }
   /**
     * Authentication.
     */
     public function login(Request $request)
    {
       $request->validate([
        
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255',
        ]);
        
        
    $credentials = [
        'email' => $request['email'],
        'password' => $request['password'],
    ];

    // Dump data
    // dd($credentials);

    if (Auth::guard('owner')->attempt($credentials)) {
        return redirect()->route('owner.dashboard');
        exit;
    }

    return   redirect()->back()->with('message', 'You have entered an invalid username or password!');
     
    }
 
     
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       
        DB::table('users')->where('id',$id)->delete();
        return   redirect()->back()->with('message', 'Users delete successfully!');
    }
}
