<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Saleexit;
use Illuminate\Http\Request;

class SaleexitController extends Controller
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
        
        $saleexits  = Sale::where('walk_in','=',1)->where('exit','=',0)->get();

        return view('saleexit.index', ['saleexits'=> $saleexits]);
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
     * @param  \App\Saleexit  $saleexit
     * @return \Illuminate\Http\Response
     */
    public function show(Saleexit $saleexit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Saleexit  $saleexit
     * @return \Illuminate\Http\Response
     */
    public function edit(Saleexit $saleexit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Saleexit  $saleexit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Saleexit $saleexit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Saleexit  $saleexit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saleexit $saleexit)
    {
        //
    }

    public function exit($id)
    {
        $salewalkin  = Sale::find($id);
        $salewalkin->status  =1;
        $salewalkin->exit =1;
        $salewalkin->save();

        $saleexits  = Sale::where('walk_in','=',1)->where('exit','=',0)->get();
        return view('saleexit.index', ['saleexits'=> $saleexits]);
    }

    

}
