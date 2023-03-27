<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->orderBy('id', 'desc')->get();
 
        return view('admin.category.list',compact('categories'));
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
            'name' => 'required|unique:categories',
        ]);
        
         $input= $request->all();
         DB::table('categories')->insert(array(
            'name' =>$input['name'] ,
            'description'  => $input['description'],
        ));
        return redirect()->route('category.list');
        exit;
          
        }
        
        return view('admin.category.add');

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
        $categories = DB::table('categories')->where('id', $decryptid)->first();
        return view('admin.category.edit',compact('categories'));

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
        //  DB::enableQueryLog();
        $categories= DB::table('categories')->where('name', $input['name'])->where('id','!=',$decryptid)->first();
    //   $query = DB::getQueryLog();
    //     dd($query);
      if(empty($categories))
      {
         $affected = DB::table('categories')->where('id',$decryptid)->update(['name' => $input['name'],'description'=>$input['description']]);
         return redirect()->back()->with('success', 'Updated!');
      }
      else{
        return   redirect()->back()->with('message', 'Already exists!');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        DB::table('categories')->where('id',$id)->delete();
        return   redirect()->back()->with('message', 'Category delete successfully!');

    }
}
