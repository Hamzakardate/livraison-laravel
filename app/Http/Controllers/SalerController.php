<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Sale;
use App\Infoclient;
use App\Product;


class SalerController extends Controller
{
    public static function verification()
    {
        return Auth::user()->status;
        
         
    }

    public static function activation()
    {
        return Auth::user()->active;
        
         
    }
}
