@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">


<div class="col-8">
<form method="POST" action="{{ route('product.store') }}" enctype= "multipart/form-data">
@csrf


    <label for="Product name">Product name *</label>
    <input  class="form-control"  placeholder="Enter product name" name="name">
    @error('name') <p class="text-danger">Product name error</p> @enderror


    <br/>
    <!-- Message input -->
 
    <label class="form-label" for="Description">Description *</label>
    <textarea class="form-control" name="desc" rows="4"placeholder="Desrcription"></textarea>
    @error('name') <p class="text-danger">Desrcription error</p> @enderror

  <br/>
    <label for="Prix">Prix *</label>
    <input  class="form-control"  placeholder="Prix" name="prix">
    @error('name') <p class="text-danger">Prix error</p> @enderror
  
  
    <br/>
    <label for="Prix">Amount *</label>
    <input  class="form-control"  placeholder="Amount" name="amount">
    @error('name') <p class="text-danger">Amount error</p> @enderror

  <br/>

      <label for="inputState">Category</label>
      <select id="categorie" name="categorie" class="form-control">
        <option value='{{0}}' selected>Choose...</option>
        @foreach($categorys as $category)
        <option value='{{ $category->id }}'>{{ $category->name }}</option>
        @endforeach
      </select>

  <br/>

  <div class="form-group">
    <label for="exampleFormControlFile1">Choose image 1 *</label>
    <input type="file" class="form-control-file" id="img1" name="img1">
  </div>

<br/>
<br/>
  <div class="form-group">
      <label for="exampleFormControlFile1">Choose image 2 *</label>
      <input type="file" class="form-control-file" id="img2" name="img2">
    </div>
<br/>
<br/>
  <div class="form-group">
      <label for="exampleFormControlFile1">Choose image 3 *</label>
      <input type="file" class="form-control-file" id="img3" name="img3">
    </div>
<br/>
<br/>
  <button type="submit" class="btn btn-primary">Ajouter</button>
  
  
</form>
</div>


<div class="col-3">



<!--

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ asset('images/image.png') }}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('images/image.png') }}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('images/image.png') }}" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
-->

<!--
<img src="{{ asset('storage/images/product_upload/1660430202_image1.jfif') }}" class="img-fluid" alt="Responsive image">

<br/>
<br/>


<img src="{{ asset('images/image.png') }}" class="img-fluid" alt="Responsive image">

<br/>
<br/>

<img src="{{ asset('images/image.png') }}" class="img-fluid" alt="Responsive image">
-->


</div>


</div>
</div>


<script type="text/javascript">

  $(document).ready(function() {
    //s=$(this).val();
    //console.log(s);
    //li = s.split("\\");
    //name=li[li.length-1];
    
  

  $("#img1,#img2,#img3").change(function(event) {


    console.log($(this).prop('files')[0].name);
  
    var data={_token : '{{csrf_token()}}',img:$(this).prop('files')[0].name};

    $.ajax({
        
        url: '/product/show_image',
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

    
    /*
    $.ajax({
        
        url: '/product/show_image',
        type: 'post',
        datatype: 'html',
        data:data,
        success: function(data){
          console.log(data);

        },
        error: function(){
          console.log("error");

        }
        
        });*/
      
  });

  $("p").click(function(){
    var data={_token : '{{csrf_token()}}' };
    $.ajax({
        
        url: '/product/show_image',
        type: 'post',
        datatype: 'html',
        data:data,
        success: function(data){
          console.log("hi");

        },
        error: function(){
          console.log("error");

        }
        
        });
  });
});




</script>
@endsection
