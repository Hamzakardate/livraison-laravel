@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
  <div class="col-12">
  


<div class="col-12">
    <p id="sale_id">Vonte : {{$sale_id}}</p>
<table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Image</th>
            <th scope="col">ID User</th>
            <th scope="col">ID Category</th>
            <th scope="col">Name</th>
            <th scope="col">Prix</th>
            <th scope="col">Amounts</th>
            <th scope="col">Totale</th>
            <th scope="col">Created at</th>
            <th scope="col">Magazine</th>
            </tr>
        </thead>
        <tbody>
        @php
            $s = 0;
        @endphp
        @foreach($products as $product)
            <tr>
            <th scope="row">{{ $product->id }}</th>
            <td><a href="{{ url('client/'.$product->id.'/show') }}"><img src="{{ asset('storage/'.$product->img1) }}" style="width:150px;height:100px;" class="img-circle" alt="Cinque Terre"></a></td>
            <th scope="row">{{ $product->user_id }}</th>
            <th scope="row">{{ $product->categories_id }}</th>
            <td>{{ $product->name }}</td> 
            <td>{{ $product->prix }}</td>
            <td>{{ \App\Http\Controllers\SaleController::get_amout($ps,$product->id) }}</td>
            <td>{{ \App\Http\Controllers\SaleController::get_amout($ps,$product->id)*$product->prix}}</td>
            <td>{{ $product->created_at }}</td>
            <td>
            <a href="{{ url('/sale/magazine_info/'.$product->user_id) }}" class="btn btn-primary">Info Magazine</a>
            </td>
            @php
                $s = $s+ \App\Http\Controllers\SaleController::get_amout($ps,$product->id)*$product->prix;
            @endphp
            
            </tr>
          @endforeach

        </tbody>
        
    </table>

    <h1>ToTale : {{$s}}</h1>


</div>




</div>
</div>


<script type="text/javascript">


function r_5(v){

    return parseInt(v);
}

function get_amout(s,id){
    var data={_token : '{{csrf_token()}}',s:s,id:id};
              $.ajax({
          
                url: '/sale/get_amout',
                type: 'post',
                datatype: 'html',
                data:data,
                success: function(data){
                  console.log(data);

                },
                error: function(){
                  console.log("error");

                }
              });
    return id;
}


  $(document).ready(function() {
    //$s=$("sale_id").text()
    //$("[id*=product_amount_]").html(get_amout($s,$(this).text()));
    //$("[id*=product_amount_]").html(r_5($('>p',this).html()));
  });

 




</script>
@endsection
