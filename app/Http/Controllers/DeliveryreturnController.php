<?php

namespace App\Http\Controllers;


use App\Sale;
use App\Deliveryreturn;
use Illuminate\Http\Request;

class DeliveryreturnController extends Controller
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
        $saledeliveryreturns  = Sale::where('status','=',2)->where('exitreturn','=',0)->get();

        
        return view('saledeliveryreturn.index', ['saledeliveryreturns'=> $saledeliveryreturns ]);
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
     * @param  \App\Deliveryreturn  $deliveryreturn
     * @return \Illuminate\Http\Response
     */
    public function show(Deliveryreturn $deliveryreturn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deliveryreturn  $deliveryreturn
     * @return \Illuminate\Http\Response
     */
    public function edit(Deliveryreturn $deliveryreturn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deliveryreturn  $deliveryreturn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deliveryreturn $deliveryreturn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deliveryreturn  $deliveryreturn
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deliveryreturn $deliveryreturn)
    {
        //
    }

    public function deliveryreturns($id)
    {
        $salewalkin  = Sale::find($id);
        $salewalkin->status  =2;
        $salewalkin->exitreturn =1;
        $salewalkin->save();


        $saledeliveryreturns  = Sale::where('status','=',2)->where('exitreturn','=',0)->get();

        
        return view('saledeliveryreturn.index', ['saledeliveryreturns'=> $saledeliveryreturns ]);
    }
}
