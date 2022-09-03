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
            <th scope="col">Time of walking</th>
            <th scope="col">Action </th>
            </tr>
        </thead>
        <tbody>
        @foreach($saledeliveryreturns as $saledeliveryreturn)
            <tr>
            <th scope="row">{{ $saledeliveryreturn->id }}</th>
            <td>{{ $saledeliveryreturn->updated_at }}</td>
            <td>
            <form method="POST" action="{{ url('/saledeliveryreturns/deliveryreturns/'.$saledeliveryreturn->id) }}">
            @csrf
            
            <button type="submit" class="btn btn-primary">Return</button>
            </form>
            </td>
            
            </tr>
          @endforeach

        </tbody>
        
    </table>

</div>




</div>
</div>
@endsection
