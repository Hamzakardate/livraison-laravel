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
            <th scope="col">Action Deliver</th>
            <th scope="col">Action No Deliver</th>
            </tr>
        </thead>
        <tbody>
        @foreach($saledeliverys as $saledelivery)
            <tr>
            <th scope="row">{{ $saledelivery->id }}</th>
            <td>{{ $saledelivery->updated_at }}</td>
            <td>
            <form method="POST" action="{{ url('/saledelivery/delivery/'.$saledelivery->id) }}">
            @csrf
            
            <button type="submit" class="btn btn-primary">Deliver</button>
            </form>
            </td>
            <td>
            <form method="POST" action="{{ url('/saledeliveryreturns/nodelivery/'.$saledelivery->id) }}">
            @csrf
            
            <button type="submit" class="btn btn-primary">No Deliver</button>
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
