<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Infoclient;
use App\Sale;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    


    public function index()
    {
        $products = Product::all();
        $categorys = Category::all();
        return view('client.index',[
                                        'products'=>$products,
                                        'categorys'=>$categorys
                                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $sale=new Sale();
        $sale->products_amounts="'";
        $sale->products_amounts.=(string) $request->data;
        $sale->products_amounts.="'";
        $sale->products_amounts=(string) $sale->products_amounts;
        
        $sale->save();
        */
        $infoclient=new Infoclient();
        $infoclient->name      =$request->name_client;
        $infoclient->phone     =$request->phone_client;
        $infoclient->address   =$request->address_client;
        
        $infoclient->save();
        
        $sale=new Sale();
        $sale->client_id       =$infoclient->id;
        $sale->products_amounts=$sale->products_amounts;
        $sale->products_amounts=(string) $request->data;
        
        $sale->save();
        
        return view('client.panier');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id ,Request $request)
    {
        $product = Product::find($id);

        $category = Category::find($product->categories_id);

        $ip=$request->ip();
        
        return view('client.show',[
                                        'product'=>$product,
                                        'category'=>$category,
                                        'ip'=>$ip
                                    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        

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
        

        
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
      
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function panier(Request $request)
    {
        $datas=$request->ele;

        $table=''; 

        if(sizeof($datas)!=0){
        $table.='<table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#ID Produit</th>
                        <th scope="col">Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Prix use DH</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>';


            for($i = 0;$i<sizeof($datas);$i++)
                {        
                        
                        $table.='<tr>
                                        <th scope="row">'.$datas[$i][0].'</th>
                                        <td>'.$datas[$i][1].'</td>
                                        <td>'.$datas[$i][2].'</td>
                                        <td>'.$datas[$i][3].'</td>
                                        <td><button type="button" class="btn btn-danger" value="'.$datas[$i][0].'" id="delete_produit_selection_'.$datas[$i][0].'" onclick="delete_product('.$datas[$i][0].')">Delete</button></td>
                                    </tr>';
                }

            
        $table.='</tbody>
                </table>';
                return $table;
            }
            
        return 0;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function calculor(Request $request)
    {
      
        $somme='<p class="fs-1">ToTal : '.$request->somme.' DH</p>';
        return $somme;
    }
       /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function hopping_all_panier(Request $request)
    {
      
        $datas=$request->ele;
        return $datas;
    }
}
