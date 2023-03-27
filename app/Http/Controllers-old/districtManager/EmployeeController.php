<?php

namespace App\Http\Controllers\districtManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Model\Equipment;
use App\Model\Plan;
use App\Model\Company;
use App\User;
use Hash;
use Session;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = array(); 
        $all = User::where('d_manager_id', '!=', null)->get();
       
     foreach ($all as $key => $reports) {
            $cname = Company::find($reports->company_id);
           
            $all[$key]['name'] = $reports->first_name.' '.$reports->last_name;
            $all[$key]['company'] = $cname->company_name;
            $all[$key]['role'] = (($reports->roleid == 1)?'Vendor':(($reports->roleid == 3)?'District-Manager':(($reports->roleid == 4)?'Owner':'Manager')));
            $all[$key]['action'] = '<a class="btn btn-info btn-sm"title="edit" href="#" onclick="editEmp(' . $reports->id . ')"> <i class="fa fa-edit"></i></a>';
        }
      
    if ($all) {
       
            $response['status'] = 'true';
            $response['data'] = $all;
        } else {
            $response['error'] = 'false';
            $response['message'] = 'Data not found!';
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
       
          $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'unique:users',
            'password' => 'required|min:8|same:con_password'
        ]);
    if ($validator->fails()) {
         $response = [
            'status' => false,
            'message' => 'errors',
            'data'    =>  $validator->errors(),
        ];    
        
    return response()->json($response);
  }
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $addEmp = User::create($input);
         if ($addEmp) {
       
            $response['status'] = true;
            $response['data'] = $addEmp;
        } else {
            $response['error'] = false;
            $response['message'] = 'Data not found!';
        }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $users = User::find($id);
         $users['cmp'] = Company::all();
        if ($users) {
            $response['status'] = true;
            $response['data'] = $users;
        } else {
            $response['error'] = false;
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
    public function update(Request $request)
    {
      
        $input = $request->all();
      
        if($input['con_password'] == '')
        {
            unset($input['password']);
            unset($input['con_password']);
        }else{
             $input['password'] = Hash::make($input['password']);
        }
                 $users = User::find($request->id);
        $addEmp = $users->update($input);
         if ($addEmp) {
       
            $response['status'] = true;
            $response['data'] = $addEmp;
        } else {
            $response['error'] = false;
            $response['message'] = 'Data not found!';
        }
        return response()->json($response);
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
