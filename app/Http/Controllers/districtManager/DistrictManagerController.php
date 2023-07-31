<?php

namespace App\Http\Controllers\districtManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Equipment;
use App\Model\Product;
use App\Model\ProductImage;
use App\Model\Shop;
use QrCode;
use App\Model\Category;
use Session;
use Auth;

class DistrictManagerController extends Controller
{
     public function index()
    {

        $raw_query = raw_query(3, 'customerid');
        $customers = DB::select(DB::raw($raw_query));

        return view('districtManager.dashboard', compact('customers'));

    }

    public function showLoginForm()
    {
        return view('districtManager.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|unique:users',
            ]);
            $input = $request->all();

            DB::table('users')->insert(array(
                'first_name' => $input['first_name'],
                'last_name' => $input['last_name'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'password' => Hash::make($input['password']),
                // 'company'  => $input['company'],
                'category' => implode(',', $input['category']),
                // 'city'  => implode(',',$input['city']),
                'desc' => $input['desc'],
                'is_active' => 1,
                'roleid' => 4,
            ));
            return redirect()->route('customer.login');
            exit;
        }

        $categories = DB::table('categories')->orderBy('id', 'desc')->get();
        return view('admin.customers.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_equipment(Request $request)
    {
        // dd($request->all());
         if ($request->isMethod('post')) {
            $request->validate([
                'product_name' => 'required',
                'thumbnail_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'category' => 'required',
                'brand' => 'required',
                 'shop_id' => 'required',

            ]);
           
        $input = $request->all();
        // $input['qr_code'] = $request->all();
         $input['roleid'] = auth('owner')->user()->roleid;
      
        $imageName = time().'.'.$request->thumbnail_image->extension();  
         $input['thumbnail_image'] = $imageName;
           
        $request->thumbnail_image->move(public_path('images/products'), $imageName);
    
        $store = Product::create($input);
        ProductImage::create(['[pid' => $store->id, 'images' =>  $input['thumbnail_image']]);
          $data = Product::find($store->id);
          $qr =QrCode::size(80)->backgroundColor(255,90,0)->generate(env('BASE_URL').'product-details?id='.$data->id);
        
         $updata = $data->update(['qrcode' => $qr]);

        /* 
            Write Code Here for
            Store $imageName name in DATABASE from HERE 
        */
      }
    if ($store) {

            $response['status'] = true;
            $response['data'] = $store;
        } else {
            $response['error'] = false;
            $response['message'] = 'Addition of Equipment is failed!';
        }
        return response()->json($response);
    }
      public function get_equipment(Request $request)
    {
       $store = array(); 
        // $store = Equipment::where('status',0)->get();
         $store = Product::where('status',0)->get();
     foreach ($store as $key => $reports) {
            
            $img = env('ASSET_URL').'/images/products/'.$reports->thumbnail_image;
            $cat = Category::where('id', $reports->category)->first();
             $shop = Shop::where('id', $reports->shop_id)->first();
            
            $store[$key]['category_name'] = $cat->name;
            $qr = QrCode::size(80)->backgroundColor(255,90,0)->generate(env('BASE_URL').'product-details?id='.$reports->id);
            $store[$key]['qrcode'] = '<div class="card-body" style="cursor: pointer;">'.
              $qr.'
            
        </div>';
            $store[$key]['images'] = $img;
            $store[$key]['shop'] = $shop->name;
            $btn = 
           $store[$key]['action'] = '<a class="btn btn-info btn-sm"title="view" href="#" onclick="getSingleEquipment(' . $reports->id . ')"> <i class="fa fa-eye"></i></a>&nbsp;<a class="btn btn-info btn-sm"title="edit" href="#" onclick="editEquipment(' . $reports->id . ')"> <i class="fa fa-edit"></i></a>&nbsp;<a class="btn btn-info btn-sm"title="view" href="#" onclick="DelEquipment(' . $reports->id . ')"> <i class="fa fa-trash"></i></a>';
        }
    // dd($store);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSingleEquipment(Request $request)
    {
        if($request->id != '')
        {
          $viewReport = Product::find($request->id);
        $cat = Category::where('id', $viewReport->category)->first();
        $viewReport['categories'] = Category::get();
         $viewReport['shops'] = Shop::get();
             $shop = Shop::where('id', $viewReport->shop_id)->first();
            
            $viewReport['category_name'] = $cat->name;
            $qr = QrCode::size(80)->backgroundColor(255,90,0)->generate(env('APP_URL').'/product-details?id='.$viewReport->id);
            $viewReport['qrcode'] = '<div class="card"><div class="card-body">'.
              $qr.'
            </div>
        </div>';
            $viewReport['shop'] = $shop->name;   
        }
       

      
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


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
       
         if ($request->file('images')) {
         $imageName = time().'.'.$request->images->extension();  
         $input['thumbnail_image'] = $imageName;
         $request->images->move(public_path('images/products'), $imageName);
        }else{
         $input['thumbnail_image'] = $request->images;
        }
       $data = Product::find($request->id);
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
    public function manager_login(Request $request)
    {

        $request->validate([

            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255',
        ]);

        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        // Hash::make($request['password']);
        // Dump data

        if (Auth::guard('owner')->attempt($credentials)) {

            return redirect()->route('owner.dashboard');
            exit;
        }
        
        return redirect()->back()->with('message', 'You have entered an invalid username or password!');

    }

    /**
     * Sign Out from Website.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function signOut()
    {

        Session::flush();
        Auth::logout();

        return Redirect('owner');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_equipment(Request $request)
    {

        $delReport = Equipment::find($request->id);
        $data = $delReport->update(['status' => 1]);
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
}
