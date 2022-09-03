@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">


<div class="col-8">
<form method="POST" action="{{ url('product/'.$product->id) }}" enctype= "multipart/form-data">
<input name="_method" type="hidden" value="PUT">
@csrf


    <label for="Product name">Product name *</label>
    <input  class="form-control"  placeholder="Enter product name" name="name" value="{{$product->name}}">
    @error('name') <p class="text-danger">Product name error</p> @enderror


    <br/>
    <!-- Message input -->
 
    <label class="form-label" for="Description">Description *</label>
    <textarea class="form-control" name="desc" rows="4"placeholder="Desrcription" >{{$product->desc}}</textarea>
    @error('name') <p class="text-danger">Desrcription error</p> @enderror

  <br/>
    <label for="Prix">Prix *</label>
    <input  class="form-control"  placeholder="Prix" name="prix" value="{{$product->prix}}">
    @error('name') <p class="text-danger">Prix error</p> @enderror
  
  
    <br/>
    <label for="Prix">Amount *</label>
    <input  class="form-control"  placeholder="Amount" name="amount" value="{{$product->amount}}">
    @error('name') <p class="text-danger">Amount error</p> @enderror

  <br/>

      <label for="inputState">Category</label>
      <select id="categorie" name="categorie" class="form-control">
        
        <option value='{{$category->id}}' selected>{{$category->name}}</option>
        @foreach($categorys as $cs) 
        <option value='{{$cs->id}}'>{{$cs->name}}</option>
        @endforeach
       
      </select>

  <br/>


  <button type="submit" class="btn btn-primary">Modifier</button>
  
  
</form>
</div>


<div class="col-3">




</div>


</div>
</div>


<script type="text/javascript">

 




</script>
@endsection
