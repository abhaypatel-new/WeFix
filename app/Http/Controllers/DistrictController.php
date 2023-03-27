<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raw_query=raw_querys(3);
        $districts = DB::select( DB::raw($raw_query) );
        
        return view('admin.districtManager.list',compact('districts'));
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
            'company'  => $input['company'],
            'category' =>implode(',',$input['category']) ,
            'city'  => implode(',',$input['city']),
            'desc' =>$input['desc'] ,
            'district_name' =>$input['district_name'] ,
            'is_active'  => 1,
            'roleid'=>3
        ));
        return redirect()->back();
        exit;
        }
        
        $categories = DB::table('categories')->orderBy('id', 'desc')->get();
        $cities=DB::table('cities')->get();
     
        
        return view('admin.districtManager.add',compact('categories','cities'));
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
        $district = DB::table('users')->where('id', $decryptid)->first();
        $categories = DB::table('categories')->orderBy('id', 'desc')->get();
        $cities = DB::table('cities')->get();
        
         return view('admin.districtManager.edit',compact('district','categories','cities'));
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
         $city=isset($input['city']) ? implode(',',$input['city']) : '';
         $category=isset($input['category']) ? implode(',',$input['category']) : '';
         
         $users= DB::table('users')->where('email',$input['email'])->where('id','!=',$decryptid)->first();
          if(empty($users))
         {
             if(empty($input['password']))
             {
                 
             $update=['first_name' => $input['first_name'],'last_name'=>$input['last_name'],'email'=>$input['email'],
             'phone'=>$input['phone'],'company'=>$input['company'],
            'district_name' =>$input['district_name'] ,
            'category'=>$category,'city'=>$city,'desc'=>$input['desc']];
             }else{
                 
             $update=['first_name' => $input['first_name'],'last_name'=>$input['last_name'],'email'=>$input['email'],
            'district_name' =>$input['district_name'] ,
            'phone'=>$input['phone'],'password'=>Hash::make($input['password']),'company'=>$input['company'],
             'category'=>$category,'city'=>$city,'desc'=>$input['desc']];
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
