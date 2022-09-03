@extends('layouts.app')

@section('content')

  <div class="album py-5 bg-light">
    <div class="container">

      
        
        
        







    <div class="col-md-12">
        <div class="shadow-lg p-3 mb-5 bg-body rounded">
         <p>Client ID: {{$infomagazine->id}}</p>
         <p>Client Name: {{\App\Http\Controllers\SaleController::get_name_magazin($infomagazine->id)}}</p>
         <p>Client Phone: {{$infomagazine->phonne}}</p>
         <p>Client Address: {{$infomagazine->address}}</p>
        </div>
        <div class="shadow-lg p-3 mb-5 bg-body rounded">
         <p>Time of sale: {{$infomagazine->created_at}}</p>
        </div>



    </div>

    
  </div>

  </div>
@endsection