@extends('layouts.app')

@section('content')

  <div class="album py-5 bg-light">
    <div class="container">

      
        
        
        







    <div class="col-md-12">
        <div class="shadow-lg p-3 mb-5 bg-body rounded">
         <p>Client ID: {{$infoclient->id}}</p>
         <p>Client Name: {{$infoclient->name}}</p>
         <p>Client Phone: {{$infoclient->phone}}</p>
         <p>Client Address: {{$infoclient->address}}</p>
        </div>
        <div class="shadow-lg p-3 mb-5 bg-body rounded">
         <p>Time of sale: {{$infoclient->created_at}}</p>
        </div>



    </div>

    
  </div>

  </div>
@endsection