<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
        ->select('products.*','categories.name as category_name')
        ->leftJoin('categories', 'categories.id', '=', 'products.category')
        ->get();
        return view('admin.products.list',compact('products'));
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
            $input=$request->all();


            $query=DB::table('products')->insertGetId(array(
                'product_name' =>$input['product_name'] ,
                'product_description'  => $input['product_description'],
                'status' =>$input['status'] ,
                'brand'  => $input['brand'],
                'model_number'  => $input['model_number'],
                'category' =>$input['category'] ,              
                'catalog_visibility' =>1 ,
                'featured'  => 1,
                'roleid'=>1
            ));

            $insertedId=$query;

         
            if($request->file('images')){
            $files= $request->file('images');
            foreach($files as $key=>$file)
            {

            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images/products'), $filename);

            if($key==0)
            {
                $update=['thumbnail_image' => $filename];
             $affected = DB::table('products')
             ->where('id',$insertedId)
             ->update($update);
          
            }

            $query=DB::table('product_images')->insert(array(
                'pid' =>$insertedId ,
                'images'  => $filename,
            ));
            
         
         
            }
            } 
            

            return redirect()->route('product.list');
            exit;
            // if($request->file('images')){
            // $files= $request->file('images');
            // foreach($files as $file)
            // {

            // $filename= date('YmdHi').$file->getClientOriginalName();
            
            // $file->move(public_path('images/products'), $filename);

            // }
            // print_r($files);
            // exit;
            // }
        }
        $categories = DB::table('categories')->orderBy('id', 'desc')->get();

        return view('admin.products.create',compact('categories'));

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
        return view('admin.products.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = DB::table('categories')->orderBy('id', 'desc')->get();
        $decryptid=decrypt($id);
        $product = DB::table('products')->where('id', $decryptid)->first();
        $product_images = DB::table('product_images')->where('pid', $decryptid)->get();
        return view('admin.products.edit',compact('categories','product','product_images'));

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
        $product = DB::table('products')->where('id', $decryptid)->first();
        $input=$request->all();

        if($request->file('images')){
            $files= $request->file('images');
            foreach($files as $key=>$file)
            {

            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images/products'), $filename);
            $query=DB::table('product_images')->insert(array(
                'pid' =>$decryptid ,
                'images'  => $filename,
            ));                  
            }
            } 
       
            $update=['product_name' => $input['product_name'],
            'product_description'=>$input['product_description'],
            'status'=>$input['status'],
            'brand'=>$input['brand'],
            'model_number'=>$input['model_number'],
            'category'=>$input['category']];   
            
            $affected = DB::table('products')
            ->where('id',$decryptid)
            ->update($update);
         
            return   redirect()->back()->with('success', 'Updated');




        print_r($product);
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
    public function earnings()
    {
        return view('admin.reports.earnings');
    }
    public function sales()
    {
        return view('admin.reports.sales');
    }
    public function customers()
    {
        return view('admin.reports.customer');
    }
    public function vendors()
    {
        return view('admin.reports.vendor');
    }

    public function removeImage($id)
    {
        DB::table('product_images')->where('id', $id)->delete();
        return   redirect()->back()->with('success', 'Image Remove Successfully');

    }

    public function removeThumbnail($id)
    {
        $update=['thumbnail_image'=>''];
        DB::table('products')->where('id', $id)->update($update);
        return   redirect()->back()->with('success', 'Image Remove Successfully');

    }
}
