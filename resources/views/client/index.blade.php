@extends('layouts.master_client')

@section('content1')

<section class="py-5 text-center container" >
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Panier</h1>
        

          <div id="table_element">

                  
        </div>

        

        <p>
        <button type="button" class="btn btn-primary" id="calculator_panier">calculator panier</button>
        <button type="button" class="btn btn-secondary" id="hopping_all_panier">hopping all in panier</button>
        </p>




        <div id="somme_element">

                  
        </div>





        <button type="button" class="btn btn-info btn-lg" id="data_charge" data-toggle="modal" data-target="#myModal">Add information</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
          <form method="POST" action="{{ route('client.store') }}" enctype= "multipart/form-data">
          @csrf
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Hopping </h4>
              </div>
            
              <div class="form-group">
                  <label for="name_client">Client Name:</label>
                  <input type="name" class="form-control" id="name_client" name="name_client">
              </div>
              <div class="form-group">
                  <label for="name_client">Phone:</label>
                  <input type="name" class="form-control" id="phone_client" name="phone_client">
              </div>
              <div class="form-group">
                  <label for="name_client">Address:</label>
                  <input type="name" class="form-control" id="address_client" name="address_client">
              </div>
              
                  <input type="hidden" class="form-control" id="data" value="" name="data">
              
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-default">Submit</button>
              </div>
              
            </div>
            </form>
          </div>
        </div>




<!--
        <form action="/action_page.php">
          <div class="form-group">
            <label for="name_client">Client Name:</label>
            <input type="name" class="form-control" id="name_client">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
-->


        


      </div>
    </div>
  </section>

@endsection



@section('content2')

  <div class="album py-5 bg-light" id="index_client">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" >
        @foreach($products as $p)
        <div class="col">
          <div class="card shadow-sm">
            <img src="{{ asset('storage'.$p->img1) }}" class="img-fluid" alt="Responsive image" style="height:400px;" >
            
            <div class="card-body">
     
              <p class="fs-1" id="name_produit_{{ $p->id }}">{{ $p->name }}</p>

              <div class="shadow-lg p-3 mb-5 bg-body rounded">
              Select Amount :
              <input type="number" value="{{ $p->amount }}" min="1" max="{{ $p->amount }}" step="1" id="amount_produit_{{ $p->id }}"/>
              </div>

              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{ url('client/'.$p->id.'/show') }}"class="btn btn-warning" style="color:#FFF8DC">View product</a>
                  <button type="button" class="btn btn-sm btn-outline-secondary" value="{{ $p->id }}" id="add_produit_{{ $p->id }}">add to panier</button>
                </div>
                <small class="text-muted"id="prix_produit_{{ $p->id }}">{{ $p->prix }} DH</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>


    </div>
  </div>

    
  <script type="text/javascript">

var elementarrays = [];
var l=[];
var data;
var l_d;
function map_id_amout_function(ele){
  var map_id_amouts= [];
  var map_id_amout;
  for( var i = 0; i < elementarrays.length; i++){ 
    map_id_amout=[];
    map_id_amout.push(elementarrays[i][0]);
    map_id_amout.push(elementarrays[i][2]);
    map_id_amouts.push(map_id_amout);
    }
    
    return map_id_amouts;
}


function delete_product(id) {
  data= [];
  l_d=[];
  for( var i = 0; i < elementarrays.length; i++){ 

                                   if ( elementarrays[i][0] != id) { 
                                    data.push(elementarrays[i]);
                                    l_d.push(elementarrays[i][0]);
                                   }
                               }
                               elementarrays=data;
                               l=l_d;
              console.log(elementarrays);
              console.log(l);
              var data={_token : '{{csrf_token()}}',ele:elementarrays};
              if(elementarrays.length==0){
                    $('#table_element').html('');
                  }
              $.ajax({
          
                url: '/panier',
                type: 'post',
                datatype: 'html',
                data:data,
                success: function(data){
                  if(elementarrays.length==0){
                    $('#table_element').html('');
                  }else{
                  $('#table_element').html(data);
                  console.log(data);
                  }

                },
                error: function(){
                  console.log("error");

                }
              });
}


$(document).ready(function() {
  $('#data_charge').hide();
  //s=$(this).val();
  //console.log(s);
  //li = s.split("\\");
  //name=li[li.length-1];
  
  console.log('hi');

    $("[id*=add_produit_]").click(function(event) {

      /*
          $("[id*=amount_produit_]").click(function(event) {
                console.log($(this).val());

          
            });
            */
            $elementarray = [];

            

            $id=$(this).val();

            $name_produit           =$("#name_produit_"+$id).text();
            $amount_produit         =$("#amount_produit_"+$id).val();
            $prix_produit_dh        =$("#prix_produit_"+$id).text();
            $prix_produit_dh_list   =$prix_produit_dh.split(' ');
            $prix_produit            =$prix_produit_dh_list[0];


            console.log(!l.includes($id));


            if(!l.includes($id)){
              l.push($id);

              console.log(l);

              $elementarray.push($id,$name_produit ,$amount_produit,$prix_produit );
            
              elementarrays.push($elementarray);


              var data={_token : '{{csrf_token()}}',ele:elementarrays};
              $.ajax({
          
                url: '/panier',
                type: 'post',
                datatype: 'html',
                data:data,
                success: function(data){
                  $('#table_element').html(data);
                  console.log(data);

                },
                error: function(){
                  console.log("error");

                }
              });
              
            }else{
              alert("Product id "+$id+" and name "+$name_produit+" already exists in panare !");
            }

            
        });




        $("#calculator_panier").click(function() {
          if(l.length==0){
            alert("No product id");
          }else{
            $somme=0;
            for( var i = 0; i < elementarrays.length; i++){ 

              $somme=$somme+elementarrays[i][2]*elementarrays[i][3];
               
                }

                //console.log($somme);

                var data={_token : '{{csrf_token()}}',somme:$somme}; 
                
                $.ajax({
          
                  url: '/calculor',
                  type: 'post',
                  datatype: 'html',
                  data:data,
                  success: function(data){
                    $('#somme_element').html(data);
                    console.log(data);

                  },
                  error: function(){
                    console.log("error");

                  }
                });
          }
            
            
        });
        $("#hopping_all_panier").click(function() {
          if(l.length==0){
            alert("No product id");
          }else{
            
                $('#data_charge').show();
                //console.log($somme);

                var data={_token : '{{csrf_token()}}',ele:elementarrays}; 
                
                $.ajax({
          
                  url: '/hopping_all_panier',
                  type: 'post',
                  datatype: 'html',
                  data:data,
                  success: function(data){
                    
                    console.log(data);
                    $('#index_client').html('');

                  },
                  error: function(){
                    console.log("error");

                  }
                });
          }
            
            
        });

        $("#data_charge").click(function() {
          if(l.length==0){
            alert("No product id");
          }else{
            
                $ele=map_id_amout_function(elementarrays);
                
                $('#data').val($ele);
                console.log($('#data').val());

          }
            
            
        });
          
});



</script>

@endsection