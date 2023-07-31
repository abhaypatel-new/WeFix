<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Category;
use App\Model\Notification;
use App\Model\Order;
use App\Model\Product;
use App\User;
use Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $raw_query = raw_query(4, 'customerid');
        $customers = DB::select(DB::raw($raw_query));

        return view('customer.dashboard', compact('customers'));

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

        $decryptid = decrypt($id);
        $customer = DB::table('users')->where('id', $decryptid)->first();
        $categories = DB::table('categories')->orderBy('id', 'desc')->get();
        return view('admin.customers.edit', compact('customer', 'categories'));

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
        $decryptid = decrypt($id);
        $input = $request->all();
        $city = isset($input['city']) ? implode(',', $input['city']) : '';
        $category = isset($input['category']) ? implode(',', $input['category']) : '';

        $users = DB::table('users')->where('email', $input['email'])->where('id', '!=', $decryptid)->first();
        if (empty($users)) {
            if (empty($input['password'])) {

                $update = ['first_name' => $input['first_name'], 'last_name' => $input['last_name'], 'email' => $input['email'],
                    'phone' => $input['phone'],
                    'category' => $category, 'desc' => $input['desc']];
            } else {

                $update = ['first_name' => $input['first_name'], 'last_name' => $input['last_name'], 'email' => $input['email'],
                    'phone' => $input['phone'], 'password' => Hash::make($input['password']),
                    'category' => $category, 'desc' => $input['desc']];
            }

            $affected = DB::table('users')
                ->where('id', $decryptid)
                ->update($update);

            return redirect()->back()->with('success', 'Updated');
        } else {
            return redirect()->back()->with('message', 'Email Already exists!');
        }
    }
    public function owner_login(Request $request)
    {
  
     $credentials = [];
        $request->validate([

            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255',
        ]);
       // if($request['role'] == 'Dmanager')
       // {
      
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
            'roleid' => 3,

        ];
         if (Auth::guard('owner')->attempt($credentials)) {

            return redirect()->route('district.dashboard');
            exit;
        }
  
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
            'roleid' => 1,
        ];
         if (Auth::guard('owner')->attempt($credentials)) {

            return redirect()->route('owner.dashboard');
            exit;
        }else{
            
            $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
            'roleid' => 4,
        ];
            if(Auth::guard('owner')->attempt($credentials)) {

            return redirect()->route('owner.dashboard');
            exit;
        }
        }
   
        return redirect()->back()->with('message', 'You have entered an invalid username or password!');

    }

    /**
     * Remove the specified resource from storage.
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
      /*--------Generate-Invoice-------------*/

     public function generateInvoice(Request $request)
    {
      $input=$request->all();
      $input['payment_status'] = "Paid";
       $update=['order_amount' => $input['total_amount'],
            'price' => $input['price'][0],
            'total' => $input['total'][0],
            'sub_total' => $input['sub_total'],
            'tax'=>$input['tax_amount'],
            'qty'=>$input['qty'][0],
            'track_charge'=>$input['track'],
            'extra_charge'=>$input['extra'],
            'labour_charge'=>$input['labour'],
            'invoice_notes'=>$input['invoice_notes'],
            'payment_status'=> $input['payment_status']];

            $delReport = DB::table('orders')->where('order_id', $request->order_id)->update($update);  
  
        if ($delReport) {
           $viewReport = Order::where('order_id', $request->order_id)->first();
        
        $productReport = Product::find($viewReport->product_id);
        $viewReport['product_name'] = $productReport->product_name;
        $viewReport['thumbnail_image'] = $productReport->thumbnail_image;
        $owner_name = User::find($viewReport->owner_id);
        $viewReport['owner_name'] = $owner_name->first_name . ' ' . $owner_name->last_name;
        $viewReport['phone'] = $owner_name->phone;
        $viewReport['image'] = $owner_name->image;
        $viewReport['street_address'] = $owner_name->street_address;
        $vendore_name = User::find($viewReport->vendor_id);
        $viewReport['vname'] = $vendore_name->first_name . ' ' . $vendore_name->last_name;
        $viewReport['vendor_phone'] = $vendore_name->phone;
        $viewReport['vendor_image'] = $vendore_name->image;
        $viewReport['vendor_street_address'] = $vendore_name->street_address;
            $response['status'] = 'true';
            $response['message'] = 'Invoice generated successfully.';
            $response['data'] = $viewReport;
        } else {
            $response['error'] = 'false';
            $response['message'] = 'Data Not Found';
        }
        return response()->json($response);

    }
     /*--------Generate-Invoice-------------*/
}
