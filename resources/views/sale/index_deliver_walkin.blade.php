@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
  <div class="col-12">
  


<div class="col-12">
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
            <th scope="col">ID_Sale</th>
            <th scope="col">ID_Client</th>
            <th scope="col">Time of the vonte</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($sales as $sale)
            <tr>
            <th scope="row">{{ $sale->id }}</th>
            <td>{{$sale->client_id}}</td>
            <td>{{ $sale->created_at }}</td>
            <td>
            
            <a href="{{ url('/sale/one_sale_product/'.$sale->id) }}" class="btn btn-primary">Products</a>
            </td>
            </tr>
          @endforeach

        </tbody>
        
    </table>

</div>




</div>
</div>
@endsection
