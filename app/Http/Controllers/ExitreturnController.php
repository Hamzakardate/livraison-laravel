<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Exitreturn;
use Illuminate\Http\Request;

class ExitreturnController extends Controller
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
        $saleexitreturns  = Sale::where('status','=',2)->where('exitreturn','=',1)->get();

        
        return view('saleexitreturn.index', ['saleexitreturns'=> $saleexitreturns ]);
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
     * @param  \App\Exitreturn  $exitreturn
     * @return \Illuminate\Http\Response
     */
    public function show(Exitreturn $exitreturn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exitreturn  $exitreturn
     * @return \Illuminate\Http\Response
     */
    public function edit(Exitreturn $exitreturn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exitreturn  $exitreturn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exitreturn $exitreturn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exitreturn  $exitreturn
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exitreturn $exitreturn)
    {
        //
    }

    public function deliveryreturns($id)
    {
        $saleexitreturn  = Sale::find($id);
        $saleexitreturn->status  =4;
        $saleexitreturn->save();

        $saleexitreturns  = Sale::where('status','=',2)->where('exitreturn','=',1)->get();

        
        return view('saleexitreturn.index', ['saleexitreturns'=> $saleexitreturns ]);
    }
}
