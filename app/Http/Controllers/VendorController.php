<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raw_query=raw_querys(1);
        $vendors = DB::select( DB::raw($raw_query) );
        
        $proviences=DB::table('ca_cities')->select('province')
            ->distinct()->get();

        return view('admin.vendors.list',compact('vendors'));

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
             $request->validate([
                'email' => 'required|unique:users',
            ]);
            $input= $request->all();
         
            
        DB::table('users')->insert(array(
            'first_name' =>$input['first_name'] ,
            'last_name'  => $input['last_name'],
            'email' =>$input['email'] ,
            'phone'  => $input['phone'],
            'password' =>Hash::make($input['password']) ,
            // 'district_name' =>$input['district_name'] ,
            // 'company'  => $input['company'],
            'category' =>implode(',',$input['category']) ,
            // 'city'  => implode(',',$input['city']),
            'desc' =>$input['desc'] ,
            'is_active'  => 1,
            'roleid'=>1
        ));
        return redirect()->route('vendor.list');
        exit;
        }
        
        $categories = DB::table('categories')->orderBy('id', 'desc')->get();
        $proviences=DB::table('ca_cities')->select('province')
        ->distinct()->get();
        $managers = DB::table('users')->where('roleid', 2)->get();
     
        return view('admin.vendors.add',compact('categories','proviences','managers'));
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
        return view('admin.vendors.view');

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
        $vendor = DB::table('users')->where('id', $decryptid)->first();
        $categories = DB::table('categories')->orderBy('id', 'desc')->get();
        $managers = DB::table('users')->where('roleid', 2)->get();

        return view('admin.vendors.edit',compact('vendor','categories','managers'));

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
         $decryptid=decrypt($id);
         $input= $request->all();
         $city='';
        //  $city=isset($input['city']) ? implode(',',$input['city']) : '';
         $category=isset($input['category']) ? implode(',',$input['category']) : '';
         
         $users= DB::table('users')->where('email',$input['email'])->where('id','!=',$decryptid)->first();
          if(empty($users))
         {
             if(empty($input['password']))
             {
                 
             $update=['first_name' => $input['first_name'],'last_name'=>$input['last_name'],'email'=>$input['email'],
             'phone'=>$input['phone'],
             'category'=>$category,'desc'=>$input['desc']];
             }else{
                 
             $update=['first_name' => $input['first_name'],'last_name'=>$input['last_name'],'email'=>$input['email'],
             'phone'=>$input['phone'],'password'=>Hash::make($input['password']),
             'category'=>$category,'desc'=>$input['desc']];
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
