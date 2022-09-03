@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">


<div class="col-6">
<form method="POST" action="{{ url('category/'.$category->id) }}">
<input name="_method" type="hidden" value="PUT">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Category name</label>
    <input  class="form-control" id="exampleInputEmail1"  placeholder="Enter category name" name="name" value="{{ $category->name }}">
    @error('name') <p class="text-danger">Category name error</p> @enderror
  </div>
  
  
  <button type="submit" class="btn btn-primary">Modifier</button>
</form>
</div>

</div>
</div>
@endsection
