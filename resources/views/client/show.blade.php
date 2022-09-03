@extends('layouts.master_client')

@section('content2')

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        
        







    <div class="col-md-8">
        <div class="shadow-lg p-3 mb-5 bg-body rounded">
        <p class="fs-1">Description :</p>
        <p >{{ $product->desc }}</p>
        <p class="fs-3">Amount : {{ $product->amount }}</p>
        </div>

        <div class="shadow-lg p-3 mb-5 bg-body rounded">
        Select Amount :
        <input type="number" value="{{ $product->amount }}" min="1" max="{{ $product->amount }}" step="1"/>
        </div>

        <a href="{{ url('client/') }}"class="btn btn-warning" style="color:#FFF8DC">Index client</a>


    </div>

    <div class="col-8">
          <div class="card shadow-sm">
            <img src="{{ asset('storage'.$product->img1) }}" class="img-fluid" alt="Responsive image" style="height:400px;" >
            
            <div class="card-body">
     
              <p class="fs-1">{{ $product->name }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  
                  
                </div>
                <small class="text-muted">{{ $product->prix }} DH</small>
              </div>
            </div>
          </div>
        </div>

    








 
      </div>

        
    </div>
  </div>


@endsection