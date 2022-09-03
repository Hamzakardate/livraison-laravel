<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Salewalkin;
use Illuminate\Http\Request;

class SalewalkinController extends Controller
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
        $salewalkins  = Sale::where('status','=',0)->get();
        return view('salewalkin.index', ['salewalkins'=> $salewalkins]);
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
     * @param  \App\Salewalkin  $salewalkin
     * @return \Illuminate\Http\Response
     */
    public function show(Salewalkin $salewalkin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salewalkin  $salewalkin
     * @return \Illuminate\Http\Response
     */
    public function edit(Salewalkin $salewalkin)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salewalkin  $salewalkin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salewalkin $salewalkin)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salewalkin  $salewalkin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salewalkin $salewalkin)
    {
        //
    }
    public function walkin($id)
    {
        $salewalkin  = Sale::find($id);
        $salewalkin->status  =1;
        $salewalkin->walk_in =1;
        $salewalkin->save();

        $salewalkins  = Sale::where('status','=',0)->get();
        return view('salewalkin.index', ['salewalkins'=> $salewalkins]);
    }
}
