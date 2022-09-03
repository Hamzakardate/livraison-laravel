@extends('layouts.app')

@section('content')

<div class="container">
<div class="col-12">
<a href="{{ url('product/create') }}" class="btn btn-primary btn-lg active">Ajouter Product</a>
</div>
<br/>
<div class="col-12">
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Prix</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
            <tr>
            <th scope="row">{{ $product->id }}</th>
      <td><a href="{{ url('client/'.$product->id.'/show') }}"><img src="{{ asset('storage/'.$product->img1) }}" style="width:150px;height:100px;" class="img-circle" alt="Cinque Terre"></a></td>
      
      <td>{{ $product->name }}</td>  
      <td>{{ $product->desc }}</td>
      <td>{{ $product->prix }}</td>
      <td>{{ $product->created_at }}</td>
      <td>{{ $product->updated_at }}</td>
      <td>
      <form id="{{$product->id}}" action="{{ url('product/'.$product->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            
            <a onclick="if(confirm('êtes-vous sûr ?')) document.getElementById('{{$product->id}}').submit()"
             class="btn btn-danger" style="color:#FFF8DC">Supprimer</a>
            <a href="{{ url('product/'.$product->id.'/edit') }}"class="btn btn-warning" style="color:#FFF8DC">Modifier</a>

      </form>
      
      </td>
            </tr>
          @endforeach

        </tbody>
        
    </table>

</div>

</div>

@endsection
