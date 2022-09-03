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
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($saleexitreturns as $saleexitreturn)
            <tr>
            <th scope="row">{{ $saleexitreturn->id }}</th>
            <td>{{ $saleexitreturn->updated_at }}</td>
            <td>
            <form method="POST" action="{{ url('/salereturns/returns/'.$saleexitreturn->id) }}">
            @csrf
            
            <button type="submit" class="btn btn-primary">salee Return</button>
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
