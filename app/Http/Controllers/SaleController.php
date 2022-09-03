<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Sale;
use App\Infoclient;
use App\Product;
use App\Infomagazine;
use App\User;
use Illuminate\Http\Request;

class SaleController extends Controller
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
        $sales = Sale::all();
        
        return view('sale.index', [
                                    'sales'     => $sales
                                ]);
    }

    public function index_magazine()
    {
        $user_id=Auth::user()->id;

        $products  = Product::where('user_id','=',$user_id)->get('id');

        $ls=array();
        foreach($products as $p){
            array_push($ls,$p->id);
        }

        $sales = Sale::all();
        
        $salesbybayer_id=array();
        foreach($sales as $s){
            $v=0;
            $ps=explode(",",$s->products_amounts); 
            for($i = 0;$i<sizeof($ps)/2;$i++)
                { 
                    $j=$i*2;
                    
                    if(in_array($ps[$j],$ls)){
                        $v=1;
                    }
                }
            if($v==1){
                array_push($salesbybayer_id,$s->id);
            }
        }
        
        $salesbybayer=Sale::whereIn('id', $salesbybayer_id)->get();

        
        return view('sale.index_magazine', [
                                    'salesbybayer'     => $salesbybayer
                                ]);
    }

    public function index_deliver_walkin()
    {
        $sales = Sale::all();
        
        return view('sale.index_deliver_walkin', [
                                    'sales'     => $sales
                                ]);
    }
    public function index_deliver_exit()
    {

        $sales = Sale::all();
        
        return view('sale.index_deliver_exit', [
                                    'sales'     => $sales
                                ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }

    public function one_sale_product($id)
    {
        $user_id=Auth::user()->id;
        $sale = Sale::find($id);
        $ps=array();
        $l=array();
        $qs=array();
        $arrays=explode(",",$sale->products_amounts); 
    
        for($i = 0;$i<sizeof($arrays)/2;$i++)
                { 
                    $p=array();    
                    $j=$i*2;  
                    array_push($p,intval($arrays[$j]),intval($arrays[$j+1]));
                    array_push($ps,$p);
                    array_push($l,intval($arrays[$j]));
                    array_push($qs,intval($arrays[$j+1]));
                }
  
        
        if(Auth::user()->status==1){
            $products = Product::whereIn('id', $l)->get();
        }elseif(Auth::user()->status==2){
            $products = Product::whereIn('id', $l)->where('user_id', '=', $user_id)->get();
        }elseif(Auth::user()->status==3){
            $products = Product::whereIn('id', $l)->get();
        }elseif(Auth::user()->status==4){
            $products = Product::whereIn('id', $l)->get();
        }else{
            $products = Product::all();
        }

        
        
        return view('sale.one_sale_product',[
                                                'products' =>$products,
                                                'sale_id'  =>$id,
                                                'qs'       =>$qs,
                                                'ps'       =>$ps
                                            ]);  
    }

    public function client_info($id)
    {
        
        $infoclient = Infoclient::find($id);


        return view('sale.info_client',[
                                                'infoclient'=>$infoclient
                                            ]); 
    }

    public function magazine_info($id)
    {
        
        $infomagazine = User::find($id);
        

        return view('sale.magazine_info',[
                                                'infomagazine'=>$infomagazine
                                            ]); 
    }

    public static function get_amout($ps,$id)
    {
        
        for($i = 0;$i<sizeof($ps);$i++)
                { 
                    if($ps[$i][0]==$id){
                        $q=$ps[$i][1];
                    }
                }
        
        return $q;
         
    }


    public static function get_samme($qs)
    {
        
        $prix = Product::all('prix');
        $s=0;
        for($i = 0;$i<sizeof($qs);$i++)
                { 
                    $s=$s+($prix[$i]->prix*$qs[$i]);
                }
        return $s;
         
    }

    public static function get_name_magazin($id)
    {
        
        $user=User::find($id);
        return $user->name;
         
    }

    

}
