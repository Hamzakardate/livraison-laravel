<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        $user_id=Auth::user()->id;
        if(Auth::user()->status==1){
            $products = Product::all();
        }elseif(Auth::user()->status==2){
            $products  = Product::where('user_id','=',$user_id)->get();
        }else{
            $products = Product::all();
        }
        
        return view('product.index', ['products'=> $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id=Auth::user()->id;
        $categorys = Category::where('user_id','=',$user_id)->get();
        
        

        return view('product.create',['categorys'=>$categorys]);
        
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
        $product = new Product();
        
        $product->name             =$request->name;
        $product->desc             =$request->desc;
        $product->prix             =$request->prix;
        $product->amount           =$request->amount;
        $product->categories_id    =$request->categorie;
        $product->user_id         =$user_id;
        $product->img1             =$request->img1->storeAS('public/images/product_upload',time().'_'.rand(1,1000000).'_'.$request->img1->getClientOriginalName());
        $product->img1             =trim($product->img1,'public');
        $product->img2             =$request->img2->storeAS('public/images/product_upload',time().'_'.rand(1,1000000).'_'.$request->img2->getClientOriginalName());
        $product->img2             =trim($product->img2,'public');
        $product->img3             =$request->img3->storeAS('public/images/product_upload',time().'_'.rand(1,1000000).'_'.$request->img3->getClientOriginalName());
        $product->img3             =trim($product->img3,'public');
        
        
        $product->save();

        if(Auth::user()->status==1){
            $products = Product::all();
        }elseif(Auth::user()->status==2){
            $products = Product::where('user_id','=',$user_id)->get();
        }else{
            $products = Product::all();
        }
        
        
        return view('product.index', ['products'=> $products]);

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
        $user_id=Auth::user()->id;

        $product = Product::find($id);

        $category = Category::find($product->categories_id);

        $categorys = Category::where('id', '<>', $category->id)->where('user_id', '=', $user_id)->get();
        
        $this->authorize('update', $product);
  
        return view('product.edit',[
                                        'product'=>$product,
                                        'category'=>$category,
                                        'categorys'=>$categorys
                                    ]);


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
        $product = Product::find($id);


 
        $product->name             =$request->name;
        $product->desc             =$request->desc;
        $product->prix             =$request->prix;
        $product->amount           =$request->amount;
        $product->categories_id    =$request->categorie;
        $product->user_id          =$user_id;

        
        $product->save();
        
        if(Auth::user()->status==1){
            $products = Product::all();
        }elseif(Auth::user()->status==2){
            $products = Product::where('user_id','=',$user_id)->get();
        }else{
            $products = Product::all();
        }
        
        
        return view('product.index', ['products'=> $products]);
        
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $user_id=Auth::user()->id;
        $product = Product::find($id);
        $this->authorize('delete', $product);
        $product->delete();
        

        if(Auth::user()->status==1){
            $products = Product::all();
        }elseif(Auth::user()->status==2){
            $products = Product::where('user_id','=',$user_id)->get();
        }else{
            $products = Product::all();
        }
        
        return view('product.index', ['products'=> $products]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    
}
