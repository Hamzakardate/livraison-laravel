<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Category;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware(['auth', 'verified'])->except('show');

    }


    public function index()
    {
        if(Auth::user()->status==1){
            $categorys = Category::all();
        }elseif(Auth::user()->status==2){
            $user_id=Auth::user()->id;
            $categorys = Category::where('user_id','=',$user_id)->get();
        }else{
            $categorys = Category::all();
        }
        
        
        return view('category.index', ['categorys'=> $categorys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->status==1){
            $categorys = Category::all();
        }elseif(Auth::user()->status==2){
            $user_id=Auth::user()->id;
            $categorys = Category::where('user_id','=',$user_id)->get();
        }else{
            $categorys = Category::all();
        }
        
        return view('category.index', ['categorys'=> $categorys]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id=Auth::user()->id;

        
        $this->validate($request, [
            'name' => 'required|max:255|unique:categories'
        ]);

        $category=new Category();
        $category->name=$request->name;
        $category->user_id=$user_id;
        $category->save();
        
        if(Auth::user()->status==1){
            $categorys = Category::all();
        }elseif(Auth::user()->status==2){
            $categorys = Category::where('user_id','=',$user_id)->get();
        }else{
            $categorys = Category::all();
        }
        
        return view('category.index', ['categorys'=> $categorys]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $this->authorize('update', $category);
        
        
        return view('category.edit', ['category'=> $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $user_id=Auth::user()->id;
        $this->validate($request, [
            'name' => 'required|max:255|unique:categories'
        ]);

        $category = Category::find($id);
        $category->name=$request->input('name');
        $category->user_id=$user_id;
        $category->save();
        
        
        if(Auth::user()->status==1){
            $categorys = Category::all();
        }elseif(Auth::user()->status==2){
            $categorys = Category::where('user_id','=',$user_id)->get();
        }else{
            $categorys = Category::all();
        }
        
        return view('category.index', ['categorys'=> $categorys]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $category = Category::find($id);
        $this->authorize('delete', $category);
        $category->delete();
        

        if(Auth::user()->status==1){
            $categorys = Category::all();
        }elseif(Auth::user()->status==2){
            $user_id=Auth::user()->id;
            $categorys = Category::where('user_id','=',$user_id)->get();
        }else{
            $categorys = Category::all();
        }
        
        return view('category.index', ['categorys'=> $categorys]);
    }
}
