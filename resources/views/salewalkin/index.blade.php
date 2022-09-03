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
        @foreach($salewalkins as $salewalkin)
            <tr>
            <th scope="row">{{ $salewalkin->id }}</th>
            <td>{{ $salewalkin->updated_at }}</td>
            <td>
            <form method="POST" action="{{ url('/salewalkin/walkin/'.$salewalkin->id) }}">
            @csrf
            
            <button type="submit" class="btn btn-primary">walkin</button>
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
