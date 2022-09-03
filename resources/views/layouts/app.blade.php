<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link href=
"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"
              rel="stylesheet">

              <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet"> 
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>       
</head>
<body>

                    
    <div id="app">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="{{ url('/') }}">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
<!--
                <a class="navbar-brand" href="{{ route('client.index') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
-->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    
                    @guest


                    @else
                    @php
                        $a = \App\Http\Controllers\SalerController::activation();
                        $v = \App\Http\Controllers\SalerController::verification();
                    @endphp
                    <li class="nav-item">
                                <a class="nav-link" href="{{ route('category.index') }}">{{ __('Category') }}</a>
                            </li>
                    
                    

                    <li class="nav-item">
                                <a class="nav-link" href="{{ route('product.index') }}">{{ __('Product') }}</a>
                            </li>

                    


                    @if($v==1)
                    <li class="nav-item">
                                <a class="nav-link" href="{{ url('/user') }}">{{ __('Users') }}</a>
                            </li>
                    <li class="nav-item">
                                <a class="nav-link" href="{{ route('sale.index') }}">{{ __('Sales') }}</a>
                            </li>
                    @elseif(($v==2))
                    <li class="nav-item">
                                <a class="nav-link" href="{{ route('sale.index_magazine') }}">{{ __('Sales') }}</a>
                            </li>
                    @elseif(($v==3))
                    <li class="nav-item">
                                <a class="nav-link" href="{{ route('sale.index_deliver_walkin') }}">{{ __('Sales') }}</a>
                            </li>
                    @else
                    <li class="nav-item">
                                <a class="nav-link" href="{{ route('sale.index_deliver_exit') }}">{{ __('Sales') }}</a>
                            </li>
                   @endif






                   <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __('Sale status') }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @if($v==1 or $v==3)
                        <a class="dropdown-item" href="{{ url('/salewalkin') }}">{{ __('Sale walk in') }}</a>
                        @endif
                        @if($v==1 or $v==4)
                        <a class="dropdown-item" href="{{ url('/saleexit') }}">{{ __('Sale exit') }}</a>
                        <a class="dropdown-item" href="{{ url('/saledelivery') }}">{{ __('Sale deliverys') }}</a>
                        @endif
                        @if($v==1 or $v==3)
                        <a class="dropdown-item" href="{{ url('/saledeliveryreturns') }}">{{ __('Sale delivery returns') }}</a>
                        @endif
                        @if($v==1 or $v==2)
                        <a class="dropdown-item" href="{{ url('/salereturns') }}">{{ __('Returns') }}</a>
                        @endif
                        </div>
                    </li>





                   @endguest
                            </ul>
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>  
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<script>
$(document).ready(function () {
    $('#example').DataTable();
});
</script>

</body>
</html>
