@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
  <div class="col-9">
  
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Created at</th>
      <th scope="col">Updated at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

@foreach($categorys as $category)
  <tr>
      <th scope="row">{{ $category->id }}</th>
      <td>{{ $category->name }}</td>
      <td>{{ $category->created_at }}</td>
      <td>{{ $category->updated_at }}</td>
      <td>
      <form id="{{$category->id}}" action="{{ url('category/'.$category->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            
            <a onclick="if(confirm('êtes-vous sûr ?')) document.getElementById('{{$category->id}}').submit()"
             class="btn btn-danger" style="color:#FFF8DC">Supprimer</a>
            <a href="{{ url('category/'.$category->id.'/edit') }}"class="btn btn-warning" style="color:#FFF8DC">Modifier</a>

      </form>
      
      </td>
    </tr> 
@endforeach
  </tbody>
</table>

</div>


<div class="col-3">
<form method="POST" action="{{ route('category.store') }}">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Category name</label>
    <input  class="form-control" id="exampleInputEmail1"  placeholder="Enter category name" name="name">
    @error('name') <p class="text-danger">Category name error</p> @enderror
  </div>
  
  
  <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
</div>

</div>
</div>
@endsection
