@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
  <div class="col-12">
  


<div class="col-12">
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
            <th scope="col">User ID</th>
            <th scope="col">Status</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>

            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
            <th scope="row">{{ $user->id }}</th>
            <th scope="row">
            @if($user->status==1)
            {{ __('Admine') }}
            @elseif($user->status==2)
            {{ __('Magazine') }}
            @elseif($user->status==3)
            {{ __('Delivery walking') }}
            @else
            {{ __('Delivery exit') }}
            @endif
            </th>
            <th scope="row">{{ $user->name }}</th>
            <th scope="row">{{ $user->email }}</th>
            <th scope="row">{{ $user->phonne }}</th>
            <th scope="row">{{ $user->address }}</th>
            <th scope="row">{{ $user->created_at }}</th>
            <th scope="row">{{ $user->updated_at }}</th>
            <td>
            <form method="POST" action="{{ url('/user/activedesactive/'.$user->id) }}">
            @csrf
            
            @if($user->active==0)
            <button type="submit" class="btn btn-primary">Active</button>
            @else
            <button type="submit" class="btn btn-primary">Désactive</button>
            @endif
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
