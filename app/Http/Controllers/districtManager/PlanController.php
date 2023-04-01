<?php

namespace App\Http\Controllers\districtManager;

use App\Http\Controllers\Controller;
use App\Http\Controllers\api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Model\Equipment;
use App\Model\Plan;
use Session;

class PlanController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = array(); 
        $store = Plan::where('status',0)->get();
       
     foreach ($store as $key => $reports) {
            
            $store[$key]['features'] = json_decode($reports->features);
            $store[$key]['action'] = '<a class="btn btn-info btn-sm"title="edit" href="#" onclick="editPlan(' . $reports->id . ')"> <i class="fa fa-edit"></i></a>';
        }
     
    if ($store) {
       
            $response['status'] = 'true';
            $response['data'] = $store;
        } else {
            $response['error'] = 'false';
            $response['message'] = 'Data not found!';
        }
        return response()->json($response);
    }
    public function getCards()
    {
        $store = array(); 
        $store = Plan::where('status',0)->latest()->take(3)->get();
       
     foreach ($store as $key => $reports) {
            
            $store[$key]['features'] = json_decode($reports->features);
         
        }
      
    if ($store) {
       
            $response['status'] = 'true';
            $response['data'] = $store;
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
                'name' => 'required',
                'start_date' => 'required',
                'price' => 'required',
                'end_date' => 'required',
                'features' => 'required',
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
            $input['features'] = json_encode($request->features);
            $addPlan = Plan::create($input);
            $addPlan['features'] = json_decode($addPlan->features);
          if ($addPlan) {

            $response['status'] = true;
            $response['data'] = $addPlan;
        } else {
            $response['error'] = 'false';
            $response['message'] = 'Addition of Plan is failed!';
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
        $viewPlan = Plan::find($id);

        $viewPlan['features'] = json_decode($viewPlan->features);
        if ($viewPlan) {
            $response['status'] = 'true';
            $response['data'] = $viewPlan;
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
    public function update(Request $request)
    {
        $input = $request->all();
         
       $data = Plan::find($request->id);
        unset($input['id']);
        $updata = $data->update($input);
          if ($updata) {

            $response['status'] = 'true';
            $response['data'] = $data;
        } else {
            $response['error'] = 'false';
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
