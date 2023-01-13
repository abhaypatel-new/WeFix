<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts=DB::table('users')->where('roleid',3)->count();
  
        $customers=DB::table('users')->where('roleid',4)->count();
        $vendors=DB::table('users')->where('roleid',1)->count();
        $managers=DB::table('users')->where('roleid',2)->count();

         return view('admin.dashboard',compact('districts','managers','customers','vendors'));
    }
    
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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

    if (Auth::guard('admin')->attempt($credentials)) {
        return redirect()->route('admin.dashboard');
        exit;
    }

    return   redirect()->back()->with('message', 'You have entered an invalid username or password!');
     
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
    
    public function signOut() {
        
        Session::flush();
        Auth::logout();
  
        return Redirect('admin');
    }

    public function get_managers()
    {
        $users = DB::table('users')
        ->selectRaw('users.first_name,users.last_name,users.id,CASE WHEN shops.id IS NULL THEN 0 ELSE 1 END status')
        ->leftJoin('shops', 'users.id', '=', 'shops.managerid')        
        ->where('roleid',2)->get();
        return json_encode($users);


    }

    public function get_customers()
    {
        $users = DB::table('users')
        ->selectRaw('users.first_name,users.last_name,users.id,CASE WHEN shops.id IS NULL THEN 0 ELSE 1 END status')
        ->leftJoin('shops', 'users.id', '=', 'shops.customerid')        
        ->where('roleid',4)->get();
        return json_encode($users);


    }

    public function ca_cities()
    {
        if($_GET['edit']==1)
        {
            $users = DB::table('users')->where('id',$_GET['managerid'])->first();
            $current_user = DB::table('users')->where('id',$_GET['current_user'])->first();
            $result=[];
          
            foreach(explode(',', $users->city) as $main_city)
            {
                $data['status']=false;
                foreach(explode(',', $current_user->city) as $city)
                    {
                        if($main_city==$city)
                        {
                            $data['status']=true;
                        }
                    }

                    $data['text']=$main_city;
                    array_push($result,$data);
                  

            }

            return json_encode($result);
          
        }
        else
        {
            $users = DB::table('users')->where('id',$_GET['managerid'])->first();

            $selected_city=explode(',', $users->city);
           
            return json_encode($selected_city);
        }

    
    }

    public function disctricts(Request $request)
    {
        get_comma_sepearted_id_names('users','categories','category');
    //     exit;
        if ($request->isMethod('post'))
        {
            $input= $request->all();

            if(isset($input['create']))
            {

                $request->validate([
                    'name' => 'required|unique:districts',
                ]);

                DB::table('districts')->insert(array(
                    'name' =>$input['name'] ,
                    'userid' =>0 ,
                    'city' =>implode(',',$input['cities']) ,
                ));

             return   redirect()->back()->with('success', 'District Added Successfully');

            }

        }
        $cities = DB::table('cities')->get();
        // $districts = DB::table('districts')->get();
        $raw_query= get_comma_sepearted_id_names('districts','cities','city');

       $districts = DB::select( DB::raw($raw_query) );


        return view('admin.shops.district',compact('cities','districts'));
    }

    public function settings(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $input=$request->all();
            if(isset($input['approval_limits']))
            {
                $update=['value' => $input['approval_limits']];   
                
                $affected = DB::table('settings')
                ->where('type','approval_limits')
                ->update($update);
                return   redirect()->back()->with('success', 'Setting Updated');
            }
            // print_r($request->all());
            exit;
        }
        $approval_limits = DB::table('settings')->where('type','approval_limits')->first();

        return  view('admin.setting',compact('approval_limits'));
    }

}
