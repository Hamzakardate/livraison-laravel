<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
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
        $saledeliverys  = Sale::where('status','=',1)->where('exit','=',1)->get();

        return view('saledelivery.index', ['saledeliverys'=> $saledeliverys]);
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
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivery $delivery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
        //
    }

    public function delivery($id)
    {
        $salewalkin  = Sale::find($id);
        $salewalkin->status  =3;
        $salewalkin->delivery =1;
        $salewalkin->save();


        $saledeliverys  = Sale::where('status','=',1)->where('exit','=',1)->get();

        return view('saledelivery.index', ['saledeliverys'=> $saledeliverys]);
    }

    public function nodelivery($id)
    {
        $salewalkin  = Sale::find($id);
        $salewalkin->status  =2; 
        $salewalkin->deliveryreturns =1;
        $salewalkin->save();


        $saledeliverys  = Sale::where('status','=',1)->where('exit','=',1)->get();

        return view('saledelivery.index', ['saledeliverys'=> $saledeliverys]);
    }


}
