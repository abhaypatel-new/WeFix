<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
       if($request['role'] == 'Dmanager')
       {
      
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
            'roleid' => 3,

        ];
         if (Auth::guard('owner')->attempt($credentials)) {

            return redirect()->route('district.dashboard');
            exit;
        }
    }else{
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
    }
        
        // Hash::make($request['password']);
        // Dump data

       
        
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
}
