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
        @foreach($saleexits as $saleexit)
            <tr>
            <th scope="row">{{ $saleexit->id }}</th>
            <td>{{ $saleexit->updated_at }}</td>
            <td>
            <form method="POST" action="{{ url('/saleexit/exit/'.$saleexit->id) }}">
            @csrf
            
            <button type="submit" class="btn btn-primary">Exit</button>
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
